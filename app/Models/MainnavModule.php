<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainnavModule extends Model
{

    public function submainnavModule()
    {
        return $this->hasMany(SubmainnavModule::class);
    }


    public function asidebars()
    {
        return $this->hasMany(Asidebar::class);
    }
}
