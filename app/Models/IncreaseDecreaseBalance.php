<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncreaseDecreaseBalance extends Model
{
    use HasFactory;

    protected $table = "increase_decrease_balances";

    protected $fillable = [
        'userAccount',
        'increaseDecreaseType',
        'increaseDecreaseAmount',
        'reasonForModification'
    ];
}
