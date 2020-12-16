@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">

        <div class="col-md-4">
            <img alt="image du produit" src="{{ asset("images/$product->image") }}" width="500">
        </div>

        <div class="col-md-4">
            <h3 class="card-text">{{$product->name}}</h3>
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
            <p class="card-text">{{$product->description}}</p>
        </div>

        <div class="col-md-4">

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

                    echo "<p class=\"font-weight-bold\">-" . $product->promotions[0]->pivot->discount . "%</p>
                        <small class=\"text-muted\"><del>" .  number_format($product->price, 2, ',', '')  . "€</del></small>";

                    $promoPrice = $product->price - ($product->price * ($product->promotions[0]->pivot->discount / 100));
                    echo "<p class=\"font-weight-bold\">" .  number_format($promoPrice, 2, ',', '')  . "€</p>";
                } else {

                    echo "<p class=\"font-weight-bold\">-" . $product->promotions[0]->pivot->discount . "%</p>
                        <p>" .  number_format($product->price, 2, ',', '')  . "€</p>";
                }
            } else {
                echo "<p>" .  number_format($product->price, 2, ',', '')  . "€</p>";
            }
            ?>

            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="form-inline d-inline-block">
                {{ csrf_field() }}
                <input type="number" name="quantity" placeholder="Quantité ?" class="form-control mr-2" value="{{ isset(session('cart')[$product->id]) ? session('cart')[$product->id]['quantity'] : null }}">
                <button type="submit" class="btn btn-warning">+ Ajouter au panier</button>
            </form>


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
            <label for="exampleInputPassword1" class="form-label">Avis</label>
            <input type="text" name="comment" class="form-control" id="exampleInputPassword1">
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