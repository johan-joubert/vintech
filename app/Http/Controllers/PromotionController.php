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
        return view('admin/admin');
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

        return redirect()->route('product.index');

    }

}
