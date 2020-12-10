<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $promotions = Promotion::all();
        return view('promotions', ['products' => $products, 'promotions' => $promotions]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => '',
            'start_date' => '',
            'end_date' => '',
            
        ]);

        $product = new Promotion;
        $product->name = $request->input('name');
        $product->start_date = $request->input('start_date');
        $product->end_date = $request->input('end_date');
        $product->save();

        return redirect()->route('product.index')->with('message', 'La promotion a bien été ajouté');

    }

    public function show() {
    }

    public function showUpdatePromotion(Promotion $promotion) {
        return view('admin/updatePromotion', ['promotion' => $promotion]);
    }





    public function addProductPromotion (Request $request) {

        $request->validate([
            'discount' => '',
            'product_id' => '',
            'promotion_id' => '',
            
        ]);

        DB::table('promotion_products')->insert([
            'discount' => $request->input('discount'),
            'promotion_id' => $request->input('promotion_id'),
            'product_id' => $request->input('product_id'),
        ]);
        
        return redirect()->route('product.index')->with('message', 'La promotion a bien été ajouté');

    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'range' => '',
            'start_date' => '',
            'end_date' => '',
        ]);

        $promotion->name = $request->input('name');
        $promotion->start_date = $request->input('start_date');
        $promotion->end_date = $request->input('end_date');
        $promotion->save();

        return redirect()->route('product.index');

    }

    public function destroy(Promotion $promotion) {
        $promotion->delete();
        return redirect('admin/edit');
    }


}
