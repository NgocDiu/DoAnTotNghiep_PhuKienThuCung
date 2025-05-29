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

class StockImportController extends Controller
{
    public function index(Request $request)
    {
        $query = StockImport::with('user')->latest();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $imports = $query->get();

        return view('admin::stock_imports.index', compact('imports'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin::stock_imports.form', [
            'import' => new StockImport(),
            'products' => $products,
            'details' => []
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'note' => 'nullable|string',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|numeric|min:1',
            'products.*.unit_price' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $import = StockImport::create([
                'code' => 'IM' . now()->format('YmdHis'),
                'user_id' => Auth::id(),
                'status' => 'pending',
                'note' => $request->note,
            ]);

            foreach ($request->products as $item) {
                StockImportDetail::create([
                    'stock_import_id' => $import->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                ]);
            }
        });

        return redirect()->route('admin.stock_imports.index')->with('success', 'Tạo phiếu nhập thành công.');
    }

    public function edit($id)
    {
        $import = StockImport::with('details')->findOrFail($id);
        

        $products = Product::all();
        return view('admin::stock_imports.form', [
            'import' => $import,
            'products' => $products,
            'details' => $import->details
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'note' => 'nullable|string',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|numeric|min:1',
            'products.*.unit_price' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request, $id) {
            $import = StockImport::findOrFail($id);
            if ($import->status !== 'pending') {
                return redirect()->route('admin.stock_imports.index')
                    ->with('error', 'Chỉ được sửa phiếu ở trạng thái Chờ xác nhận.');
            }
            

            $import->update(['note' => $request->note]);
            $import->details()->delete();

            foreach ($request->products as $item) {
                StockImportDetail::create([
                    'stock_import_id' => $import->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                ]);
            }
        });

        return redirect()->route('admin.stock_imports.index')->with('success', 'Cập nhật phiếu nhập thành công.');
    }

    public function show($id)
    {
        $import = StockImport::with('details.product', 'user')->findOrFail($id);
        return view('admin::stock_imports.show', compact('import'));
    }

    public function confirm($id)
    {
        DB::transaction(function () use ($id) {
            $import = StockImport::with('details.product')->findOrFail($id);
            if ($import->status !== 'pending') {
                abort(403, 'Chỉ được xác nhận phiếu ở trạng thái pending');
            }

            foreach ($import->details as $detail) {
                $detail->product->increment('stock_quantity', $detail->quantity);
            }

            $import->update(['status' => 'confirmed']);
        });

        return redirect()->route('admin.stock_imports.show', $id)->with('success', 'Xác nhận thành công.');
    }

    public function destroy($id)
    {
        $import = StockImport::with('details')->findOrFail($id);

        if ($import->status !== 'pending') {
            abort(403, 'Chỉ được xóa phiếu ở trạng thái pending');
        }

        // Xóa các dòng chi tiết trước
        $import->details()->delete();

        // Xóa phiếu nhập chính
        $import->delete();

        return redirect()->route('admin.stock_imports.index')->with('success', 'Đã xóa phiếu nhập ');
    }




}
