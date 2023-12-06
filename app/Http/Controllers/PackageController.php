<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use App\Models\PackageDetail;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index (){
        $package = Package::all();
        return PackageResource::collection($package);
    }

    public function store(StorePackageRequest $request) {
        $request->validated($request->all());
        $packag = Package::create($request->all());
        if($request->package_detalis){
            foreach ($request->package_detalis as $package) {
                PackageDetail::create([
                    'package_id' => $packag->id,
                    'price' => $package['price'],
                    'number_of_invitees' => $package['number_of_invitees']
                ]);
            }
        }
        return PackageResource::make($packag);
    }
}
