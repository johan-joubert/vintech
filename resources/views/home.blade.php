@extends('layouts.app')

@php
include('../functions.php');
$variables = getVariables();

$products_navBar = $variables[0];
$ranges_navBar = $variables[1];
$promotions_navBar = $variables[2];

@endphp

@section('content')

@if(isset($currentPromo[0]))
<div class="container promo">

    <div class="row text-center promo-name">
        <h1 class="font-weight-bold">{{$currentPromo[0]->name}}</h1>

        <?php
        echo "<p>Du " . date_format(new DateTime($currentPromo[0]->start_date), 'd/m/y') . " au " . date_format(new DateTime($currentPromo[0]->end_date), 'd/m/y') . ".</p>";
        ?>
    </div>

    <!----------------- CURRENT PROMO ---------------------------------------------------------------------------------------->
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="3"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="4"></li>
        </ol>

        <div class="carousel-inner">

            @foreach($currentPromo[0]->products as $product)
            <div
            @php 
            $loop = $loop->iteration;
            @endphp
            @if($loop == 1)
            class="carousel-item active"
            @else
            class="carousel-item"
            @endif
            data-bs-interval="10000">

                <a href="{{ route('product.show', $product->id) }}">
                    <img alt="image du produit" class="d-block m-auto w-50" src="{{ asset("images/$product->image") }}">
                </a>
                <div class="carousel-caption d-none d-md-block product-infos">
                    <h2 class="font-weight-bold card-text product-name">{{$product->name}}</h2>
                    <div class="row">

                        <?php
                        echo "<div class=\"col font-weight-bold discount\">-". $product->pivot->discount ." %</div>
                            <div class=\"col\"><small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', ' ')  . "€</del></small></div>";
                            
                        $promoPrice = $product->price - ($product->price * ($product->pivot->discount / 100));
                        echo "<div class=\"col font-weight-bold promo-price\">" .  number_format($promoPrice, 2, ',', ' ')  . "€</div>";
                        ?>
                        
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

</div>
@endif

<!----------------- TOP RATED PRODUCTS ---------------------------------------------------------------------------------------->
<div class="album py-5">
    <div class="container">

        <div class="row text-center">
            <h1 class="mt-5 mb-5 font-weight-bold name-section">Produits les mieux notés</h1>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($topRatedProducts as $product)
            <a href="{{ route('product.show', $product->id) }}">
                <div class="col mb-3">
                    <div class="card shadow-sm bg-light">
                        @php
                        $stock = $product->stock
                        @endphp

                        @if($stock > 5)

                        <p><i class="fas fa-circle green"></i> en stock</p>

                        @elseif($stock <= 5 && $stock> 0)

                            <p><i class="fas fa-circle orange"></i> en stock</p>

                            @elseif($stock == 0)

                            <p><i class="fas fa-circle red"></i> rupture</p>

                            @endif

                                @php
                                echo $product->average_rates;
                                @endphp



                            <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                            @if(($product->promotion_name) && ($product->promotion_name!== null))
                            <h2 class="mt-2 text-center font-weight-bold promo-name">{{$product->promotion_name}}</h2>
                            <?php
                            echo "<p class=\"text-center promo-name\">Du " . date_format(new DateTime($product->start_date), 'd/m/y') . " au " . date_format(new DateTime($product->end_date), 'd/m/y') . ".</p>";
                            ?>
                            @endif


                            <div class="card-body">
                                <p class="card-text font-weight-bold product-name">{{$product->name}}</p>
                                <p class="card-text">{{$product->short_description}}</p>

                                <div class="d-flex justify-content-between align-items-center">

                                    <?php
                                    if (isset($product->promotion_name) && ($date <= $product->end_date)) {

                                        if ($date >= $product->start_date && $date <= $product->end_date) {

                                            echo "<p class=\"font-weight-bold discount\">- $product->discount %</p>
                                                    <small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', ' ')  . "€</del></small>";

                                            $promoPrice = $product->price - ($product->price * ($product->discount / 100));
                                            echo "<p class=\"font-weight-bold promo-price\">" .  number_format($promoPrice, 2, ',', ' ')  . "€</p>";
                                        } else {
                                            echo "<p class=\"font-weight-bold discount\">- $product->discount %</p>
                                                    <p class=\"font-weight-bold price\">" .  number_format($product->price, 2, ',', ' ')  . "€</p>";
                                        }
                                    } else {
                                        echo "<p class=\"font-weight-bold price\">" .  number_format($product->price, 2, ',', ' ')  . "€</p>";
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