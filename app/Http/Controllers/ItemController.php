<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function fetchItem(Request $request)
    {
        $item_id = json_decode($request->input('item_id'), true);;
        $result = Item::fetch($item_id);

        $response = '';
        if ($result === false) {
            $response = 'false';
        } else {
            $response = $result;
        }

        return json_encode($response);
    }

    public function storeItem(Request $request)
    {
        $ContactArray = json_decode($request->getContent(), true);

        $id = $ContactArray['id'];
        $item_name = $ContactArray['item_name'];
        $description = $ContactArray['description'];

        $result = Item::insert([
            'item_id' => $id,
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