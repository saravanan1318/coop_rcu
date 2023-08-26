<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loan';
    protected $primaryKey = 'id';

    public function loantype() {
        return $this->hasOne('App\Models\Mtr_loan','id','loantype_id');
    }

}
