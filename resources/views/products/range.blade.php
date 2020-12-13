@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <h1>{{$range[0]->range}}</h1>
        </div>


        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($range as $product)

            <div class="col mb-3">
            <a href="{{ route('product.show', $product->id) }}">

                <div class="card shadow-sm">
                    <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                    @if(($product->promotion_name) !== null)
                    <p class="mt-2 text-center font-weight-bold">{{$product->promotion_name}}</p>
                    @endif

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

                                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('product.show', $article->id) }}">Détails</a>

                            </div>

                            <?php

                            if ($product->promotion_name !== null) {
                                echo "<p class=\"font-weight-bold\">- $product->discount %</p>

                                <small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', 0)  . "€</del></small>";

                                $promoPrice = $product->price - ($product->price * ($product->discount / 100));
                                echo "<p class=\"font-weight-bold\">" .  number_format($promoPrice, 2, ',', 0)  . "€</p>";
                                
                            } else {
                                echo "<p>" .  number_format($product->price, 2, ',', 0)  . "€</p>";
                            }

                            ?>

                        </div>
                    </div>
                </div>
                </a>

            </div>

            @endforeach

        </div>


    </div>
</div>

@endsection