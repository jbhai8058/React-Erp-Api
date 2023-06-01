<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function department()
    {
        return $this->hasOne(Department::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
