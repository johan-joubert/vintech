@extends('layouts.app')

<?php
include('../functions.php');
?>

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h2>
                Confirmation de votre commande
                <span class="text-muted">
                    @php
                    $qteTotal = 0;

                    if(session("cart")) {
                    foreach (session("cart") as $key => $item) {

                    $qteTotal += $item['quantity'];

                    }
                    }

                    echo "(" . $qteTotal . " articles)";
                    @endphp
                </span>
            </h2>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 d-flex">

            @foreach (session("cart") as $key => $item)

            @php $total = 0 @endphp
            @php $total += $item['price'] * $item['quantity'] @endphp

            <div class="card ml-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['name'] }}</h5>
                    <img src="" alt="{{ $item['image'] }}">
                    <p class="text-right">Prix unitaire : {{ $item['price'] }} €</p>
                </div>
                <div class="card-footer text-right text-muted">
                    Quantité : {{ $item['quantity'] }}<br>
                    <span class="text-dark">
                        Prix total : {{ $item['price'] * $item['quantity'] }} €
                    </span>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>


@include('components.profile.show_addresses')


@if($user->billingAddress)
@if($user->deliveryAddress)


@include('components.confirm_cart.delivery_choice')

@php $tvaCost = tvaCost($total) @endphp

@include('components.confirm_cart.confirm_banner')


@else
<div class="container mt-5 bg-danger text-white">
    <p>Enregistrez une adresse de livraison pour confirmer votre commande</p>
</div>
@endif

@else
<div class="container mt-5 bg-danger text-white">
    <p>Enregistrez une adresse de facturation pour confirmer votre commande</p>
</div>
@endif


@endsection