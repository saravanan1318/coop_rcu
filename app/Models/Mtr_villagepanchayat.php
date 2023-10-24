<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtr_villagepanchayat extends Model
{
    use HasFactory;

    protected $table = 'mtr_villagePanchayat';
    protected $primaryKey = 'villagePanchayatID';
    public $timestamps = false;
}
