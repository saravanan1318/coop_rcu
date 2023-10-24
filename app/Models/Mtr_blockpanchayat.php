<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtr_blockpanchayat extends Model
{
    use HasFactory;

    protected $table = 'mtr_blockpanchayat';
    protected $primaryKey = 'blockPanchayatID';
    public $timestamps = false;
}
