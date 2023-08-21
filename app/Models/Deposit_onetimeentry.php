<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit_onetimeentry extends Model
{
    use HasFactory;

    protected $table = 'deposit_onetimeentry';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
