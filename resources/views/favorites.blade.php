@extends('layouts.app')
@php
include('../functions.php');
$variables = getVariables();

$products_navBar = $variables[0];
$ranges_navBar = $variables[1];
$promotions_navBar = $variables[2];

@endphp

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <h1>Mes favoris</h1>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($user->likes as $product)

            <div class="col mb-3">
                <a href="{{ route('product.show', $product->id) }}">

                    <div class="card shadow-sm">
                        <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                        @if(isset($product->promotions[0]->name) && ($product->promotions[0]->name!== null))
                        <h2 class="mt-2 text-center font-weight-bold">{{$product->promotions[0]->name}}</h2>
                        <?php
                            echo "<p class=\"text-center\">Du " . date_format(new DateTime($product->promotions[0]->start_date), 'd/m/y') . " au " . date_format(new DateTime($product->promotions[0]->end_date), 'd/m/y') . ".</p>";
                        ?>
                        @endif

                        <div class="card-body">
                        
                            <h3 class="card-text">{{$product->name}}</h3>
                            <p class="card-text">{{$product->short_description}}</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <?php
                                    $date=date('Y-m-d');

                                    if (isset($product->promotions[0]->name) && ($date <= $product->promotions[0]->end_date)) {

                                        if ($date >= $product->promotions[0]->start_date && $date <= $product->promotions[0]->end_date) {

                                            echo "<p class=\"font-weight-bold\">-". $product->promotions[0]->pivot->discount ."%</p>
                                            <small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', ' ')  . "€</del></small>";

                                            $promoPrice = $product->price - ($product->price * ($product->promotions[0]->pivot->discount / 100));
                                            echo "<p class=\"font-weight-bold\">" .  number_format($promoPrice, 2, ',', ' ')  . "€</p>";
                                        
                                        }else {
                                            echo "<p class=\"font-weight-bold\">- ".$product->promotions[0]->pivot->discount." %</p>
                                                <p>" .  number_format($product->price, 2, ',', ' ')  . "€</p>";
                                        }
                                    } else {
                                        echo "<p>" .  number_format($product->price, 2, ',', ' ')  . "€</p>";
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

@endsection