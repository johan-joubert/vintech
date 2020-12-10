@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <h1>{{$range[0]->range}}</h1>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($range as $product)
            <div class="col mb-3">
                <div class="card shadow-sm">
                    <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                    <div class="card-body">
                        <p class="card-text">{{$product->name}}</p>
                        <p class="card-text">{{$product->short_description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">

                                <?php
                                $article = new stdClass;
                                $article->name = $product->name;
                                $article->id = $product->id;
                                $article->short_description = $product->short_description;
                                $article->description = $product->description;
                                $article->image = $product->image;
                                $article->price = $product->price;
                                $article->weight = $product->weight;
                                $article->stock = $product->stock;
                                $article->range_id = $product->range_id;
                                ?>

                                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('products.show', $article->id) }}">Détails</a>

                            </div>
                            
                            <?php
                                echo "<small class=\"text-muted\">" .  number_format($product->price, 2, ',', 0)  . "€</small>";
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>

@endsection