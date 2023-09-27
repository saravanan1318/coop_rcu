<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pds_margin_money extends Model
{
    use HasFactory;

    protected $table = 'margin_money';
    protected $primaryKey = 'id';

    public function region() {
        return $this->hasOne('App\Models\Mtr_region','id','region_id');
    }
}
