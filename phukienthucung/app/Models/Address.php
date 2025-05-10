<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    protected $fillable = [
        'user_id', 'to_name', 'to_phone', 'to_address',
        'to_ward_code', 'to_district_id', 'to_province_id',
        'ward_desc', 'district_desc', 'province_desc', 'full_address', 'is_default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
