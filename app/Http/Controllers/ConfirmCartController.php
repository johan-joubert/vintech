<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Range;
use App\Models\Promotion;
use App\Models\Order;
use App\Models\Product;



class ConfirmCartController extends Controller
{
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
    public function create(Request $request)
    {
        $ranges = Range::all();
        $promotions = Promotion::all();

        $order = Order::create([
            'user_id' => $request->input('user_id'),
            'order_amount' => $request->input('order_amount'),
            'order_number' => random_int(1000000, 9999999),
        ]);

        $cart = session()->get('cart');


        foreach ($cart as $product) {
            $order->products()->attach($product['id'], ['quantity' => intval($product['quantity'])]);

            $newStock = Product::find($product['id']);

            $newStock->stock -= $product['quantity'];

            $newStock->save();
        }

        if(isset($request->order_amount)) {
            session()->forget('cart');
        }

        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::all();
        $promotions = Promotion::all();
        $ranges = Range::all();

        $user = User::findOrFail(auth()->user()->id);
        $user->load('deliveryAddress', 'billingAddress');

        return view('confirm_cart.show', compact('user'), ['products' => $products, 'promotions' => $promotions, 'ranges' => $ranges]);
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
    public function update(Request $request, $id)
    {
        //
    }

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

    public function deliveryChoice(Request $request) {

        $user = User::findOrFail(auth()->user()->id);
        $user->load('deliveryAddress', 'billingAddress');

        $ranges = Range::all();
        $promotions = Promotion::all();

        $value = $request->input('inlineRadioOptions');

        if ($value == 'expressDelivery') {
            $shippingCost = 9.99;
            return view('confirm_cart.show', compact('user'), ['shippingCost' => $shippingCost, 'ranges' => $ranges, 'promotions' => $promotions]);
        }else {
            $shippingCost = 0;
            return view('confirm_cart.show', compact('user'), ['shippingCost' => $shippingCost, 'ranges' => $ranges, 'promotions' => $promotions]);
        }
    }
}