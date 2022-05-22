<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = "status_tbl";

    public function MaintenanceStatus()
    {
        return $this->hasMany(MaintenanceStatus::class,'status_id','id');
    }
}
