<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


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
        $user->load('deliveryAddress', 'billingAddress');

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
    public function updateProfile(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $request->validate([
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'firstName' => ['string', 'required', 'max:255'],
            'lastName' => ['string', 'required', 'max:255'],
        ]);

        $user->update([
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
            'email' => $request->input('email'),
        ]);

        return redirect()->back()->with('message', 'Profil mis à jour !');
    }


    public function updatePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $attributes = request()->validate([
            'oldPassword' => ['string', 'required', 'min:8', 'max:255', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/']
        ]);

        $hashedPassword = $user->password;

        if (Hash::check($request->oldPassword, $hashedPassword)) {

            if (!Hash::check($request->password, $hashedPassword)) {

                $user->password = Hash::make($attributes['password']);

                $user->save();
                
                return redirect()->back()->with('message', 'Mot de passe modifié');

            } else {
                return redirect()->back()->withErrors('password_error', 'Le nouveau mot de passe doit être différent de l\'ancien !');
                
            }
        } else {
            return redirect()->back()->withErrors('password_error', 'Votre mot de passe actuel est erroné !');
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
