@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <h1>ACCUEIL</h1>
    </div>

    <!----------------- CURRENT PROMO ---------------------------------------------------------------------------------------->
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row mb-5 text-center">
                <h1 class="mt-2 font-weight-bold">{{$currentPromo[0]->promoName}}</h1>
            </div>

            <div class="row mb-5 text-center">
                <?php
                echo "<p>Du " . date_format(new DateTime($currentPromo[0]->start_date), 'd/m/y') . " au " . date_format(new DateTime($currentPromo[0]->end_date), 'd/m/y') . ".</p>";
                ?>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach($currentPromo as $product)
                <a href="{{ route('product.show', $product->id) }}">
                    <div class="col mb-3">
                        <div class="card shadow-sm">
                            <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                            <div class="card-body">
                                <p class="card-text">{{$product->name}}</p>
                                <p class="card-text">{{$product->short_description}}</p>

                                <div class="d-flex justify-content-between align-items-center">

                                    <?php
                                    echo "<p class=\"font-weight-bold\">- $product->discount %</p>
                                            <small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', 0)  . "€</del></small>";

                                    $promoPrice = $product->price - ($product->price * ($product->discount / 100));
                                    echo "<p class=\"font-weight-bold\">" .  number_format($promoPrice, 2, ',', 0)  . "€</p>";
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

    <!----------------- TOP RATED PRODUCTS ---------------------------------------------------------------------------------------->
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row mb-5 text-center">
                <h1 class="mt-2 font-weight-bold">Produits les mieux notés</h1>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach($topRatedProducts as $product)
                <a href="{{ route('product.show', $product->id) }}">
                    <div class="col mb-3">
                        <div class="card shadow-sm">
                            <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                            @if(($product->promotion_name) && ($product->promotion_name!== null))
                            <h2 class="mt-2 text-center font-weight-bold">{{$product->promotion_name}}</h2>
                            <?php
                                echo "<p class=\"text-center\">Du " . date_format(new DateTime($product->start_date), 'd/m/y') . " au " . date_format(new DateTime($product->end_date), 'd/m/y') . ".</p>";
                            ?>
                            @endif

                            <div class="card-body">
                                <p class="card-text">{{$product->name}}</p>
                                <p class="card-text">{{$product->short_description}}</p>

                                <div class="d-flex justify-content-between align-items-center">

                                    <?php
                                    if (isset($product->promotion_name) && ($date <= $product->end_date)) {

                                        if ($date >= $product->start_date && $date <= $product->end_date) {

                                            echo "<p class=\"font-weight-bold\">- $product->discount %</p>
                                                    <small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', 0)  . "€</del></small>";

                                            $promoPrice = $product->price - ($product->price * ($product->discount / 100));
                                            echo "<p class=\"font-weight-bold\">" .  number_format($promoPrice, 2, ',', 0)  . "€</p>";
                                        } else {
                                            echo "<p class=\"font-weight-bold\">- $product->discount %</p>
                                                    <p>" .  number_format($product->price, 2, ',', 0)  . "€</p>";
                                        }
                                    } else {
                                        echo "<p>" .  number_format($product->price, 2, ',', 0)  . "€</p>";
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



</div>
@endsection