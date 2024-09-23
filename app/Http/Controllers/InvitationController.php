<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApologyRequest;
use App\Http\Requests\StoreInvitationRequest;
use App\Http\Resources\HistoryResource;
use App\Http\Resources\HistoryResourceCollection;
use App\Http\Resources\InvitationResource;
use App\Http\Resources\InvitationSupportResource;
use App\Http\Resources\ShowOrdersResource;
use App\Models\Invitation;
use App\Models\Invitee;
use App\Models\Message;
use App\Models\PackageDetail;
use App\Models\User;
use App\Statuses\InvitationTypes;
use App\Statuses\MessageTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{
    //// Orders
    public function index()
    {
        $invitation = Invitation::orderBy('created_at', 'desc')->get();

        return InvitationSupportResource::collection($invitation);
    }

    public function showOrders($invitationId)
    {
        $invitation = Invitation::find($invitationId);
        if (! $invitation) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return ShowOrdersResource::make($invitation);
    }

    public function myEvent()
    {
        $userId = auth()->id();

        $invitations = Invitation::where('user_id', $userId)
            ->orwhereHas('receptions', function ($query) use ($userId) {
                $query->where('type', 2)
                    ->where('user_id', $userId);
            })
            ->get();

        $now = Carbon::now()->format('Y-m-d H:i');
        foreach ($invitations as $invitation) {
            $miladi_date = Carbon::parse($invitation->miladi_date.' '.$invitation->to)->format('Y-m-d H:i');

            if ($now > $miladi_date && $invitation->status == InvitationTypes::active) {
                $invitation->update([
                    'status' => InvitationTypes::done,
                ]);
            }
        }

        return InvitationResource::collection($invitations);
    }

    public function showEvent($invitation)
    {
        $show = Invitation::find($invitation);
        if (! $show) {
            return response()->json(['message' => 'Not Found'], 403);
        }

        return InvitationResource::make($show);
    }

    //// The invitations I was invited on
    public function myInvitation()
    {
        $user = auth()->user();
        $userPhone = User::where('id', $user->id)->select('phone');
        $invitation = Invitee::where('phone', $userPhone)->get();

        return InvitationResource::collection($invitation);
    }

    public function store(StoreInvitationRequest $request)
    {
        $user = auth()->user();
        try {
            DB::beginTransaction();
            $packageDetail = PackageDetail::where('id', $request->package_detail_id)->first();
            $number_of_invitees = $packageDetail->number_of_invitees;

            $invitation = $user->invitation()->create(
                array_merge($request->validated(), [
                    'number_of_invitees' => $number_of_invitees,
                ]));
            $invitation->invitationInput()->createMany($request->answers ?? []);
            $invitation->InvitationProhibited()->createMany($request->prohibited ?? []);
            if (! empty($request->features)) {
                foreach ($request->features as $feature) {
                    $invitation->features()->attach($feature['feature_id'], [
                        'value' => isset($feature['value']) ? $feature['value'] : null,
                        'quantity' => $feature['quantity'],
                    ]);
                }
            }
            if (! empty($request->Attributes)) {
                foreach ($request->Attributes as $attribute) {
                    $invitation->attributes()->attach($attribute['attribute_id'], [
                        'value' => $attribute['value'],
                    ]);
                }
            }

            DB::commit();

            return new InvitationResource($invitation);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'An error occurred while creating the invitation'], 500);
        }
    }

    public function update(StoreApologyRequest $request, $invitationId)
    {
        $user = auth()->user();
        $invitation = Invitation::find($invitationId);
        $message = Message::where('user_id', $user->id)->where('invitation_id', $invitation->id)
            ->where('type', MessageTypes::deleted)
            ->first();
        if ($message) {
            return response()->json(['message' => 'Invitation is Inactive']);
        }
        if (! $invitation) {
            return response()->json(['message' => 'Invitation not found'], 404);
        }
        $invitationId = $invitation->id;
        Message::create(array_merge(['user_id' => $user->id,
            'invitation_id' => $invitationId,
            'type' => MessageTypes::updated], $request->all()));
        $invitation->update([
            'status' => InvitationTypes::updated,
        ]);

        return response()->json(['message' => 'Updated Successfully']);
    }

    public function delete(StoreApologyRequest $request, $invitationId)
    {
        $invitation = Invitation::find($invitationId);
        if (! $invitation) {
            return response()->json(['message' => 'Invitation not found'], 404);
        }
        $user = auth()->user();
        $message = Message::where('user_id', $user->id)->where('invitation_id', $invitation->id)
            ->where('type', MessageTypes::deleted)
            ->first();
        if ($message) {
            return response()->json(['message' => 'Invitation is Inactive']);
        } else {
            try {
                DB::beginTransaction();
                $invitationId = $invitation->id;
                Message::create(array_merge(['user_id' => $user->id, 'invitation_id' => $invitationId,
                    'type' => MessageTypes::deleted], $request->all()));
                $invitation->update([
                    'status' => InvitationTypes::deleted,
                ]);
                DB::commit();

                return response()->json(['message' => 'Deleted Successfully']);
            } catch (\Exception $e) {
                DB::rollBack();

                return response(['message' => 'An error occurred while deleting the invitation and creating the apology message'], 500);
            }
        }
    }

    public function history()
    {
        $user = auth()->user();
        $invitations = $user->invitation;

        if (! $invitations) {
            return response()->json(['message' => 'No invitations found for this user.'], 404);
        }

        return new HistoryResourceCollection(HistoryResource::collection($invitations));
    }

    public function searchCountries(Request $request)
    {
        $searchQuery = $request->input('query');

        $countries = json_decode(file_get_contents(public_path('countries&cities/countries.json')), true);

        $results = [
            'countries' => $this->searchByLabel($countries, $searchQuery),
        ];

        return response()->json($results);
    }

    private function searchByLabel($data, $searchQuery)
    {
        $results = [];
        foreach ($data as $entry) {
            // Use 'like' search, which means check if the label starts with the search query
            if (stripos($entry['label'], $searchQuery) === 0 || stripos($entry['label_ar'], $searchQuery) === 0) {
                $results[] = $entry;
            }
        }

        return $results;
    }

    public function getCitiesByCountry(Request $request)
    {
        $countryQuery = $request->input('country');

        $countries = json_decode(file_get_contents(public_path('countries&cities/countries.json')), true);
        $cities = json_decode(file_get_contents(public_path('countries&cities/cities.json')), true);

        // البحث عن البلد في قائمة البلدان
        $country = null;
        foreach ($countries as $entry) {
            if (stripos($entry['label'], $countryQuery) !== false || stripos($entry['label_ar'], $countryQuery) !== false) {
                $country = $entry;
                break;
            }
        }

        // إذا لم يتم العثور على البلد
        if (! $country) {
            return response()->json(['error' => 'Country not found'], 404);
        }

        // البحث عن المدن المرتبطة بهذا البلد
        $countryCities = [];
        foreach ($cities as $cityGroup) {
            if (stripos($cityGroup['country'], $country['label']) !== false || stripos($cityGroup['country'], $country['label_ar']) !== false) {
                $countryCities = $cityGroup['cities'];
                break;
            }
        }

        return response()->json([
            'country' => $country,
            'cities' => $countryCities,
        ]);
    }
}
