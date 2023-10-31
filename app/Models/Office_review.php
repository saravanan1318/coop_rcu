<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office_review extends Model
{
    use HasFactory;
    protected $table = 'office_review';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
