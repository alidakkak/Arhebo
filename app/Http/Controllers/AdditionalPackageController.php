<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdditionalPackageRequest;
use App\Http\Requests\UpdateAdditionalPackageRequest;
use App\Http\Resources\AdditionalPackageResource;
use App\Models\AdditionalPackage;
use App\Models\Invitation;
use App\Models\InvitationAdditionalPackage;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();

        try {
            $validateData = $request->validate([
                'invitation_id' => ['required', 'exists:invitations,id'],
                'additional_package_id' => ['required', 'exists:additional_packages,id'],
            ]);
            InvitationAdditionalPackage::create($validateData);

            $additionalPackage = AdditionalPackage::find($validateData['additional_package_id']);

            $invitation = Invitation::find($validateData['invitation_id']);

            $newTotalInvitees = $additionalPackage->number_of_invitees + ($invitation->additional_package);

            $invitation->update([
                'additional_package' => $newTotalInvitees,
            ]);

            DB::commit();

            return response()->json(['message' => 'Added successfully']);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'An error occurred: '], 500);
        }
    }
}
