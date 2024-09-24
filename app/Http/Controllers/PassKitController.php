<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Invitee;
use App\Models\QR;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PassKitController extends Controller
{
    public function createMember(Request $request)
    {
        // Find Invitee and QR, and handle if they are missing
        $invitee = Invitee::find($request->invitee_id);
        $qr = QR::where('invitee_id', $invitee?->id)->first();
        $invitation = Invitation::find($request->invitation_id);
        $expiryDate = Carbon::parse($invitation->hijri_date . $invitation->to)
            ->addHour()
            ->setTimezone('UTC')
            ->format('Y-m-d\TH:i:s\Z');

        if ($invitee->externalId) {
            return response()->json(['id' => $invitee->externalId]);
        }

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
            $response = $client->post('https://api.pub2.passkit.io/members/member', [
                'headers' => [
                    'Authorization' => 'Bearer '.$Token,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'id' => '$invitee->id',
                    'externalId' => $invitee->uuid,
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

            if ($response->getStatusCode() !== 200) {
                return response()->json(['error' => 'Failed to create member, API returned error'], $response->getStatusCode());
            }

            $responseBody = json_decode($response->getBody(), true);

            $invitee->update([
                'externalId' => $responseBody['id'],
            ]);

            return response()->json($responseBody);

        } catch (\Exception $e) {
            return response()->json(['error' => 'An internal server error occurred: '.$e->getMessage()], 500);
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
                    'id' => $invitee->externalId,
                    'externalId' => $invitee->externalId,
                    'groupingIdentifier' => 'string',
                    'tierId' => 'purple_power',
                    'programId' => '2F7XGtvJIwWOERvK5S5NCA',
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
