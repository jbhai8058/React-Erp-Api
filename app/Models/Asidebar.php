<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asidebar extends Model
{
    protected $table = 'asidebars';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'asidebars_id';
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
        'module_id',
        'sub_module_id',
        'vr_title',
        'vr_link',
        'vr_type',
        'is_visible',
        'sort_order',
        'vr_rights',
        'vr_icon',
    ];

    public function mainnavModule()
    {
        return $this->belongsTo(MainnavModule::class, 'module_id', 'module_id');
    }

    public function submainnavModule()
    {
        return $this->belongsTo(SubmainnavModule::class, 'sub_module_id', 'sub_module_id');
    }
}