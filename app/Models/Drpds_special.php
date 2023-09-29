<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drpds_special extends Model
{
    use HasFactory;

    protected $table = 'drpds_special';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
