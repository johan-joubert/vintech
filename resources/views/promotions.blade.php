@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{ route('addProductPromotion') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="selectRange" class="form-label">Produit</label>
            <select class="form-control" name="product_id" aria-label="Default select example" id="selectRange">
                @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="selectRange" class="form-label">Promotion</label>
            <select class="form-control" name="promotion_id" aria-label="Default select example" id="selectRange">
                @foreach($promotions as $promotion)
                <option value="{{$promotion->id}}">{{$promotion->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Réduction</label>
            <input type="number" name="discount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

@endsection