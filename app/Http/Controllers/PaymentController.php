<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_KEY'));
        try {
            Charge::create([
                'amount' => $request->amount,
                'currency' => 'sar',
                'source' => $request->stripeToken,
                'description' => 'Stripe Test Payment',
            ]);

            return response()->json(['success' => 'Payment successful']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
