<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function fetchItem(Request $request)
    {
        $ContactArray = json_decode($request->getContent(), true);

        $id = $ContactArray['id'];

        $result = Item::fetch([
            'item_id' => $id
        ]);

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
        $contactArray = json_decode($request->getContent(), true);

        $id = $contactArray['id'];
        $item_name = $contactArray['item_name'];
        $description = $contactArray['description'];

        $existingItem = Item::where('item_id', $id)->first();

        if ($existingItem) {
            // Update the existing item
            $result = $existingItem->update([
                'item_name' => $item_name,
                'description' => $description,
            ]);
        } else {
            // Insert a new item
            $result = Item::insert([
                'item_id' => $id,
                'item_name' => $item_name,
                'description' => $description,
            ]);
        }

        if ($result) {
            return 'Item saved successfully.';
        } else {
            return 'An error occurred while saving the item.';
        }
    }


    public function getMaxId()
    {
        $result = Item::getMaxId() + 1;
        return json_encode($result);
    }

    public function deleteitem(Request $request)
    {
        $contactArray = json_decode($request->getContent(), true);

        $id = $contactArray['id'];


        $itemToDelete = Item::where('item_id', $id)->first();

        if ($itemToDelete) {
            $result = $itemToDelete->delete();

            if ($result) {
                return 'Item deleted successfully.';
            } else {
                return 'An error occurred while deleting the item.';
            }
        } else {
            return 'Item not found.';
        }
    }

    public function fetchItems()
    {
        $items = Item::all();

        return response()->json($items);
    }
}