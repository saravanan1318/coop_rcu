<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtr_circle extends Model
{
    use HasFactory;

    protected $table = 'mtr_circle';
    protected $primaryKey = 'id';

    public function region()
    {
        return $this->hasOne(Mtr_region::class);
    }
}
