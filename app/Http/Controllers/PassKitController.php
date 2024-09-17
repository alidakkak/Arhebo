<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Invitee;
use App\Models\QR;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PassKitController extends Controller
{
    public function createMember(Request $request)
    {
        $invitee = Invitee::find($request->invitee_id);
        $qr = QR::where('invitee_id', $invitee->id)->first();
        $invitation = Invitation::find($request->invitation_id);

        $qrCodeData = json_encode([
            'InviteeName' => $invitee->name,
            'InviteeID' => $invitee->id,
        ]);

        if (! $invitee || ! $qr) {
            return response()->json(['error' => 'Invitee or QR not found'], 404);
        }

        $Token = env('PASSKIT_TOKEN');

        $client = new Client;

        try {
            $response = $client->post('https://api.pub2.passkit.io/members/member', [
                'headers' => [
                    'Authorization' => 'Bearer '.$Token,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'id' => 's2',
                    'externalId' => 's71323',
                    'groupingIdentifier' => 'string',
                    'tierId' => 'purple_power',
                    'programId' => '2F7XGtvJIwWOERvK5S5NCA',
                    'person' => [
                        'forename' => (string) $qr->number_of_people_without_decrease,
                        'surname' => (string) $qr->number_of_people,
                        'emailAddress' => 'alidakak21@gmail.com',
                        'displayName' => $qrCodeData,
                        'suffix' => $invitation->event_name,
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

    public function updateMember(Request $request)
    {
        $invitee = Invitee::find($request->invitee_id);
        $qr = QR::where('invitee_id', $invitee->id)->first();
        $invitation = Invitation::find($request->invitation_id);

        $qrCodeData = json_encode([
            'InviteeName' => $invitee->name,
            'InviteeID' => $invitee->id,
        ]);

        if (! $invitee || ! $qr) {
            return response()->json(['error' => 'Invitee or QR not found'], 404);
        }

        $Token = env('PASSKIT_TOKEN');

        $client = new Client;

        $qr->decrement('number_of_people');
        try {
            $response = $client->put('https://api.pub2.passkit.io/members/member', [
                'headers' => [
                    'Authorization' => 'Bearer '.$Token,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'id' => '6lS156C7VFf47rk7NWjOjA',
                    'externalId' => 's71323',
                    'groupingIdentifier' => 'string',
                    'tierId' => 'purple_power',
                    'programId' => '2F7XGtvJIwWOERvK5S5NCA',
                    'person' => [
                        'forename' => (string) $qr->number_of_people_without_decrease,
                        'surname' => (string) $qr->number_of_people,
                        'emailAddress' => 'alidakak21@gmail.com',
                        'displayName' => $qrCodeData,
                        'suffix' => $invitation->event_name,
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
