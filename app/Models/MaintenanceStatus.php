<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Status()
    {
        return $this->belongsTo(Status::class,'status_id','id');
    }

    public function Maintenance()
    {
        return $this->belongsTo(MaintenanceModel::class,'maintenance_id','id');
    }

    public function getStatus()
    {
        echo "hahaha";
    }
}
