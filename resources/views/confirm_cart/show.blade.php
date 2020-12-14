@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h2>
                Confirmation de votre commande
                <span class="text-muted">
                    (4 article)
                </span>
            </h2>
        </div>
    </div>


    <!-- DEBUT FOREACH -->

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Nom produit</h5>
            <img src="" alt="">
            <p class="card-text">Short description, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas, vero quod quidem fugit sequi qui atque...</p>
            <p class="text-right">Prix unitaire : 10 €</p>
        </div>
        <div class="card-footer text-right text-muted">
            Quantité : 4<br>
            <span class="text-dark">
                Prix total : 40 €
            </span>
        </div>
    </div>
    <!-- ENDFOREACH -->
</div>


<!-- inclure show addresses -->

@include('components.confirm_cart.delivery_choice')


<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12 bg-dark bg-gradient text-white text-right">
            <div class="col-md-10">
                <h3>Montant de votre commande</h3>

                <p>
                    Montant HT : 33.33 €<br>
                    <span class="text-muted">
                        TVA (20%): 6.67 €<br>
                        Livraison standard : 0 €<br>
                    </span>
                    <b>Montant TTC : 40 €</b>
                </p>

                <a href="">
                    <button type="btn" class="btn btn-danger mb-3">Confirmer achat</button>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection