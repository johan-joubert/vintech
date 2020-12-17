<?php

namespace App\Repositories;

use App\Models\Product;

class CartSessionRepository implements CartInterfaceRepository {
    //afficher le panier
    public function show () {
        return view("cart.showCart");
    }
    
    //Ajouter/Mettre à jour un produit du panier
    public function add(Product $product, $quantity) {
        $cart = session()->get("cart"); // récupération du panier en session

        // les infos du produit à ajouter
        $product_details = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price, 
            'image' => $product->image,
            'stock' => $product->stock,
            'weight' => $product->weight,
            'quantity' => $quantity, 
        ];

        $cart[$product->id] = $product_details; // on ajoute ou on met à jour le produit du panier
        session()->put("cart", $cart);
    }

    //Retirer un produit du panier
    public function remove (Product $product) {
        $cart = session()->get("cart"); // On récupère le panier en session
        unset($cart[$product->id]); // On supprimer le produit du tableau $cart
        session()->put("cart", $cart); // On enregistre le panier
    }

    //Vider le panier
    public function empty () {
        session()->forget("cart"); // on supprime le panier en session
    }
}


?>