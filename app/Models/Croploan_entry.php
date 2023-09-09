<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Croploan_entry extends Model
{
    use HasFactory;

    protected $table = 'croploan_entry';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
