<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RTI extends Model
{
    use HasFactory;
    protected $fillable = [
        '_token',
        'name',
        'region',
        'petitionrecieved',
        'fileNo',
        'frwdsectionType',
        'frwdsection',
        'frwdregion',
        'frwdother',
        'whompassed',
        'disposaldateofpetition',
        // Add _token to the fillable array
        // Other fields that you want to allow for mass assignment
    ];
    protected $table = 'rti_petition';
    protected $primaryKey = 'id';
}
