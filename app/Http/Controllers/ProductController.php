<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Range;
use App\Models\Promotion;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::with('promotions')
            ->orderBy('products.name', 'asc')
            ->get();

        return view('products.products', ['products' => $products]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranges = Range::all();
        $products = Product::all();
        $promotions = Promotion::all();
        return view('admin.admin', ['ranges' => $ranges, 'products' => $products, 'promotions' => $promotions]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => '',
            'range_id' => '',
            'short_description' => '',
            'description' => '',
            'image' => '',
            'price' => '',
            'stock' => '',
            'weight' => '',

        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->range_id = $request->input('range');
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->image = $request->input('image');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->weight = $request->input('weight');
        $product->save();

        return redirect()->route('product.index');
    }


    public function showUpdateProduct(Product $product)
    {
        return view('admin/updateProduct', ['product' => $product]);
    }


    public function edit()
    {
        $products = Product::all();
        return view('edit', ['products' => $products]);
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => '',
            'range_id' => '',
            'short_description' => '',
            'description' => '',
            'image' => '',
            'price' => '',
            'stock' => '',
            'weight' => '',
        ]);

        $product->name = $request->input('name');
        $product->range_id = $request->input('range_id');
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->image = $request->input('image');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->weight = $request->input('weight');
        $product->save();

        return redirect()->route('product.index')->with('message', 'Le produit a bien été ajouté');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('admin/edit');
    }
}
