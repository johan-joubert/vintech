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
            <img alt="image du produit" src="{{ asset("images/$product->image") }}" width="500">
        </div>

        <div class="col-md-4">
            <h3 class="card-text">{{$product->name}}</h3>
            @php
            echo $product->average_rates
            @endphp
            <p class="card-text">{{$product->short_description}}</p>
            <p class="card-text">{{$product->description}}</p>
        </div>

        <div class="col-md-4">

            @if(isset($product->promotions[0]) && ($product->promotions[0] !== null))
            <h2 class="mt-2 text-center font-weight-bold">{{$product->promotions[0]->name}}</h2>
            <?php
            echo "<p class=\"text-center\">Du " . date_format(new DateTime($product->promotions[0]->start_date), 'd/m/y') . " au " . date_format(new DateTime($product->promotions[0]->end_date), 'd/m/y') . ".</p>";
            ?>
            @endif

            <form method="POST" action="{{route('favorites.store')}}">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="productId">
                <button type="submit">
                    <?php

                    use App\Models\User;
                    if(auth()->user()) {
                    $user = User::find(auth()->user()->id);
                    echo (auth()->user()->isLiked($product)) ? 'Retirer des favoris' : 'Ajouter aux favoris';
                    }
                    ?>
                </button>

            </form>

            <?php

            $date = date('Y-m-d');

            if (isset($product->promotions[0]) && ($date <= $product->promotions[0]->end_date)) {

                if ($date >= $product->promotions[0]->start_date && $date <= $product->promotions[0]->end_date) {

                    echo "<p class=\"font-weight-bold\">-" . $product->promotions[0]->pivot->discount . "%</p>
                        <small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', ' ')  . "€</del></small>";

                    $promoPrice = $product->price - ($product->price * ($product->promotions[0]->pivot->discount / 100));
                    echo "<p class=\"font-weight-bold\">" .  number_format($promoPrice, 2, ',', ' ')  . "€</p>";
                } else {

                    echo "<p class=\"font-weight-bold\">-" . $product->promotions[0]->pivot->discount . "%</p>
                        <p>" .  number_format($product->price, 2, ',', ' ')  . "€</p>";
                }
            } else {
                echo "<p>" .  number_format($product->price, 2, ',', ' ')  . "€</p>";
            }
            ?>

            @php
            $stock = $product->stock
            @endphp

            @if($stock > 0)

            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="form-inline d-inline-block">
                {{ csrf_field() }}
                <input type="number" min=1 max="{{$product->stock}}" name="quantity" placeholder="Quantité ?" class="form-control mr-2" value="{{ isset(session('cart')[$product->id]) ? session('cart')[$product->id]['quantity'] : null }}">
                <button type="submit" class="btn btn-warning">+ Ajouter au panier</button>
            </form>

            @elseif($stock == 0)

            <p>oups rupture</p>

            @endif




        </div>

    </div>

</div>

<div class="container">
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
            <input type="text" name="comment" class="form-control" id="comment">
        </div>
        <input type="hidden" value="{{$product->id}}" name="productId">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@foreach($product->reviews as $review)

<div class="row">
    <div class="col-md-8">
        <div class="col-md-6">
            <p><strong>{{ $review->user->first_name }}</strong> - {{ $review->created_at->diffForHumans() }}</p>
        </div>
    </div>

</div>
<div class="row">

    <div class="col-md-12 text-center card-body">
        <br>

        {{$review->rate}} / 5
        {{$review->comment}}
    </div>
    <hr>
</div>

@endforeach



@endsection