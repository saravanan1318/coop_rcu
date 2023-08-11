<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit_outstandings extends Model
{
    use HasFactory;

    protected $table = 'deposit_outstandings';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
