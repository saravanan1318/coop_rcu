<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_annual extends Model
{
    use HasFactory;

    protected $table = 'loan_annual';
    protected $primaryKey = 'id';

}
