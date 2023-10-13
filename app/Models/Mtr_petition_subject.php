<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtr_petition_subject extends Model
{
    use HasFactory;
    protected $table = 'mtr_petition_subject';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
