<?php

namespace App\Http\Controllers;

use App\Models\HistoryPayment;
use Illuminate\Http\Request;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = HistoryPayment::create([
                'amount' => $request->amount * 100,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment Description',
            ]);

            return response()->json(['success' => 'Payment successful']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
