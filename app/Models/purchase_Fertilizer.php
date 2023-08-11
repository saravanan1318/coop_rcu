<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_Fertilizer extends Model
{
    use HasFactory;

    protected $table = 'purchase_Fertilizer';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
