<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use App\Models\CouponCategory;
use App\Models\CouponPackage;
use App\Models\CouponUser;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function index()
    {
        $coupon = Coupon::all();

        return CouponResource::collection($coupon);
    }

    public function store(StoreCouponRequest $request)
    {
        try {
            DB::beginTransaction();
            $coupon = Coupon::create($request->all());

            foreach ($request->categories as $category) {
                CouponCategory::create([
                    'coupon_id' => $coupon->id,
                    'category_id' => $category,
                ]);
            }

            foreach ($request->packages as $package) {
                CouponPackage::create([
                    'coupon_id' => $coupon->id,
                    'package_id' => $package,
                ]);
            }
            DB::commit();

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => CouponResource::make($coupon),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateCouponRequest $request, $couponId)
    {
        try {
            DB::beginTransaction();
            $coupon = Coupon::find($couponId);

            if (! $coupon) {
                return response()->json(['message' => 'Not Found'], 404);
            }

            $coupon->update($request->all());

            $coupon->categories()->sync($request->categories);
            $coupon->packages()->sync($request->packages);
            DB::commit();

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => CouponResource::make($coupon),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($couponId)
    {
        $coupon = Coupon::find($couponId);
        if (! $coupon) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return CouponResource::make($coupon);
    }

    public function delete($couponId)
    {
        try {
            $coupon = Coupon::find($couponId);
            if (! $coupon) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $coupon->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => CouponResource::make($coupon),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function checkCoupon(StoreCouponRequest $request)
    {
        $user = auth()->user();

        try {
            // Fetch the coupon with the specified code
            $coupon = Coupon::where('coupon_code', $request->coupon_code)
                ->where('expiry_date', '>=', now()->format('Y-m-d'))
                ->where('number', '>', 0)
                ->first();

            if (! $coupon) {
                return response()->json(['error' => 'Invalid or expired coupon'], 400);
            }

            // Check if the coupon belongs to the provided category and package
            $belongsToCategory = CouponCategory::where('coupon_id', $coupon->id)
                ->where('category_id', $request->category_id)
                ->exists();

            $belongsToPackage = CouponPackage::where('coupon_id', $coupon->id)
                ->where('package_id', $request->package_id)
                ->exists();

            if (! $belongsToCategory || ! $belongsToPackage) {
                return response()->json(['error' => 'Coupon is not valid for this category or package'], 400);
            }

            // Check if the user has already used this coupon
            $userCouponUsage = DB::table('coupon_users')
                ->where('user_id', $user->id)
                ->where('coupon_id', $coupon->id)
                ->first();

            if ($userCouponUsage) {
                return response()->json(['error' => 'You have already used this coupon'], 400);
            }

            // Decrease the number of available coupons
            $coupon->decrement('number');

            // Log the coupon usage for the user
            CouponUser::create([
                'user_id' => $user->id,
                'coupon_id' => $coupon->id,
            ]);

            return response()->json(['offer' => $coupon->offer], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while processing the coupon'], 500);
        }
    }
}
