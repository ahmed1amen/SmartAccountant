<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    protected $fillable = [

        'IsSiteActive',
        'MessageEn',
        'messageAr',
        'ProgramStatus',
        'ProgramEndDate',
        "Capital",
        'AppName',
        'Email',
        'PhoneNumber',
        'Website',
        'SerialNumber',
        'Logo',
        'VAT',
        'AbsenceDiscountValue',
        'AbsenceDiscountType'
        ];




}
