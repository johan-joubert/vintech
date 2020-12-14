<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->load('deliveryAddress', 'billingAddress');

        return view('confirm_cart.show', compact('user'));
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
        $value = $request->input('inlineRadioOptions');

        if ($value == 'expressDelivery') {
            $shippingCost = 9.99;
            return view('confirm_cart.show', ['shippingCost' => $shippingCost]);
        }else {
            $shippingCost = 0;
            return view('confirm_cart.show', ['shippingCost' => $shippingCost]);
        }
    }
}