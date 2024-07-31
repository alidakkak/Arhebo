<?php

namespace App\Mail;

use Illuminate\Support\Facades\Http;

class EmailService
{
    public static function sendHtmlEmail($userEmail, $otp)
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
                        <h4>Ar7ebo, Digital Events Cards</h4>
                        <p>Your OTP for Code is: <strong>'.htmlspecialchars($otp).'</strong></p>
                    </div>
                </body>
                </html>
         ';
        $apiUrl = 'Http://ar7ebo.emailservice.serviceinhand.com:3332/api/Email/send-html';
        $apiKey = 'qncE+h/hdPXfI66aFev+lxDC289hqs81FTYcOagq/czMvtFvjDyOCOZ9My1krPA+tArbaFTOuryD+XQdL8xshg==';

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
        ])->post($apiUrl, $data);

        return $response->json();
    }
}
