<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductImage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand', 'categories')->latest()->paginate(10);
        return view('admin::products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $attributes = Attribute::all();
        return view('admin::products.create', compact('brands', 'categories', 'attributes'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'              => 'required|string|max:150',
            'slug'              => 'nullable|string|max:150|unique:products,slug',
            'description'       => 'nullable|string',
            'price'             => 'required|numeric|min:0',
            'discount_price'    => 'nullable|numeric|min:0',
            'stock_quantity'    => 'required|integer|min:0',
            'brand_id'          => 'required|exists:brands,id',
            'category_ids'      => 'required|array',
            'category_ids.*'    => 'exists:categories,id',
            'attributes'        => 'nullable|array',
            'attributes.*.id'   => 'exists:attributes,id',
            'attributes.*.value'=> 'nullable|string|max:100',
            'images.*'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::transaction(function () use ($request) {
            // 1. Tạo sản phẩm
            $product = Product::create([
                'name'          => $request->name,
                'slug'          => $request->slug ?: Str::slug($request->name),
                'description'   => $request->description,
                'price'         => $request->price,
                'discount_price'=> $request->discount_price,
                'stock_quantity'=> $request->stock_quantity,
                'is_active'     => $request->has('is_active'),
                'is_discount'   => $request->has('is_discount'),
                'brand_id'      => $request->brand_id,
            ]);

            // 2. Gán danh mục
            $product->categories()->sync($request->category_ids);

            // 3. Gán thuộc tính
            foreach ($request->input('product_attributes', []) as $attr) {
              if (!empty($attr['value'])) {
                  ProductAttributeValue::create([
                      'product_id' => $product->id,
                      'attribute_id' => $attr['id'],
                      'value' => $attr['value'],
                  ]);
              }
          }

            // 4. Upload ảnh
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $filename = uniqid('product_') . '.' . $image->getClientOriginalExtension();
                    $resizedImage = Image::make($image)->fit(800, 800)->encode();

                    // Lưu vào storage
                    Storage::put("public/products/{$filename}", $resizedImage);

                    // Ghi DB
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_url'  => "storage/products/{$filename}",
                        'is_main'    => $index === 0 ? 1 : 0
                    ]);
                }
            }
        });

        return redirect()->route('admin.products.index')->with('success', 'Đã thêm sản phẩm thành công');
    }
    public function edit($id)
{
    $product = Product::with(['categories', 'attributeValues', 'images'])->findOrFail($id);
    $brands = Brand::all();
    $categories = Category::all();
    $attributes = Attribute::all();

    return view('admin::products.edit', compact('product', 'brands', 'categories', 'attributes'));
}

  public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:150',
        'slug' => 'nullable|string|max:150|unique:products,slug,' . $product->id,
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'discount_price' => 'nullable|numeric|min:0',
        'stock_quantity' => 'required|integer|min:0',
        'brand_id' => 'required|exists:brands,id',
        'category_ids' => 'required|array',
        'category_ids.*' => 'exists:categories,id',
        'attributes' => 'nullable|array',
        'attributes.*.id' => 'exists:attributes,id',
        'attributes.*.value' => 'nullable|string|max:100',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    DB::transaction(function () use ($request, $product) {
        // 1. Cập nhật sản phẩm
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'stock_quantity' => $request->stock_quantity,
            'is_active' => $request->has('is_active'),
            'is_discount' => $request->has('is_discount'),
            'brand_id' => $request->brand_id,
        ]);

        // 2. Cập nhật danh mục
        $product->categories()->sync($request->category_ids);

        // 3. Cập nhật thuộc tính (xóa và thêm lại)
        ProductAttributeValue::where('product_id', $product->id)->delete();
        foreach ($request->input('product_attributes', []) as $attr) {
            if (!empty($attr['value'])) {
                ProductAttributeValue::create([
                    'product_id' => $product->id,
                    'attribute_id' => $attr['id'],
                    'value' => $attr['value'],
                ]);
            }
        }


        // 4. Xóa ảnh cũ
        foreach ($product->images as $image) {
            $path = str_replace('storage/', 'public/', $image->image_url);
            Storage::delete($path);
            $image->delete();
        }

        // 5. Upload ảnh mới
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $filename = uniqid('product_') . '.' . $image->getClientOriginalExtension();
                $resizedImage = Image::make($image)->fit(800, 800)->encode();
                Storage::put("public/products/{$filename}", $resizedImage);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => "storage/products/{$filename}",
                    'is_main' => $index === 0 ? 1 : 0,
                ]);
            }
        }
    });

    return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công');
}

  public function destroy($id)
{
    $product = Product::findOrFail($id);

    DB::transaction(function () use ($product) {
        // Xóa ảnh (file + DB)
        foreach ($product->images as $image) {
            $path = str_replace('storage/', 'public/', $image->image_url);
            Storage::delete($path);
            $image->delete();
        }

        // Xóa thuộc tính, danh mục liên kết
        $product->categories()->detach();
        ProductAttributeValue::where('product_id', $product->id)->delete();

        // Xóa chính sản phẩm
        $product->delete();
    });

    return redirect()->route('admin.products.index')->with('success', 'Đã xóa sản phẩm');
}

  public function discounts()
{
    $products = Product::select('id', 'name', 'price', 'discount_price', 'is_discount')
        ->orderBy('name')
        ->paginate(20);

    return view('admin::products.discounts', compact('products'));
}

  public function updateDiscount(Request $request, Product $product)
  {
      $request->validate([
          'is_discount' => 'nullable|boolean',
          'discount_price' => 'nullable|numeric|min:0|lt:' . $product->price,
      ]);

      $product->update([
          'is_discount' => $request->has('is_discount'),
          'discount_price' => $request->discount_price ?: null,
      ]);

      return redirect()->back()->with('success', 'Cập nhật khuyến mãi thành công!');
  }
}
