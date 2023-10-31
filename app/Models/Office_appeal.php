<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office_appeal extends Model
{
    use HasFactory;
    protected $table = 'office_appeal';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
