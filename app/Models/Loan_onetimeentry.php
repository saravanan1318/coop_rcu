<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_onetimeentry extends Model
{
    use HasFactory;

    protected $table = 'loan_onetimeentry';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
