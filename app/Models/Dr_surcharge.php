<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dr_surcharge extends Model
{
    use HasFactory;

    protected $table = 'dr_surcharge';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
