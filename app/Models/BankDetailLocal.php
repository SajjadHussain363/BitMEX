<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BankDetailLocal extends Model
{
    protected $table = 'bankdetailslocal';

    protected $fillable = [
    'Name',
    'BankCardNumber',
    'BankName',
    'AccountProvince',
    'user_id'
    ];

}
