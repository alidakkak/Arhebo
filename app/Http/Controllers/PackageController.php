<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Resources\PackageResource;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $package = Package::all();

        return PackageResource::collection($package);
    }

    public function store(StorePackageRequest $request)
    {
        try {
            $package = Package::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => PackageResource::make($package),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdatePackageRequest $request, $packageId)
    {
        try {
            $package = Package::find($packageId);
            if (! $package) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $package->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => PackageResource::make($package),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($packageId)
    {
        try {
            $package = Package::find($packageId);
            if (! $package) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $package->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => PackageResource::make($package),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
