<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drpds_salt extends Model
{
    use HasFactory;

    protected $table = 'drpds_salt';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
