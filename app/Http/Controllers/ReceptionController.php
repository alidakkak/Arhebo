<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReceptionRequest;
use App\Http\Requests\UpdateReceptionRequest;
use App\Http\Resources\ReceptionEventResource;
use App\Http\Resources\ReceptionResource;
use App\Models\Invitation;
use App\Models\Invitee;
use App\Models\QR;
use App\Models\Reception;
use App\Models\User;
use App\Services\WhatsAppExtraInviterServices;
use App\Services\WhatsAppReceptionServices;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReceptionController extends Controller
{
    public function receptionList(Request $request)
    {
        $validatedData = $request->validate([
            'invitation_id' => ['required', Rule::exists('invitations', 'id')],
        ]);
        $receptionList = Reception::where('invitation_id', $validatedData['invitation_id'])
            ->where('type', $request->type)
            ->get();

        return ReceptionResource::collection($receptionList);
    }

    ///Reception Event
    public function myEvent(Request $request)
    {
        $user = auth()->user();
        $reception = Reception::where('user_id', $user->id)
            ->where('type', $request->type)
            ->get();

        return ReceptionEventResource::collection($reception);
    }

    public function myEventById($Id)
    {
        $user = auth()->user();
        $reception = Reception::where('id', $Id)->where('user_id', $user->id)->first();
        if (! $reception) {
            return response()->json(['message' => 'Reception event not found'], 404);
        }

        return ReceptionEventResource::make($reception);
    }

    public function store(StoreReceptionRequest $request)
    {
        DB::beginTransaction();
        try {
            $invitation = Invitation::find($request->invitation_id);
            $event_name = $invitation->event_name;
            $user = User::where('phone', $request->phone)->first();
            $number_of_compensation = floor($invitation->number_of_compensation);
            $remaining = $invitation->number_of_invitees + $invitation->additional_package + $number_of_compensation;

            if (auth()->user()->phone === $request->phone && $request->type == 2) {
                return response()->json(['message' => 'لا يمكن اضافة نفسك داعي اضافي'], 422);
            }

            $isExist = Reception::where('phone', $request->phone)
                ->where('invitation_id', $request->invitation_id)
                ->where('type', $request->type)
                ->exists();

            if ($isExist) {
                return Response()->json(['message' => 'المدعو موجود بالفعل'], 422);
            }

            if ($remaining < $request->number_can_invite) {
                return response()->json(['message' => 'العدد المضاف اكبر من المتبقي'], 422);
            }

            if ($request->type == 2) {
                for ($i = 0; $i < $request->number_can_invite; $i++) {
                    if ($invitation->number_of_invitees > 0) {
                        $invitation->number_of_invitees -= 1;
                    } elseif ($invitation->additional_package > 0) {
                        $invitation->additional_package -= 1;
                    } elseif ($invitation->number_of_compensation > 0) {
                        $invitation->number_of_compensation -= 1;
                    }
                }
                $invitation->save();
            }

            if (! $user) {
                $reception = Reception::create([
                    'phone' => $request->phone,
                    'invitation_id' => $request->invitation_id,
                    'type' => $request->type,
                    'number_can_invite_without_decrease' => $request->number_can_invite,
                    'number_can_invite' => $request->number_can_invite,
                ]);
            } else {
                $reception = Reception::create([
                    'user_id' => $user->id,
                    'phone' => $request->phone,
                    'invitation_id' => $request->invitation_id,
                    'type' => $request->type,
                    'number_can_invite_without_decrease' => $request->number_can_invite,
                    'number_can_invite' => $request->number_can_invite,
                ]);
            }

            if ($request->type == 1) {
                $whatsAppReceptionServices = new WhatsAppReceptionServices;
                $whatsAppResponse = $whatsAppReceptionServices->receptionServices($request->phone, $event_name);
                if ($whatsAppResponse['status'] === false) {
                    return response()->json(['message' => $whatsAppResponse['message']], 422);
                }
            } else {
                $whatsAppExtraInviterServices = new WhatsAppExtraInviterServices;
                $whatsAppResponse = $whatsAppExtraInviterServices->extraInviterServices($request->phone, $event_name);
                if ($whatsAppResponse['status'] === false) {
                    return response()->json(['message' => $whatsAppResponse['message']], 422);
                }
            }

            DB::commit();

            return Response()->json([
                'message' => 'تم تسجيلك بنجاح! إذا لم تكن مسجلاً في التطبيق، يرجى تحميل التطبيق والتسجيل به باستخدام نفس الرقم الذي تلقيت منه الرسالة.',
                'data' => ReceptionResource::make($reception),
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return Response()->json(['message' => 'حدث خطأ أثناء المعالجة. يرجى المحاولة مرة أخرى.'], 500);
        }
    }

    public function update(UpdateReceptionRequest $request, $reception)
    {
        DB::beginTransaction();
        try {
            $invitation = Invitation::find($request->invitation_id);
            $number_of_compensation = floor($invitation->number_of_compensation);

            $remaining = $invitation->number_of_invitees + $invitation->additional_package + $number_of_compensation;

            if ($remaining < $request->number_can_invite) {
                return response()->json(['message' => 'العدد المضاف أكبر من المتبقي'], 422);
            }

            $difference = $request->number_can_invite - $reception->number_can_invite;

            if ($difference > 0) {
                // إذا تم إضافة مدعوين، يجب الخصم من الدعوة النظامية
                for ($i = 0; $i < $difference; $i++) {
                    if ($invitation->number_of_invitees > 0) {
                        $invitation->number_of_invitees -= 1;
                    } elseif ($invitation->additional_package > 0) {
                        $invitation->additional_package -= 1;
                    } elseif ($invitation->number_of_compensation > 0) {
                        $invitation->number_of_compensation -= 1;
                    }
                }
            } elseif ($difference < 0) {
                // إذا تم تقليل العدد، يجب إضافة المستحقات إلى الداعي النظامي
                $difference = abs($difference);
                $invitation->number_of_invitees += $difference;
            }

            $reception->update([
                'number_can_invite' => $request->number_can_invite,
                'number_can_invite_without_decrease' => $request->number_can_invite,
            ]);

            $invitation->save();

            DB::commit();

            return response()->json(['message' => 'تم التعديل بنجاح']);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['message' => 'حدث خطأ أثناء المعالجة. يرجى المحاولة مرة أخرى.'], 500);
        }
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $phone = $request->input('phone').'%';
        $users = User::where('phone', 'LIKE', $phone)->with('invitation')->get();

        return $users;
    }
    /*
        public function delete(Request $request)
        {
            $validatedData = $request->validate([
                'user_id' => ['required', Rule::exists('users', 'id')],
                'invitation_id' => ['required', Rule::exists('invitations', 'id')],
                'type' => 'required',
            ]);

            $userId = $validatedData['user_id'];
            $invitationId = $validatedData['invitation_id'];
            $invitation = Invitation::where('id', $invitationId)->first();
            $reception = Reception::where('user_id', $userId)->where('invitation_id', $invitationId)
                ->where('type', $request->type)
                ->first();

            if (! $reception) {
                return response()->json(['message' => 'Reception not found'], 404);
            }

            try {
                $number_can_invite = $reception->number_can_invite;
                $invitation->update([
                    'number_of_invitees' => $invitation->number_of_invitees + $number_can_invite,
                ]);
                $reception->delete();

                return response()->json(['message' => 'Deleted Successfully']);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Failed to delete the reception', 'error' => $e->getMessage()], 500);
            }
        }*/

    public function delete($reception)
    {
        $reception = Reception::where('id', $reception)->first();
        $invitation = $reception->invitation;

        if (! $reception) {
            return response()->json(['message' => 'Reception not found'], 404);
        }

        try {
            $number_can_invite = $reception->number_can_invite;
            $invitation->update([
                'number_of_invitees' => $invitation->number_of_invitees + $number_can_invite,
            ]);
            $reception->delete();

            return response()->json(['message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete the reception', 'error' => $e->getMessage()], 500);
        }
    }

    public function scanQRCodeForInvitee(Request $request)
    {
        DB::beginTransaction();

        try {
            $validatedData = $request->validate([
                'invitee_id' => ['required', Rule::exists('invitees', 'id')],
                'user_id' => ['required', Rule::exists('users', 'id')],
                'invitation_id' => ['required', Rule::exists('invitations', 'id')],
            ]);

            $invitee = Invitee::find($validatedData['invitee_id']);
            $qrCode = QR::where('invitee_id', $invitee->id)->first();

            if (! $qrCode) {
                DB::rollBack();

                return response()->json(['message' => 'Invalid QR Code'], 400);
            }

            $reception = Reception::where('user_id', $validatedData['user_id'])
                ->where('invitation_id', $validatedData['invitation_id'])
                ->where('type', '1')
                ->first();

            if (! $reception) {
                DB::rollBack();

                return response()->json(['message' => 'Unauthorized. You are not assigned to scan this QR Code.'], 403);
            }

            if ($qrCode->number_of_people == 0) {
                DB::rollBack();

                return response()->json(['message' => 'The allowed number of people for this QR Code has been reached.'], 400);
            }

            $qrCode->decrement('number_of_people');

            if ($invitee->externalId) {
                $this->updateMember($invitee->id, $validatedData['invitation_id']);
            }

            DB::commit();

            return response()->json(['message' => 'QR Code scanned successfully']);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'An error occurred: '.$e->getMessage()], 500);
        }
    }

    public function updateMember($inviteeID, $invitationID)
    {
        $invitee = Invitee::find($inviteeID);
        $qr = QR::where('invitee_id', $invitee->id)->first();
        $invitation = Invitation::find($invitationID);
        $expiryDate = Carbon::parse($invitation->miladi_date.$invitation->to)
            ->addHour()
            ->setTimezone('UTC')
            ->format('Y-m-d\TH:i:s\Z');

        if (! $invitee || ! $qr) {
            return response()->json(['error' => 'Invitee or QR not found'], 404);
        }

        $qrCodeData = json_encode([
            'InviteeName' => $invitee->name,
            'InviteeID' => $invitee->id,
        ]);

        $Token = env('PASSKIT_TOKEN');

        $client = new Client;

        try {
            $response = $client->put('https://api.pub2.passkit.io/members/member', [
                'headers' => [
                    'Authorization' => 'Bearer '.$Token,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'id' => $invitee->externalId,
                    'externalId' => $invitee->externalId,
                    'groupingIdentifier' => 'string',
                    'tierId' => 'purple_power',
                    'programId' => '2F7XGtvJIwWOERvK5S5NCA',
                    'expiryDate' => $expiryDate,
                    'person' => [
                        'forename' => (string) $qr->number_of_people_without_decrease,
                        'surname' => (string) $qr->number_of_people,
                        'emailAddress' => 'alidakak21@gmail.com',
                        'displayName' => $invitation->event_name,
                        'suffix' => $qrCodeData,
                        'salutation' => $invitee->name,
                    ],
                ],
            ]);

            $responseBody = json_decode($response->getBody(), true);

            return response()->json($responseBody);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
