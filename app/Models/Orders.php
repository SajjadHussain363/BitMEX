<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'orderNum',
        'MemberId',
        'username',
        'productInfo',
        'state',
        'direction',
        'positionOpenPoint',
        'closingPoint',
        'commissionBalance',
        'invalidOrderBalance',
        'effectiveOrderBalance',
        'actualProfitAndLoss',
        'balanceAfterPurchase',
        'singleControlOperation'
    ];
}
