@extends('layouts.app')

@php
include('../functions.php');
$variables = getVariables();

$products_navBar = $variables[0];
$ranges_navBar = $variables[1];
$promotions_navBar = $variables[2];

@endphp

@section('content')


<div class="container mb-5">

    <div class="row">

        <div class="col-md-12 text-center">

            <h3 class="mb-4 text-red">
                <b>Commande n°{{ $order->order_number }}</b>
            </h3>

            <div class="card">

                <div class="card-header d-flex text-blue">
                    <p class="mr-5">
                        <b>Date de commande :</b>
                        {{ $order->created_at }}
                    </p>

                    <p>
                        <b>Montant :</b>
                        {{ $order->order_amount }} €
                    </p>
                </div>

                <div class="card-body">

                    @foreach($order->products as $product)

                    <div class="col-md-4">
                        <p>
                            {{ $product->name}}<br>
                            <a href="{{ route('product.show', $product->id) }}">
                                <img alt="image du produit" src="{{ asset("images/$product->image") }}" width="200"><br>
                            </a>
                            Quantité commandée : {{ $product->pivot->quantity }}
                        </p>
                    </div>

                    @endforeach
                </div>
            </div>

        </div>


    </div>

</div>
@section('footer')
    @include('layouts.footer')
    @endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

@endsection