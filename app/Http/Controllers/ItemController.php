<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function fetchitem()
    {
        $result = Item::all();
        
        return $result;
    }

    public function storeItem(Request $request)
    {
        Item::insert([
            'item_name' => $request->item_name,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Item inserted successfully',
        ]);
    }
}
