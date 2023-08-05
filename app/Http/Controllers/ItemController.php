<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function fetchItem()
    {
        // Retrieve the item from the database based on the provided ID
        $item = Item::all();
        return $item;
    }

    public function storeItem(Request $request)
    {
        $ContactArray = json_decode($request->getContent(), true);

        $id = $ContactArray['id'];
        $item_name = $ContactArray['item_name'];
        $description = $ContactArray['description'];

        $result = Item::insert([
            'id' => $id,
            'item_name' => $item_name,
            'description' => $description,
        ]);

        if ($result == true) {
            return 'Item saved Sucessfully.....';
        } else {
            return 0;
        }
    }

    public function getMaxId()
    {
        $result = Item::getMaxId() + 1;
        return json_encode($result);
    }
}