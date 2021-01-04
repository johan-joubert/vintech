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

    <div class="row">

        <div class="col-md-4">
            <img alt="image du produit" src="{{ asset("images/$product->image") }}" width="400" class="shadow">
        </div>

        <div class="col-md-5">

            <div class="row">
                <div class="col-12 d-flex">
                    <h1 class="card-text mr-4">{{$product->name}}</h1>

                    <form method="POST" action="{{route('favorites.store')}}">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="productId">
                        <button type="submit" id="btnFavorites" class="text-red">
                            <?php

                            use App\Models\User;

                            if (auth()->user()) {
                                $user = User::find(auth()->user()->id);
                                echo (auth()->user()->isLiked($product)) ? '<i class="fas fa-heart fa-3x"></i>' : '<i class="far fa-heart fa-3x"></i>';
                            }
                            ?>
                        </button>

                    </form>

                </div>
            </div>

            @php
            echo "<p><small>Moyenne évaluations " . $product->average_rates . "/5</small></p>";
            @endphp
            <p class="card-text">{{$product->short_description}}</p>
            <p class="card-text">{{$product->description}}</p>
        </div>

        <div class="col-md-2 offset-md-1">

            @if(isset($product->promotions[0]) && ($product->promotions[0] !== null))
            <h2 class="mt-2 text-center font-weight-bold">{{$product->promotions[0]->name}}</h2>
            <?php
            echo "<p class=\"text-center\">Du " . date_format(new DateTime($product->promotions[0]->start_date), 'd/m/y') . " au " . date_format(new DateTime($product->promotions[0]->end_date), 'd/m/y') . ".</p>";
            ?>
            @endif

            <?php

            $date = date('Y-m-d');

            if (isset($product->promotions[0]) && ($date <= $product->promotions[0]->end_date)) {

                if ($date >= $product->promotions[0]->start_date && $date <= $product->promotions[0]->end_date) {

                    echo "<h4 class=\"font-weight-bold discountPrice\">-" . $product->promotions[0]->pivot->discount . "%</h4>
                        <h4 class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', ' ')  . "€</del></h4>";

                    $promoPrice = $product->price - ($product->price * ($product->promotions[0]->pivot->discount / 100));
                    echo "<h4><span id=\"priceProduct\">" . number_format($promoPrice, 2, ',', ' ') . "€</span></h4>";
                } else {

                    echo "<h4 class=\"font-weight-bold\">-" . $product->promotions[0]->pivot->discount . "%</h4>
                        <h4>" .  number_format($product->price, 2, ',', ' ')  . "€</h4>";
                }
            } else {
                echo "<h4>" .  number_format($product->price, 2, ',', ' ')  . "€</h4>";
            }
            ?>

            @php
            $stock = $product->stock
            @endphp

            @if($stock > 0)

            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="form-inline d-inline-block">
                {{ csrf_field() }}
                <input type="number" min=1 max="{{$product->stock}}" name="quantity" placeholder="Quantité ?" class="form-control mb-2" value="{{ isset(session('cart')[$product->id]) ? session('cart')[$product->id]['quantity'] : null }}">
                <button type="submit" class="btn btn-warning">+ Ajouter au panier</button>
            </form>

            @elseif($stock == 0)

            <p>En cours de réaprovisionnement</p>

            @endif




        </div>

    </div>

</div>

<div class="container mt-5">
    <div class="row">

        <div class="col-md-5 mt-5">
            <h4 class="mb-4">
                Ajouter un avis
            </h4>
            <form action="{{route('show.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="exampleInputEmail1" class="form-label">Note</label>
                        <input type="number" name="rate" min=1 max=5 class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">de 1 à 5</div>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Avis</label>
                    <textarea type="text" row="2" name="comment" class="form-control" id="comment"></textarea>
                </div>
                <input type="hidden" value="{{$product->id}}" name="productId">
                <button type="submit" class="btn btn-red">Submit</button>
            </form>

        </div>

        <div class="col-md-5 offset-md-1 mt-5">
            <h4 class="mb-4">
                Avis clients
            </h4>
            @foreach($product->reviews as $review)

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 d-flex">
                        <h4 class="mr-2"><strong>{{ $review->user->first_name }}</strong></h4>
                        <p class="text-muted">{{ $review->created_at->diffForHumans() }}</p>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-md-12 text-center card-body">
                    <br>

                    {{$review->rate}} / 5
                    <br>
                    {{$review->comment}}
                </div>
                <hr>
            </div>

            @endforeach

        </div>
    </div>
</div>


@section('footer')
@include('layouts.footer')
@endsection


@endsection