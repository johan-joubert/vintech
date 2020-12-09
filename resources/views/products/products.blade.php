@extends('layouts.app')

@section('content')

@foreach($products as $product)
<div class="col">
    <div class="card shadow-sm">
        <img alt="image du produit" src="{{ asset("images/$product->image") }}">

        <div class="card-body">
            <p class="card-text">{{$product->name}}</p>
            <p class="card-text">{{$product->short_description}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">{{$product->price}}</small>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection