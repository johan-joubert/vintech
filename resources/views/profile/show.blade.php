@extends('layouts.app')
@php
include('../functions.php');
$variables = getVariables();

$products_navBar = $variables[0];
$ranges_navBar = $variables[1];
$promotions_navBar = $variables[2];

@endphp

@section('content')


<div class="container">

    <div class="row mt-5">

        <div class="col-md-3 text-right text-red">
            <i class="fas fa-user-astronaut fa-7x"></i>
        </div>

        <div class="col-md-9">

            <div class="row">
                <div class="col-md-12 d-flex">
                    <h1>
                        {{ $user->first_name }} {{ $user->last_name }}
                    </h1>
                    @if (auth()->user()->is($user))
                    @include('components.profile.edit_profile')
                    @include('components.profile.edit_password')
                    @endif
                </div>
            </div>

            <p>
                <span class="text-muted">
                    {{ $user->email }}<br>
                </span>
                Vous êtes parmi nous depuis {{ $user->created_at->diffForHumans()}}
            </p>



        </div>
    </div>
</div>

@include('components.profile.show_addresses')

<div class="container">
    <div class="row mt-5">

        <div class="col-md-12 mt-5">
            <h2>Vos commandes</h2>
        </div>

    </div>

    @if (count($user->orders)>0)
    <a href="{{ route('orders.index') }}">
        <button type="button" class="btn btn-red mt-2">
            Afficher mes commandes
        </button>
    </a>

    @else
    <p>Vous n'avez pas encore passé de commande</p>
    @endif



</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


@section('footer')
    @include('layouts.footer')
    @endsection

@endsection