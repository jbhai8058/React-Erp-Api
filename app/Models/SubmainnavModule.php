<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmainnavModule extends Model
{
    public function mainnavModule()
    {
        return $this->belongsTo(MainnavModule::class);
    }
}