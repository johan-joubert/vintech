@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">

        <h1 class="text-center mb-5">Tous nos produits</h1>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($products as $product)
            <div class="col mb-3">
                <div class="card shadow-sm">
                    <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                    @if(count($product->promotions)>0)
                    <p>{{$product->promotions[0]->name}}</p>
                    @endif

                    <div class="card-body">
                        <p class="card-text">{{$product->name}}</p>
                        <p class="card-text">{{$product->short_description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('products.show', $product) }}">Détails</a>
                            </div>
                            
                            <?php
                                echo "<small class=\"text-muted\">" .  number_format($product->price, 2, ',', 0)  . "€</small>";
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>

    </div>
</div>

@endsection