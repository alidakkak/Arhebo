<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInviteeRequest;
use App\Http\Requests\UpdateInviteeRequest;
use App\Http\Resources\InviteeResource;
use App\Http\Resources\ShowOrdersResource;
use App\Mail\EmailService;
use App\Models\Invitation;
use App\Models\Invitee;
use App\Models\QR;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use App\Statuses\InviteeTypes;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InviteeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->status == InviteeTypes::invited) {
            $invitee = Invitee::where('invitation_id', $request->invitation_id)->get();

            return InviteeResource::collection($invitee);
        } else {
            $invitee = Invitee::where('status', $request->status)
                ->where('invitation_id', $request->invitation_id)
                ->get();

            return InviteeResource::collection($invitee);
        }
    }

    public function generateQRCodeForInvitee($inviteeId)
    {
        $invitee = Invitee::find($inviteeId);
        $invitation = $invitee->invitation()->where('is_with_qr', 1)->first();
        if ($invitation) {
            $numberOfPeople = $invitee->number_of_people;
            for ($i = 0; $i < $numberOfPeople; $i++) {
                $qrCodeData = json_encode([
                    'InviteeNumber' => $i + 1,
                    'InviteeName' => $invitee->name,
                    'InviteeID' => $invitee->id,
                ]);
                $qrCode = QrCode::format('svg')
                    ->size(300)
                    ->generate($qrCodeData);
                $fileName = '/qr-codes/'.$invitee->id.'_'.$i.'.svg';
                $path = storage_path('app/public/'.$fileName);
                if (! file_exists(dirname($path))) {
                    mkdir(dirname($path), 0755, true);
                }
                file_put_contents($path, $qrCode);
                QR::create([
                    'invitee_id' => $invitee->id,
                    'qr_code' => '/storage'.$fileName,
                    'InviteeNumber' => $i + 1,
                ]);
            }
        }
    }

    public function store(StoreInviteeRequest $request)
    {
        DB::beginTransaction();
        try {
            ////  The total number of people invited to the invitation
            $number_of_people = invitee::where('invitation_id', $request->invitation_id)->sum('number_of_people');
            ////  The number of people in package detail
            $package_detail = Invitation::find($request->invitation_id)->packageDetail()->select('number_of_invitees')->first();
            $package_detail_number = $package_detail->number_of_invitees;
            $inviteesData = $request->input('invitees', []);
            $invitees = [];
            foreach ($inviteesData as $invitee) {
                if ($number_of_people + $invitee['count'] > $package_detail_number) {
                    return response()->json(['message' => 'You have reached the maximum number of invitees'.
                        ', The number of invitees you have added '.$number_of_people,
                    ]);
                }
                $uuid = Str::uuid();
                $newInvitee = Invitee::create([
                    'name' => $invitee['name'],
                    'phone' => $invitee['number'],
                    'number_of_people' => $invitee['count'],
                    'invitation_id' => $request->input('invitation_id'),
                    'uuid' => $uuid,
                    //                    'link'=>'show_invite/'.$uuid
                ]);
                $newInvitee->update([
                    'link' => 'https://gomaplustesting.tech/invitaion-card/'.$newInvitee->id.'?uuid='.$uuid,
                ]);
                $invitees[] = $newInvitee;
                $number_of_people += $invitee['count'];
                $this->generateQRCodeForInvitee($newInvitee->id);
            }
            $userEmail = 'firasaljabi1111@gmail.com';
            $link = $newInvitee->link;
            EmailService::sendHtmlEmail($userEmail, $link);
            DB::commit();
            return InviteeResource::collection($invitees);
          //  return response()->json(['message' => 'Added SuccessFully']);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'An error occurred while processing your request.'.$e->getMessage()], 500);
        }
    }

    /// API For conformed Or Rejected Invitation
    public function update(UpdateInviteeRequest $request, Invitee $invitee)
    {
        if($request->uuid !== $invitee->uuid){
            return Response()->json(['message' => 'false'], 403);
        }
        $status = $request->status;
        if ($status == InviteeTypes::rejected) {
            $this->validate($request, [
                'apology_message' => 'required',
            ]);
            $invitee->update([
                'status' => $status,
                'apology_message' => $request->apology_message,
            ]);
        } else {
            $invitee->update([
                'status' => $status,
            ]);
        }

        return response()->json(['message' => $status == 1 ? 'تم قبول الدعوة بنجاح' : 'تم رفض الدعوة بنجاح']);
    }

    public function showInvitationInfo(Request $request,Invitee $invitee) {
        if($invitee->uuid !== $request->uuid) {
            return response()->json(['message' => 'هذه الدعوة غير مخصصة لك'], 403);
        }
       return ShowOrdersResource::make($invitee);
    }

//    public function get_info_for_link($uuid)
//    {
//        $invitee = Invitee::where('uuid', $uuid)->first();
//        if ($invitee->status == InviteeTypes::waiting) {
//            return response()->json(
//                ['access' => true,
//                    'invitation' => [
//                        'category_name' => $invitee->invitation->category->name,
//                        'category_photo' => $invitee->invitation->category->image,
//                        'template_photo' => $invitee->invitation->Template->image],
//                ]
//            );
//        } else {
//            return response()->json(['access' => false], 403);
//        }
//    }

//    public function update_stauts($uuid, Request $request)
//    {
//        $invitee = Invitee::where('uuid', $uuid)->first();
//        if ($invitee->status == InviteeTypes::waiting) {
//            $invitee->update(['status' => $request->stauts]);
//        }
//
//        return response(['msg' => 'success']);
//    }
}
