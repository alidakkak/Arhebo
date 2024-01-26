<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdditionalPackageRequest;
use App\Http\Resources\AdditionalPackageResource;
use App\Models\AdditionalPackage;
use App\Models\InvitationAdditionalPackage;
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
        $package = AdditionalPackage::create($request->all());

        return AdditionalPackageResource::make($package);
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
