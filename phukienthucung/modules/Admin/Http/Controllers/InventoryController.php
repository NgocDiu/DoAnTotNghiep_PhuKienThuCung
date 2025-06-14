<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\StockImport;
use App\Models\StockImportDetail;
use App\Models\Order;
use App\Models\OrderItem; // <- đây là model bạn đang có
use App\Models\User;
use Auth;
use DB;

class InventoryController extends Controller
{
  public function inventory()
  {
    $products = Product::with(['brand', 'categories'])
    ->orderBy('stock_quantity', 'asc')
    ->get();
  
      return view('admin::inventory.index', compact('products'));
  }
  public function importHistory()
  {
      $imports = StockImport::with(['details.product', 'user'])
          ->where('status', 'confirmed')
          ->orderByDesc('created_at')
          ->get();

      return view('admin::inventory.import_history', compact('imports'));
  }
  public function exportHistory()
  {
    $orders = Order::with(['items.product', 'user'])
    ->whereNotIn('status', ['returned', 'cancelled','pending'])
    ->orderBy('created_at', 'desc')
    ->get();


      return view('admin::inventory.export_history', compact('orders'));
  }

}
