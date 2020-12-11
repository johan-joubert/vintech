<?php

namespace App\Repositories;

use App\Models\Product;

interface CartInterfaceRepository {

    // Afficher le panier
    public function show();

    // Ajouter un produit au panier
    public function add(Product $product, $quantity);

    // Retirer un produit du panier
    public function remove(Product $product);

    // Vider le panier
    public function empty();


}



?>