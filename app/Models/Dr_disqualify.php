<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dr_disqualify extends Model
{
    use HasFactory;

    protected $table = 'dr_disqualify';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
