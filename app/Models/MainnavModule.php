<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainnavModule extends Model
{
    protected $table = 'mainnav_modules';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'module_id';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'module_name',
        'module_icon',
        'is_visible',
        'sort_order',
    ];

    public function submainnavModule()
    {
        return $this->hasMany(SubmainnavModule::class, 'module_id');
    }
}
