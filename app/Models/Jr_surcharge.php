<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jr_surcharge extends Model
{
    use HasFactory;

    protected $table = 'jr_surcharge';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
