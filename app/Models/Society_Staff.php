<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society_Staff extends Model
{
    use HasFactory;

    protected $fillable = [

        'region', 'circle', 'society', 'PFNO', 'staffName', 'DOB', 'address', 'mobile', 'aadhar', 'pan', 'educationQualification', 'isObtainCoopTraing', 'yearofCoopTraingCompleation', 'appointmentType', 'ModeOFAppointment', 'fristCadre', 'dateOfJoining', 'presentWorkingCadre', 'DOJ_presentcadre', 'payScale', 'presentPay', 'DOP_Paysanctioned', 'DO_NextIncrement', 'nextPromotion', 'isonDeputation', 'deputatedSociety', 'DO_deputatedPeriod'

    ];
    protected $table = 'societystaff';
    protected $primaryKey = 'id';
}
