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
        $ContactArray = json_decode($request->getContent(), true);

        $id          = $ContactArray['id'];
        $item_name   = $ContactArray['item_name'];
        $description = $ContactArray['description'];

        $result = Item::insert([
            'id'          => $id,
            'item_name'   => $item_name,
            'description' => $description,
        ]);

        if ($result == true) {
            return 'Item saved Sucessfully.....';
        } else {
            return 0;
        }
    }

    public function getMaxId(Request $request)
    {

        $ContactArray = json_decode($request->getContent(), true);

        $id = $ContactArray['id'];

        $result = Item::getmaxid($id);

        return response()->json(['max_id' => $result], 200);
    }
}