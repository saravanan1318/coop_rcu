<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtr_region extends Model
{
    use HasFactory;

    protected $table = 'mtr_region';
    protected $primaryKey = 'id';

    public function circle()
    {
        return $this->hasMany(Mtr_circle::class);
    }

    public function societytype()
    {
        return $this->hasMany(Mtr_societytype::class);
    }

    public function society()
    {
        return $this->hasMany(Mtr_society::class);
    }

}
