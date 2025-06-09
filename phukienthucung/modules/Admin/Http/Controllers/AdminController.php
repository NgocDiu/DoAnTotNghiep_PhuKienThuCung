<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

public function index()
{
    // Tổng
    $totalCustomers = User::where('group', 'customer')->count();
    $totalStaff     = User::where('group', 'employee')->count();
    $totalOrders    = Order::count();
    $totalProducts  = Product::count();

    // So sánh theo tháng (tùy theo logic bạn chọn: tuần/tháng/quý)
    $thisMonth  = Carbon::now()->startOfMonth();
    $lastMonth  = Carbon::now()->subMonth()->startOfMonth();

    $customersThisMonth = User::where('group', 'customer')->where('created_at', '>=', $thisMonth)->count();
    $customersLastMonth = User::where('group', 'customer')
        ->whereBetween('created_at', [$lastMonth, $thisMonth])->count();

    $ordersThisMonth = Order::where('created_at', '>=', $thisMonth)->count();
    $ordersLastMonth = Order::whereBetween('created_at', [$lastMonth, $thisMonth])->count();

    // Tính % tăng/giảm
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

    return view('admin::index', compact(
        'totalCustomers', 'totalStaff', 'totalOrders', 'totalProducts',
        'customerGrowth', 'orderGrowth', 'recentOrders'
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
