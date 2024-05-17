<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class messageThanksToAttendees extends Command
{
    protected $signature = 'app:message-thanks-to-attendees';

    protected $description = 'A message of thanks to attendees';

    private $url;

    private $token;

    public function __construct()
    {
        parent::__construct();
        $this->url = env('WHATSAPP_API_URL');
        $this->token = env('WHATSAPP_API_TOKEN');
    }

    public function handle()
    {

    }
}
