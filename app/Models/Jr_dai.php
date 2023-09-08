<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jr_dai extends Model
{
    use HasFactory;

    protected $table = 'jr_dai';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
