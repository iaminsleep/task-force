<?php

namespace App\Http\Controllers;

use App\Models\Favourite;

class FavouriteController extends Controller
{
    public function add($id) {
        Favourite::create([
            'user_id' => auth()->user()->id,
            'favouritable_id' => $id,
        ]);

        return back();
    }

    public function delete($id) {
        Favourite::findOrFail($id)->delete();

        return back();
    }
}
