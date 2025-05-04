<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Address extends Model
{
    protected $table = 'address';
    protected $fillable = [
        'user_id', 'to_name', 'to_phone', 'to_address', 'to_ward_code', 'to_district_id', 'to_province_id',
        'ward_desc', 'district_desc', 'province_desc', 'is_default'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}