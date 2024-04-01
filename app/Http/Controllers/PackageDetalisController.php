<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageDetalisRequest;
use App\Http\Requests\UpdatePackageDetalisRequest;
use App\Http\Resources\PackageDetalisResource;
use App\Models\Package;
use App\Models\PackageDetail;

class PackageDetalisController extends Controller
{
    public function store(StorePackageDetalisRequest $request)
    {
        try {
            $packageDetails = PackageDetail::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => PackageDetalisResource::make($packageDetails),
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

    public function getPackageDetailsByPackageId($packageId)
    {
        $package = Package::find($packageId);
        if (! $package) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $packageDetails = PackageDetail::where('package_id', $package->id)->get();

        return PackageDetalisResource::collection($packageDetails);
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
