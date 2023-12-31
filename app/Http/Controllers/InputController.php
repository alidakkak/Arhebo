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
        $request->validated($request->all());
        $inputs = Input::create($request->all());
        if($request->validates){
            foreach ($request->validates as $validate) {
                $validate = Validate::create([
                   'input_id' => $inputs->id,
                   'name' => $validate['name']
                ]);
            }
        }
        return InputResource::make($inputs);
    }
}
