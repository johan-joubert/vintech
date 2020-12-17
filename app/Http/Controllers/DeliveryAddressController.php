<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\DeliveryAddress;
use App\Models\User;

class DeliveryAddressController extends Controller
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
        $user = User::find(auth()->user()->id);

        $request->validate([
            'address' => ['string', 'required', 'max:100'],
            'zip_code' => ['string', 'required', 'min:5', 'max:5'],
            'city' => ['string', 'required', 'max:25'],
            'password' => [''],
            'user_id' => ['']
        ]);

        if (Hash::check($request->input('password'), $user->password))  {

            DeliveryAddress::create([
                'address' => $request->input('address'),
                'zip_code' => $request->input('zip_code'),
                'city' => $request->input('city'),
                'user_id' => $request->input('user_id')
            ]);

            return redirect()->route('confirm_cart.show', auth()->user()->id)->with('message', 'Adresse de livraison mise à jour !');
        } else {
            return redirect()->route('confirm_cart.show', auth()->user()->id)->withErrors('password_error', 'Mot de passe incorrect !');
        }    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, DeliveryAddress $deliveryAddress)
    {
        $user = User::find(auth()->user()->id);

        $request->validate([
            'address' => ['string', 'required', 'max:100'],
            'zip_code' => ['string', 'required', 'min:5', 'max:5'],
            'city' => ['string', 'required', 'max:25'],
            'password' => ['']
        ]);

        if (Hash::check($request->input('password'), $user->password))  {

            $deliveryAddress->update([
                'address' => $request->input('address'),
                'zip_code' => $request->input('zip_code'),
                'city' => $request->input('city')
            ]);

            return redirect()->route('confirm_cart.show', auth()->user()->id)->with('message', 'Adresse de facturation mise à jour !');
        } else {
            return redirect()->route('confirm_cart.show', auth()->user()->id)->withErrors('password_error', 'Mot de passe incorrect !');
        }
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
}
