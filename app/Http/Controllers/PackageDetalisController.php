<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageDetalisRequest;
use App\Http\Requests\UpdatePackageDetalisRequest;
use App\Http\Resources\PackageDetalisResource;
use App\Models\PackageDetail;

class PackageDetalisController extends Controller
{
    public function store(StorePackageDetalisRequest $request)
    {
        try {
            $createdPackageDetails = [];
            foreach ($request->package_details as $package) {
                $createdPackageDetails[] = PackageDetail::create([
                    'package_id' => $request->package_id,
                    'price' => $package['price'],
                    'price_qr' => $package['price_qr'],
                    'number_of_invitees' => $package['number_of_invitees'],
                ]);
            }

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => PackageDetalisResource::collection($createdPackageDetails),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function update(UpdatePackageDetalisRequest $request, $packageDetailsId)
    {
        try {
            $packageDetails = PackageDetail::find($packageDetailsId);
            if (! $packageDetails) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $packageDetails->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => PackageDetalisResource::make($packageDetails),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($packageDetailsId)
    {
        try {
            $packageDetails = PackageDetail::find($packageDetailsId);
            if (! $packageDetails) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $packageDetails->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => PackageDetalisResource::make($packageDetails),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
