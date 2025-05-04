<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ProductImage extends Model
{
    protected $fillable = ['product_id', 'image_url', 'is_main'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}