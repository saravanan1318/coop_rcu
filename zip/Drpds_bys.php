<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drpds_bys extends Model
{
    use HasFactory;

    protected $table = 'drpds_bys';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
