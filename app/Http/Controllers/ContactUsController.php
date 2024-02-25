<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactUsRequest;
use App\Http\Resources\ContactUsResource;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $about = ContactUs::all();

        return ContactUsResource::collection($about);
    }

    public function store(StoreContactUsRequest $request)
    {
        $about = ContactUs::create($request->all());

        return ContactUsResource::make($about);
    }
}
