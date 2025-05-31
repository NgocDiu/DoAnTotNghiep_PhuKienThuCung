<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = ['user_id','ghn_tracking_code', 'address_id', 'Package', 'status', 'take_it', 'total_amount','discount_amount','grand_total', 'note', 'ship_fee','promotion_id'];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
    public function promotion(): BelongsTo
    {
        return $this->belongsTo(Promotion::class);
    }
    public function payment(): HasOne
        {
            return $this->hasOne(Payment::class);
        }
  

}