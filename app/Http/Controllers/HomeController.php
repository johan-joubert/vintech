<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Range;
use App\Models\User;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        return view('home', ['products' => $products, 'promotions' => $promotions, 'ranges' => $ranges, 'users' => $users]);
    }
}
