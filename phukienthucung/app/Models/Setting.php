<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'name',
        'token',
        'shop_id',
        'phone',
        'address',

        'province_id',
        'province_name',
        'district_id',
        'district_name',
        'ward_code',
        'ward_name',

        'is_default'
    ];
}
