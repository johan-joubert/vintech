<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    public function index()
    {
        return view('admin/admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/admin');

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

}
