<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drpds_duesalt extends Model
{
    use HasFactory;

    protected $table = 'drpds_duesalt';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
