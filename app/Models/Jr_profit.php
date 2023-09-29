<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jr_profit extends Model
{
    use HasFactory;

    protected $table = 'jr_profit';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
