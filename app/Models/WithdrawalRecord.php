<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalRecord extends Model
{
    use HasFactory;

    protected $table = 'withdrawal_records';

    protected $fillable = [
        'serialNum',
        'withdrawalAmount',
        'handlingFee',
        'actualArrival',
        'bankDeposit',
        'denialReason',
        'processingProgress'
    ];
}
