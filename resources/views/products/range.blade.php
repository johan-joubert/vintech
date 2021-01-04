@extends('layouts.app')
@php
include('../functions.php');
$variables = getVariables();

$products_navBar = $variables[0];
$ranges_navBar = $variables[1];
$promotions_navBar = $variables[2];

@endphp

@section('content')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row mb-3 text-center name-section">
            <h1 class="font-weight-bold">{{$range[0]->range}}</h1>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($products as $product)

            <div class="col mb-3">

                <a href="{{ route('product.show', $product->id) }}">

                    <div class="card shadow-sm">
                        @php
                        $stock = $product->stock
                        @endphp
                        @if($stock > 5)

                        <p><i class="fas fa-circle green"></i> en stock</p>

                        @elseif($stock <= 5 && $stock> 0)

                            <p><i class="fas fa-circle orange"></i> plus que {{ $stock }} disponible !</p>

                            @elseif($stock <= 0) <p><i class="fas fa-circle red"></i> rupture</p>

                                @endif

                                <img alt="image du produit" src="{{ asset("images/$product->image") }}">
                                @if(($product->promotion_name) && ($product->promotion_name!== null))
                                <h2 class="mt-2 text-center font-weight-bold promo-name">{{$product->promotion_name}}</h2>
                                <?php
                                echo "<p class=\"text-center promo-name\">Du " . date_format(new DateTime($product->start_date), 'd/m/y') . " au " . date_format(new DateTime($product->end_date), 'd/m/y') . ".</p>";
                                ?>
                                @endif

                                <div class="card-body">

                                    <h3 class="card-text font-weight-bold product-name">{{$product->name}}</h3>

                                    @if(($product->promotion_name) && ($product->promotion_name!== null))
                                    <h2 class="mt-2 text-center font-weight-bold">{{$product->promotion_name}}</h2>
                                    <?php
                                    echo "<p class=\"text-center\">Du " . date_format(new DateTime($product->start_date), 'd/m/y') . " au " . date_format(new DateTime($product->end_date), 'd/m/y') . ".</p>";
                                    ?>
                                    @endif

                                    @php
                                    echo $product->average_rates
                                    @endphp

                                    <p class="card-text">{{$product->short_description}}</p>

                                    <div class="d-flex justify-content-between align-items-center">

                                        <?php

                                        $date = date('Y-m-d');

                                        if (isset($product->promotion_name)) {

                                            if ($date >= $product->start_date && $date <= $product->end_date) {

                                                echo "<p class=\"font-weight-bold discount\">- " . $product->discount . "%</p>
                                                    <small class=\"text-muted\"><del>" . number_format($product->price, 2, ',', ' ') . "€</del></small>";

                                                $promoPrice = $product->price - ($product->price * ($product->discount / 100));
                                                echo "<p class=\"font-weight-bold promo-price\">" . number_format($promoPrice, 2, ',', ' ') . "€</p>";
                                            } else {
                                                echo "<p class=\"font-weight-bold discount\">- " . $product->discount . "%</p>
                                                    <p class=\"font-weight-bold price\">" . number_format($product->price, 2, ',', ' ') . "€</p>";
                                            }
                                        } else {
                                            echo "<p class=\"font-weight-bold price\">" . number_format($product->price, 2, ',', ' ') . "€</p>";
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
@section('footer')
    @include('layouts.footer')
    @endsection

@endsection