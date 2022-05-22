<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Floor()
    {
        return $this->belongsTo(FloorList::class,'floor_id','id');
    }

    public function MaintenanceStatus()
    {
        return $this->hasMany(MaintenanceStatus::class,'maintenance_id','id');
    }
    

}
