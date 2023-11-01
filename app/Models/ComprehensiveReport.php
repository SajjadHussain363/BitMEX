<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprehensiveReport extends Model
{
    use HasFactory;

    protected $table = "comprehensive_reports";

    protected $fillable = [ 
        'empName',
        'phone',
        'address'
    ];


}
