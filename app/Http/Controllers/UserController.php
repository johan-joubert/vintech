<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DeliveryAddress;
use App\Models\BillingAddress;

class UserController extends Controller
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
    public function show(User $user)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->load('deliveryAddresses', 'billingAddresses');

        return view('profile.show', compact('user'));
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
    public function update(User $user)
    {
        $attributes = request()->validate([
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'firstName' => ['string', 'required', 'max:255'],
            'lastName' => ['string', 'required', 'max:255'],
        ]);

        $user->update($attributes);

        return redirect()->back()->with('message', 'Profil mis à jour !');
    }


    public function updatePassword(Request $request, User $user)
    {

        $attributes = request()->validate([
            'oldPassword' => ['string', 'required', 'min:8', 'max:255', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/']
        ]);

        $hashedPassword = $user->password;

        if (Hash::check($request->oldPassword, $hashedPassword)) {

            if (!Hash::check($request->password, $hashedPassword)) {

                $user->password = $attributes['password'];

                $user->save();
                
                return redirect()->back()->with('message', 'Mot de passe modifié');

            } else {
                return redirect()->back()->withErrors('password_error', 'Le nouveau mot de passe doit être différent de l\'ancien !');
                
            }
        } else {
            session()->flash('message', 'Votre mot de passe actuel est erroné !');
            return redirect()->back()->withErrors('password_error', 'Votre mot de passe actuel est erroné !');
        }
    }

    public function updateBillingAddress(BillingAddress $billingAddress)
    {
        $attributes = request()->validate([
            'address' => ['string', 'required', 'max:255'],
            'zip_code' => ['string', 'required', 'max:255'],
            'city' => ['string', 'required', 'max:255'],
        ]);

        $billingAddress->update($attributes);

        return redirect()->back()->with('message', 'Adresse de facturation mise à jour !');
    }

    public function updateDeliveryAddress(DeliveryAddress $deliveryAddress)
    {
        $attributes = request()->validate([
            'address' => ['string', 'required', 'max:255'],
            'zip_code' => ['string', 'required', 'max:255'],
            'city' => ['string', 'required', 'max:255'],
        ]);

        $deliveryAddress->update($attributes);

        return redirect()->back()->with('message', 'Adresse de livraison mise à jour !');
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
