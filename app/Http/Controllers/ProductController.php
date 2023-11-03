<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ProductController extends Controller
{
    function getproducts()
    {
        $products = Product::get();
        return view('Product.ProductList', compact('products'));
    }

    function create()
    {
        return view('Product.ProductCreateUpdate');
    }

    function add(Request $request)
    {
        $validateData = $request->validate([
            'title'         => 'required|max:50',
            'description'         => 'required|max:50',
            'fdp'           => 'required|integer',
            'image'         => 'required',
        ]);
        if ($request->hasFile("image")) {
            $validateData["image"] = $this->media(
                $request,
                "product"
            );
        }
        $validateData["status"] = 1;
        Product::create($validateData);
        return redirect(route('product.list'))->with('message', 'product created successfully');
    }

    function edit(Product $product)
    {
        return view('Product.ProductCreateUpdate', compact('product'));
    }

    function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'title'         => 'required|max:50',
            'description'         => 'required|max:50',
            'fdp'           => 'required',
            // 'image'         => 'required',
        ]);
        if ($request->hasFile("image")) {
            $validateData["image"] = $this->media(
                $request,
                "product"
            );
        }
        $product->update($validateData);
        return redirect(route('product.list'))->with('message', 'product created successfully');
    }

    function updateStatus(Product $product_id, $status)
    {
        $product_id->update([
            'status' => $status
        ]);
        return redirect(route('product.list'))->with('message', 'status changed successfully');
    }
}
