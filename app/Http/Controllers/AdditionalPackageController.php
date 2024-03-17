<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdditionalPackageRequest;
use App\Http\Requests\UpdateAdditionalPackageRequest;
use App\Http\Resources\AdditionalPackageResource;
use App\Models\AdditionalPackage;
use App\Models\InvitationAdditionalPackage;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdditionalPackageController extends Controller
{
    public function index()
    {
        $package = AdditionalPackage::all();

        return AdditionalPackageResource::collection($package);
    }

    public function store(StoreAdditionalPackageRequest $request)
    {
        try {
            $package = AdditionalPackage::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => AdditionalPackageResource::make($package),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateAdditionalPackageRequest $request, $Id)
    {
        try {
            $package = AdditionalPackage::find($Id);
            if (! $package) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $package->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => AdditionalPackageResource::make($package),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($Id)
    {
        try {
            $package = AdditionalPackage::find($Id);
            if (! $package) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $package->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => AdditionalPackageResource::make($package),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /////  Add Additional Package to add new invitee
    public function additionalInvitee(Request $request)
    {
        $validateData = $request->validate([
            'invitation_id' => ['required', Rule::exists('invitations', 'id')],
            'additional_package_id' => ['required', Rule::exists('additional_packages', 'id')],
        ]);
        InvitationAdditionalPackage::create($validateData);

        return response()->json(['message' => 'Added SuccessFully']);
    }
}
