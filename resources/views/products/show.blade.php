@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6 mb-3">
                <div class="card shadow-sm">
                    <img alt="image du produit" src="{{ asset("images/$product->image") }}">

                    @if(count($product->promotions)>0)
                    <p>{{$product->promotions[0]->name}}</p>
                    @endif

                    <div class="card-body">
                        <p class="card-text">{{$product->name}}</p>
                        <p class="card-text">{{$product->short_description}}</p>
                        <p class="card-text">{{$product->description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Ajouter au panier</button>
                            </div>

                            <?php
                                echo "<small class=\"text-muted\">" .  number_format($product->price, 2, ',', 0)  . "€</small>";
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>

@endsection