<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asidebar extends Model
{

    public function mainnavModule()
    {
        return $this->belongsTo(MainnavModule::class);
    }

    public function submainnavModule()
    {
        return $this->belongsTo(SubmainnavModule::class, 'sub_module_id');
    }
}