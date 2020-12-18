<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;


class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['search','show']);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'range' => '',
            'comment' => '',          
        ]);

        Review::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->input('productId'),
            'comment' => $request->input('comment'),
            'rate' => $request->input('rate'),
        ]);

        // récupération du produit noté
        $productId = $request->input('productId');
        $product = Product::find($productId);

        //si le produit est déjà noté
        if(isset($product->average_rates)) {

            $currentRate = $product->average_rates;
            $newRate = $request->input('rate');

            $totalRate = count(Review::where('product_id', $productId)->get());

            $newAverage = ($currentRate * ($totalRate-1) + $newRate) / ($totalRate);

            $product->average_rates = $newAverage;

            $product->update();

        } 
        //si le produit n'a pas de note
        else {
            $product->average_rates = $request->input('rate');
            $product->update();
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
