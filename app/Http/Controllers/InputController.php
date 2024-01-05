<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInputRequest;
use App\Http\Resources\InputResource;
use App\Models\Input;
use App\Models\Validate;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function store(StoreInputRequest $request) {
        $inputs = Input::create($request->all());
        if($request->validates){
            foreach ($request->validates as $validate) {
                 Validate::create([
                   'input_id' => $inputs->id,
                   'name' => $validate['name'],
                    'message' => $validate['message'],
                ]);
            }
        }
        return InputResource::make($inputs);
    }
}
