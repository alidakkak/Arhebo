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
        $receptionData = $request->input('receptions', []);
        $receptions = [];
        foreach ($receptionData as $reception) {
            $isExist = Reception::where('user_id', $reception['user_id'])
                ->where('invitation_id', $reception['invitation_id'])
                ->exists();
            if ($isExist) {
                continue;
            }
            $newReception = Reception::create([
                'user_id' => $reception['user_id'],
                'invitation_id' => $reception['invitation_id'],
            ]);
            $receptions[] = $newReception;
        }
        return ReceptionResource::collection($receptions);
    }


    public function search(Request $request) {
    $user = User::where('phone', $request->phone)->with('invitation')->get();
    return $user;
    }

}
