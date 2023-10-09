<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jr_project extends Model
{
    use HasFactory;

    protected $table = 'jr_project';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
