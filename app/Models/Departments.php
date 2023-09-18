<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;


    protected $primaryKey = 'dept_id';


    protected $fillable = ['dept_id', 'dept_name', 'dept_address'];

    public $timestamps = true;


    protected $guarded = [];
}
