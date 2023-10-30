<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CurrencyData extends Model
{
    protected $table = 'currency_data'; // Set the table name

    protected $fillable = [
        'currency',
        'profit_and_loss',
        'date_time',
        'buy_price',
        'sell_price',
        'duration',
    ];
}