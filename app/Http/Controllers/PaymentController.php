<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        DB::beginTransaction();
        $user = auth()->user();
        Stripe::setApiKey(env('STRIPE_KEY'));

        try {
            if ($request->has('coupon_code')) {
                $coupon = Coupon::where('coupon_code', $request->coupon_code)
                    ->where('expiry_date', '>=', now())
                    ->where('number', '<=', 0)
                    ->first();

                if (! $coupon) {
                    return response()->json(['error' => 'Invalid or expired coupon'], 400);
                }

                $userCouponUsage = DB::table('user_coupons')
                    ->where('user_id', $user->id)
                    ->where('coupon_id', $coupon->id)
                    ->first();

                if ($userCouponUsage) {
                    return response()->json(['error' => 'You have already used this coupon'], 400);
                }

                $discountedAmount = $request->amount - ($request->amount * ($coupon->offer / 100));
                $finalAmount = $discountedAmount * 100;

                $coupon->decrement('number');

                DB::table('user_coupons')->insert([
                    'user_id' => $user->id,
                    'coupon_id' => $coupon->id,
                ]);
            } else {
                $finalAmount = $request->amount * 100;
            }

            Charge::create([
                'amount' => $finalAmount,
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
