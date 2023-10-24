<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtr_districts extends Model
{
    use HasFactory;

    protected $table = 'mtr_districts';
    protected $primaryKey = 'districtID';
    public $timestamps = false;
}
