<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Http\Resources\OffersResource;
use App\Models\Offer;

class OffersController extends Controller
{
    public function index()
    {
        $offer = Offer::all();

        return OffersResource::collection($offer);
    }

    public function store(StoreOfferRequest $request)
    {
        $request->validated($request->all());
        $offer = Offer::create($request->all());

        return OffersResource::make($offer);
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $request->validated($request->all());
        $offer->update($request->all());

        return OffersResource::collection($offer);
    }

    public function delete(Offer $offer)
    {
        $offer->delete();

        return response([
            'Deleted SuccessFully',
            OffersResource::make($offer),
        ]);
    }
}
