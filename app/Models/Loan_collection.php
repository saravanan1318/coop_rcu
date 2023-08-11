<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_collection extends Model
{
    use HasFactory;

    protected $table = 'loan_collection';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
