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
            @php
            $total = 0;
            $totalWeight = 0;
            @endphp

            @foreach (session("cart") as $key => $item)

            @php
            $total += $item['price'] * $item['quantity'];
            $totalWeight += $item['weight'] * $item['quantity'];
            $image = $item['image'];
            @endphp

            <div class="card ml-3" style="width: 18rem;">
            <a href="{{ route('product.show', $item['id']) }}">

                <div class="card-body text-blue">
                    <h5 class="card-title">
                        <b>{{ $item['name'] }}</b>
                    </h5>
                    <img src="{{ asset("images/$image")}}" alt="{{ $item['image'] }}" width="250">
                    <p class="text-right">Prix unitaire : {{ $item['price'] }} €<br>
                        <span class="text-muted">Poids : {{ $item['weight'] * $item['quantity'] }} Kg</span></p>
                </div>
                <div class="card-footer text-right text-muted mb-0">
                    Quantité : {{ $item['quantity'] }}<br>
                    <span class="text-blue">
                        Prix total : {{ $item['price'] * $item['quantity'] }} €
                    </span>
                </div>
                </a>

            </div>
            @endforeach

        </div>
    </div>

</div>

<div class="container mt-5">
    <div class="row">
        <div class="card col-md-3 offset-md-1">
            <h2>Frais de port</h2>

                    @php 
                    $shippingFees = $totalWeight * 0.2;
                    @endphp

            <p class="text-muted font-italic">Calcul : 0.20 €/Kg<br>
                Gratuit à partir de 150 € d'achat</p>

            <p>Poids total de la commande : {{ $totalWeight }} Kg<br>
            <b>Frais de port : {{ shippingFees($total, $shippingFees) }} €</b></p>
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

@section('footer')
@include('layouts.footer')
@endsection


@endsection