<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReceptionRequest;
use App\Http\Resources\ReceptionResource;
use App\Models\Reception;
use App\Models\User;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    public function store(StoreReceptionRequest $request) {
        $reception = Reception::create($request->all());
        return ReceptionResource::make($reception);
    }

    public function search(Request $request) {
    $user = User::where('phone', $request->phone)->with('invitation')->get();
    return $user;
}

}
