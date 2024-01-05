<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutAppRequest;
use App\Http\Resources\AboutAppResource;
use App\Models\AboutApp;
use Illuminate\Http\Request;

class AboutAppController extends Controller
{
    public function index() {
        $about = AboutApp::all();
        return AboutAppResource::collection($about);
    }

    public function store(StoreAboutAppRequest $request) {
        $about = AboutApp::create($request->all());
        return AboutAppResource::make($about);
    }
}
