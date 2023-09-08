<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jr_disqualify extends Model
{
    use HasFactory;

    protected $table = 'jr_disqualify';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
