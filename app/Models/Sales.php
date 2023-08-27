<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $primaryKey = 'id';

    public function saletype() {
        return $this->hasOne('App\Models\Mtr_Sale','id','sale_id');
    }

}
