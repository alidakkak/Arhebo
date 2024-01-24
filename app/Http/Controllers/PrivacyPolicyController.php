<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrivacyPolicyRequest;
use App\Http\Resources\PrivacyPolicyResource;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $privacy = PrivacyPolicy::all();

        return PrivacyPolicyResource::collection($privacy);
    }

    public function store(StorePrivacyPolicyRequest $request)
    {
        $request->validated($request->all());
        $privacy = PrivacyPolicy::create($request->all());

        return PrivacyPolicyResource::make($privacy);
    }
}
