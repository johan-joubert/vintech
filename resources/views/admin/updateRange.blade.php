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

        <form action="{{route('range.update', $range)}}" method="POST">
        @csrf
        @method('PUT')

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" name="range" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$range->range}}">
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>

    @section('footer')
    @include('layouts.footer')
    @endsection

@endsection