<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promotion extends Model
{
    protected $fillable = ['code', 'description', 'discount_type', 'discount_value', 'start_date', 'end_date'`, 'usage_limit'`, 'is_active'];
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

  }