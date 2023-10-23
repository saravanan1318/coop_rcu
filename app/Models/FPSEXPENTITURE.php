<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FPSEXPENTITURE extends Model
{
    use HasFactory;

    protected $fillable = [
        'region', 'FTFPS', 'FPSRental', 'contiogencharge', 'tpexpense', 'rentexpense', 'ebcharge', 'printstation', 'maintanaceexpense', 'otherexpense', 'totalexpense', 'marginmoney', 'saleemptygunnies', 'totalincome', 'difference'
    ];
    protected $table = 'fpsexpenseandincome';
    protected $primaryKey = 'id';
}
