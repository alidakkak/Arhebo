<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInputRequest;
use App\Http\Resources\InputResource;
use App\Models\Input;
use App\Models\Validate;

class InputController extends Controller
{
    public function store(StoreInputRequest $request)
    {
        $inputs = Input::create($request->all());
        if ($request->validates) {
            foreach ($request->validates as $validate) {
                Validate::create([
                    'input_id' => $inputs->id,
                    'name' => $validate['name'],
                    'message' => $validate['message'],
                    'message_ar' => $validate['message_ar'],
                ]);
            }
        }

        return InputResource::make($inputs);
    }

    public function delete($id)
    {
        $record = Input::find($id);

        if ($record) {
            $record->delete();

            return response()->json(['message' => 'Deleted']);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }
    }
}
