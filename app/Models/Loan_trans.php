<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_trans extends Model
{
    use HasFactory;

    protected $table = 'loan_trans';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function loantype() {
        return $this->hasOne('App\Models\Mtr_loan','id','loantype_id');
    }

}
