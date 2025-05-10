<?php

namespace Modules\Publish\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::with(['images', 'brand', 'categories'])
            ->where('slug', $slug)
            ->where('is_active', 1)
            ->firstOrFail();

        return view('publish::products.show', compact('product'));
    }
}
