@extends('layouts.app')
@php
include('../functions.php');
$variables = getVariables();

$products_navBar = $variables[0];
$ranges_navBar = $variables[1];
$promotions_navBar = $variables[2];

@endphp

@section('content')

<div class="container mb-2">

    <a href="{{route('admin.index')}}">Accueil admin</a>

</div>



<div class="container">
    <h2>Choisir un produit à modifier</h2>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Courte Description</th>
                <th scope="col">prix</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <th >{{$product->name}}</th>
                <td>{{$product->short_description}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{ route('admin.update.product', $product->id) }}" class="text-left">
                        <button class="btnEdit "><i class="fas fa-edit "></i>Modifier</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('product.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btnEdit text-left"><i class="fas fa-trash-alt"></i>Supprimer</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<div class="container">
    <h2>Choisir une gamme à modifier</h2>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ranges as $range)
            <tr>
                <th>{{$range->range}}</th>
                <td>
                    <a href="{{ route('admin.update.range', $range->id) }}" class="text-left">
                        <button class="btnEdit "><i class="fas fa-edit "></i>Modifier</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('range.destroy', $range->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btnEdit text-left"><i class="fas fa-trash-alt"></i>Supprimer</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<div class="container">
    <h2>Choisir une promotion à modifier</h2>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Début de la campagne</th>
                <th scope="col">Fin de la promotion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promotion)
            <tr>
                <th>{{$promotion->name}}</th>
                <th>{{$promotion->start_date}}</th>
                <th>{{$promotion->end_date}}</th>
                <td>
                    <a href="{{ route('admin.update.promotion', $promotion->id) }}" class="text-left">
                        <button class="btnEdit "><i class="fas fa-edit "></i>Modifier</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('promotion.destroy', $promotion->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btnEdit text-left"><i class="fas fa-trash-alt"></i>Supprimer</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>





@endsection