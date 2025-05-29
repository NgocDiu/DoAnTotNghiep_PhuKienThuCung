<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockImportDetail extends Model
{
    protected $fillable = ['stock_import_id', 'product_id', 'quantity', 'unit_price'];

    public function import()
    {
        return $this->belongsTo(StockImport::class, 'stock_import_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
