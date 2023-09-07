<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dr_dai extends Model
{
    use HasFactory;

    protected $table = 'dr_dai';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
