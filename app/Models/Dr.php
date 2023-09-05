<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dr extends Model
{
    use HasFactory;

    protected $table = 'dr';
    protected $primaryKey = 'id';
    // public $timestamps = false;
}
