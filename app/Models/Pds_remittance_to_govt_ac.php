<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pds_remittance_to_govt_ac extends Model
{
    use HasFactory;

    protected $table = 'remittance_to_govt_ac';
    protected $primaryKey = 'id';

    public function region() {
        return $this->hasOne('App\Models\Mtr_region','id','region_id');
    }
}
