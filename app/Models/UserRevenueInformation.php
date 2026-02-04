<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRevenueInformation extends Model
{
    protected $fillable = [
        'user_id',
        'previous_3_years_arrears',
        'arrears_of_last_3_years',
        'current_year_demand_and_surcharge',
        'total_demand',
        'total_arrear',
        'total_collection',
        'total_balance',
        'remarks',
    ];

}
