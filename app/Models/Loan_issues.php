<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_issues extends Model
{
    use HasFactory;

    protected $table = 'loan_issues';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
