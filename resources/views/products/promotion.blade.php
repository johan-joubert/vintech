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

            @foreach($promo[0]->products as $product)
            <a href="{{ route('product.show', $product->id) }}">
                <div class="col mb-3">
                    <div class="card shadow-sm">
                        <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                        <div class="card-body">
                            <p class="card-text">{{$product->name}}</p>
                            @php
                            if(count($product->reviews) > 0) {

                            $moyenneRate = 0;

                            foreach($product->reviews as $review) {


                            $moyenneRate += $review->rate;

                            }
                            echo "Moyenne produit : " .$moyenneRate / count($product->reviews);
                            }
                            @endphp

                            <p class="card-text">{{$product->short_description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">

                                </div>

                                <?php

                                $date = date('Y-m-d');


                                    if ($date >= $promo[0]->start_date && $date <= $promo[0]->end_date) {

                                        echo "<p class=\"font-weight-bold\">-". $product->pivot->discount ." %</p>
                                        <small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', 0)  . "€</del></small>";

                                        $promoPrice = $product->price - ($product->price * ($product->pivot->discount / 100));
                                        echo "<p class=\"font-weight-bold\">" .  number_format($promoPrice, 2, ',', 0)  . "€</p>";
                                    } else {
                                        echo "<p class=\"font-weight-bold\">-". $product->pivot->discount ." %</p>
                                        <p>" .  number_format($product->price, 2, ',', 0)  . "€</p>";
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