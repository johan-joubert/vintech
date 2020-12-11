@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row mt-5">
        <div class="col-md-12">



        <a href="{{ route('confirm_cart.show', $user) }}">
            ConfirmCart
        </a>



        
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
</div>

@include('components.profile.show_addresses')

<div class="container">
    <div class="row mt-5">

        <div class="col-md-12">
            <h2>Vos commandes</h2>
        </div>

    </div>

    @if (count($user->orders)>0)
    <a href="{{ route('orders.index') }}">
        <button type="button" class="btn btn-primary">
            Afficher les commandes
        </button>
    </a>

    @else
    <p>Vous n'avez pas encore passé de commande</p>
    @endif

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

@endsection