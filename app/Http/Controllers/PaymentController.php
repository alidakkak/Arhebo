<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponUser;
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
                'amount' => round($request->amount * 100),
                'currency' => 'sar',
                'source' => $request->stripeToken,
                'description' => 'Stripe Test Payment',
            ]);

            if ($request->has('coupon_id')) {
                $coupon = Coupon::find($request->coupon_id);
                if ($coupon && $coupon->number > 0) {
                    $coupon->decrement('number');

                    CouponUser::create([
                        'user_id' => auth()->id(),
                        'coupon_id' => $coupon->id,
                    ]);
                }
            }

            return response()->json(['success' => 'Payment successful']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
