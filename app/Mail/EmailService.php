<?php

namespace App\Mail;

use Illuminate\Support\Facades\Http;

class EmailService
{
    public static function sendHtmlEmail($userEmail, $link)
    {
        $subject = 'Welcome to '.htmlspecialchars('Arhebo');
        $body = '
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f2f2f2;
                            margin: 0;
                            padding: 20px;
                        }
                        .container {
                            background-color: #ffffff;
                            padding: 20px;
                            border-radius: 5px;
                            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h1>Welcome to Our Company</h1>
                        <ul>
                            <li><strong>Email:</strong> '.htmlspecialchars($userEmail).'</li>
                            <li><strong>Link:</strong> '.htmlspecialchars($link).'</li>
                        </ul>
                    </div>
                </body>
                </html>
         ';
        // $apiUrl = 'https://emailnotification.time.gomaplus.tech:7217/api/sender/';
        // $apiKey = 'rm1GEVrZlW3HEgjR/CJjQRUYp3m7xoocfHlgW5SuNf2kyb1+1wPYQZUlycrkfZTMq0fuO5T1o+Tl0G0aWdhGp+f1Yd/JPmgGSi7UPCnzbMfqHOpt7H1WggMzq7lAP9Z9VAfQpdwkDD2HBY1F38n5qkex4V3jGCHq/YnNJC5mxt0=';

        $apiUrl = 'https://live-mt-server.wati.io/206676/api/sender/';
        $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI1MzI4YzY3Yi03Nzc0LTQyZmQtYTg5ZS0xNGYxOTgyMWNkYTAiLCJ1bmlxdWVfbmFtZSI6ImdjY0B3YXRpLmlvIiwibmFtZWlkIjoiZ2NjQHdhdGkuaW8iLCJlbWFpbCI6ImdjY0B3YXRpLmlvIiwiYXV0aF90aW1lIjoiMDQvMjcvMjAyNCAwMDoyMDozMiIsImRiX25hbWUiOiJtdC1wcm9kLVRlbmFudHMiLCJ0ZW5hbnRfaWQiOiIyMDY2NzYiLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOlsiVEVNUExBVEVfTUFOQUdFUiIsIkNPTlRBQ1RfTUFOQUdFUiIsIk9QRVJBVE9SIiwiREVWRUxPUEVSIiwiREFTSEJPQVJEX1ZJRVdFUiIsIkFVVE9NQVRJT05fTUFOQUdFUiJdLCJleHAiOjI1MzQwMjMwMDgwMCwiaXNzIjoiQ2xhcmVfQUkiLCJhdWQiOiJDbGFyZV9BSSJ9.JmZmuKBPy6HS2aoojgh6auKKwOvl92amx6eguABpJqk';

        $endpoint = 'htmlsend';
        $url = $apiUrl.$endpoint;

        $data = [
            'RecipientEmail' => $userEmail,
            'Subject' => $subject,
            'Body' => $body,
        ];

        $response = Http::withHeaders([
            'Api-key' => $apiKey,
            'Content-Type' => 'application/json',
        ])->withOptions([
            'verify' => false,
        ])->post($url, $data);

        return $response->json();
    }
}
