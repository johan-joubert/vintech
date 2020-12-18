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
        <h2>Modifier produit</h2>

        <form action="{{route('product.update', $product)}}" method="POST">
        @csrf
        @method('PUT')

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->name}}">
            </div>

            <div class="mb-3">
                <label for="selectRange" class="form-label">Gamme</label>
                <select class="form-control" name="range_id" aria-label="Default select example" id="selectRange">
                @foreach($ranges as $range)
                    <option value="{{$range->id}}">{{$range->range}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Courte description</label>
                <input type="text" name="short_description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->short_description}}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->description}}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->image}}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prix</label>
                <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->price}}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Stock</label>
                <input type="text" name="stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->stock}}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Poids</label>
                <input type="text" name="weight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->weight}}">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>

    @section('footer')
    @include('layouts.footer')
    @endsection


@endsection