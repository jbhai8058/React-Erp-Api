<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', // Add other fields here if needed
    ];

    protected $guarded = [];

    public static function getMaxId()
    {
        $result = DB::table('items')->max('item_id');
        return $result;
    }


    public static function fetchitem()
    {
        $result = DB::table('items')->get()->all();
        
        return $result;
    }
}
