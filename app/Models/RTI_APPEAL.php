<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RTI_APPEAL extends Model
{
    use HasFactory;
    protected $fillable = [
        '_token',
        'name',
        'region',
        'appealDate',
        'fileNo',
        'frwdsectionType',
        'frwdsection',
        'frwdregion',
        'frwdother',
        'finalOrderPassed',
        'orderPass',
        'disposaldateofAppeal',
        'TNIC'
        // Add _token to the fillable array
        // Other fields that you want to allow for mass assignment
    ];
    protected $table = 'rti_appeal';
    protected $primaryKey = 'id';
}
