<?php

namespace App\Models;

use App\Http\Controllers\RechargeRecordController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    public function recharge()
    {
        return $this->hasMany(RechargeRecord::class);
    }

    protected $table = 'orders';
    protected $fillable = [
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
