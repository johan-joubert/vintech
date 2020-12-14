@extends('layouts.app')

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


<!-- inclure show addresses -->

@include('components.confirm_cart.delivery_choice')


<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12 bg-dark bg-gradient text-white text-right">
            <div class="col-md-10">
                <h3>Montant de votre commande</h3>

                <p>
                    Montant HT : {{ $total }} €<br>
                    <span class="text-muted">
                        TVA (20%): 6.67 €<br>

                        @if(isset($shippingCost))
    
                        Livraison : {{ $shippingCost }} €<br>

                        @endif

                    </span>
                    <b>
                        @if(isset($shippingCost))
                        Montant TTC : {{ $total + $shippingCost }} €</b>

                </p>

                <a href="">
                    <button type="btn" class="btn btn-danger mb-3">Confirmer achat</button>
                </a>

                @endif

            </div>
        </div>
    </div>
</div>

@endsection