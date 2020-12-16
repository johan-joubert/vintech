@extends('layouts.app')

@section('content')

    @foreach($products as $product)
                <div class="card-body">
                <strong>{{ $product->name}}</strong>
                <strong>{{ $product->description}}</strong>
                </div>

                
    @endforeach

@endsection