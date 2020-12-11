@extends('layouts.app')

@section('content')

    <div class="container">
        <ul class="list-group">
            <a href="{{route('product.index')}}"><li class="list-group-item active" aria-current="true">Créeation produits, gammes promotions</li></a>
            <a href="{{route('admin.edit')}}"><li class="list-group-item">Modifier produits, gammes</li></a>
        </ul>
    </div>

@endsection