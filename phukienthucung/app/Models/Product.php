<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'price', 'discount_price', 'stock_quantity',
        'is_active', 'brand_id', 'is_discount'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function attributeValues(): HasMany
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }
    public function latestStockImportDetail()
    {
        return $this->hasOne(\App\Models\StockImportDetail::class, 'product_id')
            ->whereHas('stockImport', function ($query) {
                $query->where('status', 'confirmed');
            })
            ->latest('created_at'); // Hoặc 'created_at' tùy logic
    }
    
}