<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFAQRequest;
use App\Http\Resources\FAQResource;
use App\Models\FrequentlyAskedQuestion;

class FAQController extends Controller
{
    public function index()
    {
        $FAQ = FrequentlyAskedQuestion::all();

        return FAQResource::collection($FAQ);
    }

    public function store(StoreFAQRequest $request)
    {
        $FAQ = FrequentlyAskedQuestion::create($request->all());

        return FAQResource::make($FAQ);
    }
}
