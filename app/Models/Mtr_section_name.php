<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtr_section_name extends Model
{
    use HasFactory;
    protected $table = 'mtr_section_name';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
