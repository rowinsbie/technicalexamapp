<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Maintenance()
    {
        return $this->hasMany(MaintenanceModel::class,'floor_id','id');
    }
}
