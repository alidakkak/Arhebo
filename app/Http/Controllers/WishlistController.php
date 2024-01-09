<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWishlistRequest;
use App\Http\Resources\WishlistResource;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class WishlistController extends Controller
{
    public function index(){
        $user = auth()->user();
        $wishlist = Wishlist::where('user_id', $user->id)
            ->get();
        return WishlistResource::collection($wishlist);
    }

    public function store(StoreWishlistRequest $request) {
        $user = auth()->user();
        $wishlist = Wishlist::create([
           'user_id' => $user->id,
           'template_id' => $request->template_id
        ]);
        return WishlistResource::make($wishlist);
    }

    public function switch(Wishlist $wishlist) {
        $wishlist->update([
           'isfavorite' =>  0  //! boolval($wishlist->isfavorite)
        ]);
        return WishlistResource::make($wishlist);
    }

    public function delete($template) {
        $user = auth()->user();
        $wishlist = Wishlist::where('template_id', $template)
            ->where('user_id', $user->id)->first();
        if (!$wishlist) {
            return response()->json(['message' => 'Wishlist not found'], 404);
        }
        try {
            $wishlist->delete();
            return response()->json(['message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete the wishlist', 'error' => $e->getMessage()], 500);
        }
    }

}
