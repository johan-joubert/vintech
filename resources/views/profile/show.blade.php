@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row mt-5">
        <div class="col-md-12">

            <h1>
                {{ $user->first_name }} {{ $user->last_name }}
            </h1>

            <p class="text-muted">
                {{ $user->email }}
            </p>


            @if (auth()->user()->is($user))
                @include('components.profile.edit_profile')
                @include('components.profile.edit_password')
            @endif

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

                    @if (auth()->user()->is($user))
                        @include('components.profile.edit_billing_address')
                    @endif

                </div>

                <div class="col-md-6">
                    <h3>Livraison</h3>

                    <p>
                        {{ $user->deliveryAddresses->address }}<br>
                        {{ $user->deliveryAddresses->zip_code }}<br>
                        {{ $user->deliveryAddresses->city }}
                    </p>

                    @if (auth()->user()->is($user))
                        @include('components.profile.edit_delivery_address')
                    @endif

                </div>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

@endsection