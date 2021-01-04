@extends('layouts.app')

@php
include('../functions.php');
$variables = getVariables();

$products_navBar = $variables[0];
$ranges_navBar = $variables[1];
$promotions_navBar = $variables[2];

@endphp

@section('content')


<div class="container mt-3">

    <div class="row">

        @foreach ($orders as $order)

        <div class="card col-md-4">

            <h5 class="mb-4">Commande n°{{ $order->order_number }}</h5>

            <p class="text-blue">
                <b>Date de commande :</b> {{ $order->created_at }}
            </p>

            <p class="text-blue">
                <b>Montant :</b> {{ $order->order_amount }} €
            </p>

            <div class="row text-right"> 
                <a href="{{ route('orders.show', $order) }}">
                <button type="button" class="btn btn-red mb-2 margin-15">Voir détails</button>
                </a>
            </div>

        </div>

        @endforeach

    </div>

</div>
@section('footer')
    @include('layouts.footer')
    @endsection

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>



@endsection