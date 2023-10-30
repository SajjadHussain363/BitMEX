<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BankDetail extends Model
{
    protected $table = 'BankDetails';

    protected $fillable = [
    'Name',
    'BankCardNumber',
    'BankName',
    'AccountProvince',
    'AccountOpeningDate',
    'IdentityID',
    'InternationalRemittanceCode',
    'ContactNumber',
    'user_id'
     ];

}
