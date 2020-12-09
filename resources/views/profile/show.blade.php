@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row mt-5">
        <div class="col-md-12">

            <h1>
                {{ $user->first_name }} {{ Auth::user()->last_name }}
            </h1>

            <p class="text-muted">
                {{ Auth::user()->email }}
            </p>

        </div>
    </div>


    <div class="row mt-5">

        <div class="col-md-12">

            <h2>Vos adresses</h2>

            <div class="row mt-3">

                <div class="col-md-6">
                    <h3>Facturation</h3>

                    <p>
                        {{ $user->billingAddresses->address }}<br>
                        {{ $user->billingAddresses->zip_code }}<br>
                        {{ $user->billingAddresses->city }}
                    </p>

                </div>

                <div class="col-md-6">
                    <h3>Livraison</h3>

                    <p>
                        {{ $user->deliveryAddresses->address }}<br>
                        {{ $user->deliveryAddresses->zip_code }}<br>
                        {{ $user->deliveryAddresses->city }}
                    </p>

                </div>

            </div>

        </div>
    </div>
</div>



@endsection