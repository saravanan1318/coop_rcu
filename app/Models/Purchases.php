<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;

    protected $table = 'purchases';
    protected $primaryKey = 'id';


    public function purchasetype() {
        return $this->hasOne('App\Models\Mtr_purchase','id','purchase_id');
    }

}
