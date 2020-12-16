<form action="{{ route('product.search') }}" method="get" class="d-flex mr-3">
    <div class="form-group mb-0  ml-5">
        <input type="text" name="search" class="form-control" placeholder="Chercher un produit">
    </div>
    <button type="submit" class="btn "><i class="fas fa-search btnSearch"></i></button>
</form>