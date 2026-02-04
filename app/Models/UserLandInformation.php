<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLandInformation extends Model
{
    protected $fillable = [
        'user_id',
        'dag_no',
        'land_class',
        'land_area',
        'total_land',
    ];

}
