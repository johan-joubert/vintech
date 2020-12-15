@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6 mb-3">
                <div class="card shadow-sm">
                    <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                    @if(isset($product->promotions[0]) && ($product->promotions[0] !== null))
                    <h2 class="mt-2 text-center font-weight-bold">{{$product->promotions[0]->name}}</h2>
                    <?php
                    echo "<p class=\"text-center\">Du " . date_format(new DateTime($product->promotions[0]->start_date), 'd/m/y') . " au " . date_format(new DateTime($product->promotions[0]->end_date), 'd/m/y') . ".</p>";
                    ?>
                    @endif

                    <div class="card-body">

                        <h3 class="card-text">{{$product->name}}</h3>
                        <p class="card-text">{{$product->short_description}}</p>
                        <p class="card-text">{{$product->description}}</p>

                        <div class="d-flex justify-content-between align-items-center">

                            <!-- @unless (auth()->user()->is($user))

                            <form method="POST" action="/profile/{{ $user->chickname }}/follow">
                                @csrf
                                    <button type="submit" class="btn btn-warning shadow ml-3">
                                        {{ auth()->user()->isFollowing($user) ? 'Se désabonner' : 'S'abonner' }}
                                    </button>
                            </form>

                            @endif

                            <button type="submint" class="btn">
                                <i class="far fa-heart"></i>
                            </button> -->

                            <?php

                            $date = date('Y-m-d');

                            if (isset($product->promotions[0]) && ($date <= $product->promotions[0]->end_date)) {

                                if ($date >= $product->promotions[0]->start_date && $date <= $product->promotions[0]->end_date) {

                                    echo "<p class=\"font-weight-bold\">-" . $product->promotions[0]->pivot->discount . "%</p>
                                            <small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', 0)  . "€</del></small>";

                                    $promoPrice = $product->price - ($product->price * ($product->promotions[0]->pivot->discount / 100));
                                    echo "<p class=\"font-weight-bold\">" .  number_format($promoPrice, 2, ',', 0)  . "€</p>";
                                } else {

                                    echo "<p class=\"font-weight-bold\">-" . $product->promotions[0]->pivot->discount . "%</p>
                                            <p>" .  number_format($product->price, 2, ',', 0)  . "€</p>";
                                }
                            } else {
                                echo "<p>" .  number_format($product->price, 2, ',', 0)  . "€</p>";
                            }
                            ?>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="form-inline d-inline-block">
                                {{ csrf_field() }}
                                <input type="number" name="quantity" placeholder="Quantité ?" class="form-control mr-2" value="{{ isset(session('cart')[$product->id]) ? session('cart')[$product->id]['quantity'] : null }}">
                                <button type="submit" class="btn btn-warning">+ Ajouter au panier</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection