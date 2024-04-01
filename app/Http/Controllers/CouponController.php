<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use App\Models\CouponCategory;
use App\Models\CouponPackage;
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
}
