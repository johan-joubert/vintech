<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $likes = DB::table('products')
        // ->leftjoin('favorites', 'favorites.product_id', '=', 'product.id')
        // ->leftjoin('favorites as f', 'f.user_id', '=', 'user.id')
        // ->leftjoin('users', 'user.id', '=', 'favorites.user_id')
        // ->leftJoin('promotion_products as pp', 'pp.product_id', '=', 'products.id')  // table intermédiaire
        // ->leftJoin('promotions', 'promotions.id', '=', 'pp.promotion_id')  // promotions liées aux produits
        // ->select('products.*', 'favorites.*', 'user.id', 'pp.discount', 'promotions.start_date', 'promotions.end_date', 'promotions.name as promotion_name') // champs souhaités
        // ->orderBy('products.name', 'asc')
        // ->get();

        $user = User::find(auth()->user()->id);
        $user->load('likes.promotions');

        
        return view('favorites', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productId = $request->input('productId');
        $user = User::find(auth()->user()->id);
        $product = Product::find($productId);

        $user->toggleLike($product);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

        // public function addLike() {
    //     auth()->user()->favorites()->toggle($this->product->id);
    // }
}
