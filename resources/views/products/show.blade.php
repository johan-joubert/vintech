@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6 mb-3">
                <div class="card shadow-sm">
                    <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                    @if(count($product->promotions)>0)
                    <p class="mt-2 text-center font-weight-bold">{{$product->promotions[0]->name}}</p>
                    @endif

                    <div class="card-body">
                        <p class="card-text">{{$product->name}}</p>
                        <p class="card-text">{{$product->short_description}}</p>
                        <p class="card-text">{{$product->description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="form-inline d-inline-block">
                                {{ csrf_field() }}
                                <input type="number" name="quantity" placeholder="Quantité ?" class="form-control mr-2" value="{{ isset(session('cart')[$product->id]) ? session('cart')[$product->id]['quantity'] : null }}" >                                
                                <button type="submit" class="btn btn-warning">+ Ajouter au panier</button>
                            </form>
                            <?php

                            $discount = 0;

                            foreach ($product->promotions as $promotion) {
                                $discount = $promotion->pivot->discount;
                            }

                            if (count($product->promotions) > 0) {
                                echo "<p class=\"font-weight-bold\">- $discount %</p>

                                <small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', 0)  . "€</del></small>";

                                $promoPrice = $product->price - ($product->price * ($discount / 100));
                                echo "<p class=\"font-weight-bold\">" .  number_format($promoPrice, 2, ',', 0)  . "€</p>";
                            } else {
                                echo "<p>" .  number_format($product->price, 2, ',', 0)  . "€</p>";
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection