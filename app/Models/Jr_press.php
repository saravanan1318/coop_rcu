<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jr_press extends Model
{
    use HasFactory;

    protected $table = 'jr_press';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
