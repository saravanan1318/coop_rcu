<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeofCase extends Model
{
    use HasFactory;
    protected $table = 'mtr_typeofcase';
    protected $primaryKey = 'id';
}
