<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\BillingAddress;
use App\Models\User;

class BillingAddressController extends Controller
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

            BillingAddress::create([
                'address' => $request->input('address'),
                'zip_code' => $request->input('zip_code'),
                'city' => $request->input('city'),
                'user_id' => $request->input('user_id')
            ]);

            return redirect()->back()->with('message', 'Adresse de facturation mise à jour !');
        } else {
            return redirect()->back()->withErrors('password_error', 'Mot de passe incorrect !');
        }
    }


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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillingAddress $billingAddress)
    {
        $user = User::find(auth()->user()->id);

        $request->validate([
            'address' => ['string', 'required', 'max:100'],
            'zip_code' => ['string', 'required', 'min:5', 'max:5'],
            'city' => ['string', 'required', 'max:25'],
            'password' => ['']
        ]);

        if (Hash::check($request->input('password'), $user->password))  {

            $billingAddress->update([
                'address' => $request->input('address'),
                'zip_code' => $request->input('zip_code'),
                'city' => $request->input('city')
            ]);

            return redirect()->back()->with('message', 'Adresse de facturation mise à jour !');
        } else {
            return redirect()->back()->withErrors('password_error', 'Mot de passe incorrect !');
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
