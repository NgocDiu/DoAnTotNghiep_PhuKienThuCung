<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\StockImport;
use App\Models\StockImportDetail;

use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

     
     
     public function index()
     {
         $totalCustomers = User::where('group', 'customer')->count();
         $totalStaff     = User::where('group', 'employee')->count();
         $totalOrders    = Order::count();
         $totalProducts  = Product::count();
     
         $thisMonth  = Carbon::now()->startOfMonth();
         $lastMonth  = Carbon::now()->subMonth()->startOfMonth();
     
         $customersThisMonth = User::where('group', 'customer')->where('created_at', '>=', $thisMonth)->count();
         $customersLastMonth = User::where('group', 'customer')
             ->whereBetween('created_at', [$lastMonth, $thisMonth])->count();
     
         $ordersThisMonth = Order::where('created_at', '>=', $thisMonth)->count();
         $ordersLastMonth = Order::whereBetween('created_at', [$lastMonth, $thisMonth])->count();
     
         $customerGrowth = $customersLastMonth > 0
             ? round((($customersThisMonth - $customersLastMonth) / $customersLastMonth) * 100, 1)
             : 0;
     
         $orderGrowth = $ordersLastMonth > 0
             ? round((($ordersThisMonth - $ordersLastMonth) / $ordersLastMonth) * 100, 1)
             : 0;
     
         $recentOrders = Order::with(['user', 'address', 'items.product', 'payment'])
             ->orderBy('created_at', 'desc')
             ->take(10)
             ->get();
     
         $months = collect(range(0, 5))->map(fn($i) =>
             Carbon::now()->subMonths($i)->format('Y-m')
         )->reverse();
     
         // Doanh thu (grand_total)
         $sales = Order::selectRaw("FORMAT(created_at, 'yyyy-MM') as month, SUM(grand_total) as total")
        ->whereNotIn('status', ['returned', 'cancelled'])
        ->where('created_at', '>=', Carbon::now()->subMonths(5)->startOfMonth())
        ->groupByRaw("FORMAT(created_at, 'yyyy-MM')")
        ->pluck('total', 'month');

    // Tổng tiền nhập hàng với trạng thái confirmed
    $imports = StockImportDetail::join('stock_imports', 'stock_import_details.stock_import_id', '=', 'stock_imports.id')
        ->where('stock_imports.status', 'confirmed')
        ->where('stock_imports.created_at', '>=', Carbon::now()->subMonths(5)->startOfMonth())
        ->selectRaw("FORMAT(stock_imports.created_at, 'yyyy-MM') as month, SUM(stock_import_details.total_price) as total")
        ->groupByRaw("FORMAT(stock_imports.created_at, 'yyyy-MM')")
        ->pluck('total', 'month');
             $revenueData = $months->map(fn($month) => (float)($sales[$month] ?? 0))->values()->toArray();
             $importData  = $months->map(fn($month) => (float)($imports[$month] ?? 0))->values()->toArray();
             
         return view('admin::index', compact(
             'totalCustomers', 'totalStaff', 'totalOrders', 'totalProducts',
             'customerGrowth', 'orderGrowth', 'recentOrders',
             'months', 'revenueData', 'importData'
         ));
     }
     

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
