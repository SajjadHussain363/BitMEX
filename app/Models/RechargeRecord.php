<?php

namespace App\Models;

use App\Http\Controllers\OrdersController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RechargeRecord extends Model
{
    use HasFactory;

    // public function OrderNum() {
     
    //     return $this->belongsTo(Orders::class);
    // }

    protected $table = "recharge_records";

    protected $fillable = [ 
        'rechargeAmount',
        'giftAmount',
        'paymentMethod',
        'state',
        'reasonRejection'
    ];

    
}
