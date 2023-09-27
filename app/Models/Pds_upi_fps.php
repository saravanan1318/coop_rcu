<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pds_upi_fps extends Model
{
    use HasFactory;

    protected $table = 'upi_fps';
    protected $primaryKey = 'id';

    public function region() {
        return $this->hasOne('App\Models\Mtr_region','id','region_id');
    }
}
