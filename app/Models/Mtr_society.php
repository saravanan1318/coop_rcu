<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtr_society extends Model
{
    use HasFactory;

    protected $table = 'mtr_society';
    protected $primaryKey = 'id';

    public function region()
    {
        return $this->hasOne(Mtr_region::class);
    }

    public function circle()
    {
        return $this->hasOne(Mtr_circle::class);
    }

    public function societytype()
    {
        return $this->hasOne(Mtr_societytype::class);
    }

}
