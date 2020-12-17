@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row mb-5 text-center">
            <h1 class="mt-2 font-weight-bold">{{$promo[0]->promoName}}</h1>
        </div>

        <div class="row mb-5 text-center">
            <?php
                echo "<p>Du " . date_format(new DateTime($promo[0]->start_date), 'd/m/y') . " au " . date_format(new DateTime($promo[0]->end_date), 'd/m/y') . ".</p>";
            ?>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($promo as $product)
            <a href="{{ route('product.show', $product->id) }}">
            <div class="col mb-3">
                <div class="card shadow-sm">
                    <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                    <div class="card-body">
                        <p class="card-text">{{$product->name}}</p>
                        <p class="card-text">{{$product->short_description}}</p>
                        
                        <div class="d-flex justify-content-between align-items-center">

                            <?php

                            $date = date('Y-m-d');

                            if (isset($product->promoName) && ($date <= $product->end_date)) {

                                if ($date >= $product->start_date && $date <= $product->end_date) {

                                    echo "<p class=\"font-weight-bold\">- $product->discount %</p>
                                        <small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', ' ')  . "€</del></small>";

                                    $promoPrice = $product->price - ($product->price * ($product->discount / 100));
                                    echo "<p class=\"font-weight-bold\">" .  number_format($promoPrice, 2, ',', ' ')  . "€</p>";

                                }else {
                                    echo "<p class=\"font-weight-bold\">- $product->discount %</p>
                                        <p>" .  number_format($product->price, 2, ',', ' ')  . "€</p>";
                                }

                            }else {
                                echo "<p>" .  number_format($product->price, 2, ',', ' ')  . "€</p>";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            </a>
            @endforeach

        </div>

    </div>
</div>

@endsection