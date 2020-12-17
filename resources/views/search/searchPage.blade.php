@extends('layouts.app')

@php
include('../functions.php');
$variables = getVariables();

$products_navBar = $variables[0];
$ranges_navBar = $variables[1];
$promotions_navBar = $variables[2];

@endphp

@section('content')

    @foreach($products as $product)
                <div class="card-body">
                <strong>{{ $product->name}}</strong>
                <strong>{{ $product->description}}</strong>
                </div>

                
    @endforeach

@endsection