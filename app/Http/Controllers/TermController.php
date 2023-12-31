<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTermRequest;
use App\Http\Resources\TemplateResource;
use App\Http\Resources\TermResource;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index() {
        $term = Term::all();
        return TermResource::collection($term);
    }

    public function store(StoreTermRequest $request) {
        $request->validated($request->all());
        $term = Term::create($request->all());
        return TermResource::make($term);
    }
}
