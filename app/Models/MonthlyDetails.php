<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyDetails extends Model
{
    use HasFactory;

    protected $table = 'monthly_details';
    protected $fillable = [
        'employee_name',
        'employee_phone',
        'total_tasks',
        'done_tasks',
        'pending_tasks',
    ];
}
