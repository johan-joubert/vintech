<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Range;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $promotions = Promotion::all();
        $ranges = Range::all();
        $date = date('Y-m-d');

        //promo du moment
        $currentPromo = Promotion::where('promotions.start_date', '<=', $date)->where('promotions.end_date', '>=', $date)->get();
        $currentPromo->load('products.reviews');

        $topRatedProducts = DB::table('products')
        ->leftJoin('promotion_products as pp', 'pp.product_id', '=', 'products.id')  // table intermédiaire
        ->leftJoin('promotions', 'promotions.id', '=', 'pp.promotion_id')  // promotions liées aux produits
        ->select('products.*', 'pp.discount', 'promotions.start_date', 'promotions.end_date', 'promotions.name as promotion_name') // champs souhaités
        ->orderBy('products.average_rates', 'desc')
        ->limit(3)
        ->get();

        return view('home', ['products' => $products, 'promotions' => $promotions, 'ranges' => $ranges, 'currentPromo' => $currentPromo, 'date' => $date, 'topRatedProducts' => $topRatedProducts]);
    
    }

    public function showHistory(){
        
       return view('history'); 
    }
    
}
