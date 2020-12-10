@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <h1>{{$promo[0]->name}}</h1>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($promo->products as $product)
            <div class="col mb-3">
                <div class="card shadow-sm">
                    <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                    <div class="card-body">
                        <p class="card-text">{{$product->name}}</p>
                        <p class="card-text">{{$product->short_description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">

                                <?php
                                $article = new stdClass;
                                $article->name = $product->name;
                                $article->id = $product->id;
                                $article->short_description = $product->short_description;
                                $article->description = $product->description;
                                $article->image = $product->image;
                                $article->price = $product->price;
                                $article->weight = $product->weight;
                                $article->stock = $product->stock;
                                $article->range_id = $product->range_id;
                                ?>

                                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('products.show', $article) }}">Détails</a>

                            </div>
                            <p>nouveau prix</p>
                            <p>-  %</p>
                            <small class="text-muted text-decoration-line-through">{{$product->price}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>

@endsection