<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposits extends Model
{
    use HasFactory;

    protected $table = 'deposits';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function deposittype() {
        return $this->hasOne('App\Models\Mtr_deposits','id','deposit_id');
    }
}
