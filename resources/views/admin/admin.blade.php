@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Ajouter une gamme</h2>

    <form action="{{ route('range.store') }}" method="POST">
        @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" name="range" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </form>

</div>

    <div class="container">
        <h2>Ajouter un produit</h2>

        <form action="{{ route('product.store') }}" method="POST">
        @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="selectRange" class="form-label">Gamme</label>
                <select class="form-control" name="range" aria-label="Default select example" id="selectRange">
                    @foreach($ranges as $range)
                    <option value="{{$range->id}}">{{$range->range}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Courte description</label>
                <input type="text" name="short_description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prix</label>
                <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Stock</label>
                <input type="text" name="stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Poids</label>
                <input type="text" name="weight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Promotion</label>
                <input type="text" name="promotion" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>


    <div class="container">

    <h2>Ajouter une campagne de promotion</h2>

    <form action="{{ route('promotion.store') }}" method="POST">
        @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date de départ</label>
                <input type="date" name="start_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date de fin</label>
                <input type="date" name="end_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>

            </form>

    </div>

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