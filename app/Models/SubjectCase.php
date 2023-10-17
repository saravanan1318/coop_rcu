<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectCase extends Model
{
    use HasFactory;
    protected $table = 'mtr_subject_of_case';
    protected $primaryKey = 'id';
}
