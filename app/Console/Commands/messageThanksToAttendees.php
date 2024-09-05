<?php

namespace App\Console\Commands;

use App\Models\Invitation;
use App\Statuses\InviteeTypes;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class messageThanksToAttendees extends Command
{
    protected $signature = 'app:message-thanks-to-attendees';

    protected $description = 'A message of thanks to attendees';

    private $url;

    private $token;

    public function __construct()
    {
        parent::__construct();
        $this->url = env('WHATSAPP_API_URL_SEND_TEMPLATE_MESSAGES');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function handle() {

        $now = Carbon::now()->format('Y-m-d H:i');

        $invitations = Invitation::whereRaw("STR_TO_DATE(CONCAT(miladi_date, ' ', `to`), '%Y-%m-%d %H:%i') <= ?", [$now])
            ->whereRaw("STR_TO_DATE(CONCAT(miladi_date, ' ', `to`), '%Y-%m-%d %H:%i') >= ?", [Carbon::now()->subMinutes(5)->format('Y-m-d H:i')])
            ->get();

        foreach ($invitations as $invitation) {
            $result = $this->sendWhatsAppReminder($invitation);
            if ($result['status']) {
                $this->info('Reminder sent successfully for invitation ID: '.$invitation->id);
            } else {
                $this->error('Failed to send reminder for invitation ID: '.$invitation->id.' with error: '.$result['message']);
            }
        }
    }

    private function sendWhatsAppReminder($invitation)
    {
        $invitees = $invitation->invitee()->where('status', InviteeTypes::confirmed)->get(['name', 'phone']);
        if ($invitees->isEmpty()) {
            return ['status' => false, 'message' => 'This Invitation does not have invitees'];
        }

        $event_name = $invitation->event_name;
        $inviter = $invitation->inviter;
        $receivers = [];
        foreach ($invitees as $invitee) {
            $receivers[] = [
                'whatsappNumber' => $invitee->phone,
                'customParams' => [
                    ['name' => 'name', 'value' => $invitee->name],
                    ['name' => 'inveter_name', 'value' => $inviter],
                    ['name' => 'event_type', 'value' => $event_name],
                ],
            ];
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'template_name' => 'thanks_inv_ar',
            'broadcast_name' => 'thanks_inv_ar',
            'receivers' => $receivers,
        ]);

        $responseData = json_decode($response->body(), true);
        $result = $responseData['result'] ?? false;

        if ($result) {
            return ['status' => true, 'message' => 'Reminder sent successfully'];
        } else {
            $errors = $responseData['errors'] ?? [];

            return ['status' => false, 'message' => 'Failed to send reminder', 'errors' => $errors];
        }
    }
}
