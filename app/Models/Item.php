<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'item_id';


    protected $fillable = ['item_id', 'item_name', 'description'];

    public $timestamps = false;


    protected $guarded = [];

    public static function getMaxId()
    {
        $result = DB::table('items')->max('item_id');
        return $result;
    }
    public static function fetch($item_id)
    {
        $result = DB::table('items')
            ->where('item_id', $item_id)
            ->get();

        return $result;
    }
}
