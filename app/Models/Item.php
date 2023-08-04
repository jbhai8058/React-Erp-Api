<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', // Add other fields here if needed
    ];

    public static function getmaxid($id)
    {

        $result = Item::where('id' , $id)->max('id') + 1;

        return response()->json($result);
    }
}
