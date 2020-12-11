@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-group">
                    <a href="{{route('product.index')}}"><li class="list-group-item active" aria-current="true">Créeation produits, gammes promotions</li></a>
                    <a href="{{route('admin.edit')}}"><li class="list-group-item">Modifier produits, gammes, promotions</li></a>
                </ul>
            </div>
            <div class="col-lg-6 text-center">
                <?php 
                
                    echo count($ranges). " gammes dans la boutique <br>";
                    
                    echo count($products). " produits dans la boutique";

                
                ?>
            </div>
        </div>
    </div>

@endsection