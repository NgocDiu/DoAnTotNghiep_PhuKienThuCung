<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Payment extends Model
{
    protected $table = 'payment';
    protected $fillable = ['order_id', 'payment_method', 'amount', 'status', 'payment_time'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}