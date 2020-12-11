<!-- @extends('layouts.app')

@section('content')


<div class="container">
    <h2>Choisir un produit à modifier</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ranges as $range)
            <tr>
                <th scope="row">{{$product->name}}</th>
                <td>
                    <a href="{{ route('admin.update.product', $product->id) }}" class="text-left">
                        <button class="btnEdit "><i class="fas fa-edit "></i>Modifier</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('product.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btnEdit text-left"><i class="fas fa-trash-alt"></i>Supprimer</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>



@endsection -->