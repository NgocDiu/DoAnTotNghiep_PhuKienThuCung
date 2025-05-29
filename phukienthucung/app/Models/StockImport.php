<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockImport extends Model
{
    protected $fillable = ['code', 'user_id', 'status', 'note'];

    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_DELETED = 'deleted';

    public function details()
    {
        return $this->hasMany(StockImportDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
