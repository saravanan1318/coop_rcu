<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office_cm extends Model
{
    use HasFactory;
    protected $table = 'office_cm';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
