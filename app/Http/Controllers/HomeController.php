<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Range;
use App\Models\User;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

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
        $users = User::all();

        $date = date('Y-m-d');

        $currentPromo = DB::table('promotions')
            
            ->where('promotions.start_date', '<=', $date)
            ->where('promotions.end_date', '>=', $date)
            ->join('promotion_products', 'promotion_products.promotion_id', '=', 'promotions.id')
            ->join('products', 'products.id', '=', 'promotion_products.product_id')
            ->orderBy('products.name', 'asc')
            ->select('products.*', 'promotion_products.discount', 'promotions.name as promoName', 'promotions.start_date', 'promotions.end_date')
            ->limit(3)
            ->get();

        $topRatedProducts = DB::table('products')
        ->leftJoin('promotion_products as pp', 'pp.product_id', '=', 'products.id')  // table intermédiaire
        ->leftJoin('promotions', 'promotions.id', '=', 'pp.promotion_id')  // promotions liées aux produits
        ->select('products.*', 'pp.discount', 'promotions.start_date', 'promotions.end_date', 'promotions.name as promotion_name') // champs souhaités
        ->orderBy('products.name', 'asc')
        ->limit(9)
        ->get();

        return view('home', ['products' => $products, 'promotions' => $promotions, 'ranges' => $ranges, 'users' => $users, 'currentPromo' => $currentPromo, 'date' => $date, 'topRatedProducts' => $topRatedProducts]);
    }

}