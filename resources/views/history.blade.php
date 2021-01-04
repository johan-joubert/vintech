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

    <div class="row text-center mt-3 mb-5">
        <h1>Vintech</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="mt-2 mb-3">Présentation</h3>
            <p>VINTECH est une entreprise française<br> spécialisée dans la distribution de produits vintage.<br>
                Créée en 1998 par Jean Rétro, elle c'est trés vite imposée<br>comme leader sur le marché européen.</p>
        </div>

        <div class="col-md-6 text-center">
            <img alt="locaux de vintech" class="w-75" src="{{ asset("images/local_vintech.jpg") }}">
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5 text-center">
            <img alt="entrepot de vintech" class="w-75" src="{{ asset("images/entrepot_vintech.jpg") }}">
        </div>

        <div class="col-md-5 offset-2">
            <h3 class="mt-2 mb-3">Qualité</h3>
            <p>L'équipe Vintech est structuré pour effectuer la meilleure sélection possible de produits.
                Dans la grande majorité des cas, nous établissons des relations directes et à long terme avec les fabricants.
                Notre service qualité s’assure lors des référencements mais également lors des livraisons d’effectuer des tests pour s’assurer du bon fonctionnement des produits.
                Votre avis compte : vous avez la possibilité d’évaluer les produits et ainsi de nous indiquer objectivement votre perçu quant à la qualité des produits.
                Cela nous permet d’améliorer perpétuellement la qualité de nos produits.</p>
        </div>
    </div>


    <div class="row">
        <h3 class="mt-2 mb-3 text-center">Contact</h3>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5 text-center">
            <p>Vintech</p>
            <p>10 allée des vieux chênes<br>
                23210 Mourioux-Vieilleville</p>
        </div>

        <div class="col-md-5 offset-2 text-center">
            <p>02.56.55.54.53</p>
            <p>jean-retro.vintech@gmail.com</p>
        </div>
    </div>

    <div class="row text-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2767.015333142536!2d1.6681948154527273!3d46.09067177911334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f9642fe9b0dffd%3A0x6d84d8a582ba8fdf!2sAll%C3%A9e%20des%20Vieux%20Ch%C3%AAnes%2C%2023210%20Mourioux-Vieilleville!5e0!3m2!1sfr!2sfr!4v1608213071740!5m2!1sfr!2sfr" width="900" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>        

</div>
@section('footer')
@include('layouts.footer')
@endsection
@endsection