<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\CartInterfaceRepository;

use App\Models\Product;


class CartController extends Controller
{
    protected $cartRepository;

    public function __construct(CartInterfaceRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    //Affichage du panier
    public function show() {
        return view("cart.cartShow");
    }

    //Ajout d'un produit au panier
    public function add(Product $product, Request $request) {

        //validation de la requête
        $this->validate($request, [
            "quantity" => "numeric|min:1"
        ]);

        //Ajout/Mise à jour du produit au panier avec sa quantité
        $this->cartRepository->add($product, $request->quantity);

        //redirection vers le panier avec un message
        return redirect()->route("cart.cartShow")->withMessage("Produit ajouter au panier");

    }

    //Suppression d'un produit du panier
    public function remove(Product $product) {

        //Suppression du produit du panier par son identifiant
        $this->cartRepository->remove($product);

        //Redirection vers le panier
        return back()->withMessage("produit retiré du panier");
    }

    //Vider le panier
    public function empty() {

        //Suppression des informations du panier en session
        $this->cartRepository->empty();

        //Redirection vers le panier
        return back()->withMessage("Panier vidé");
    }

}
