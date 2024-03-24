<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
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
                    'category_id' => $category['category_id'],
                ]);
            }

            foreach ($request->packages as $package) {
                CouponPackage::create([
                    'coupon_id' => $coupon->id,
                    'package_id' => $package['package_id'],
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
}
