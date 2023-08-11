<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_overallot extends Model
{
    use HasFactory;

    protected $table = 'loan_overallot';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
