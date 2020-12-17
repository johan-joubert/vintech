<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Reque;

use App\Repositories\CartInterfaceRepository;

use App\Models\Product;
use App\Models\Promotion;
use App\Models\Range;


class CartController extends Controller
{
    protected $cartRepository;

    public function __construct(CartInterfaceRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    //Affichage du panier
    public function show() {
        $products = Product::all();
        $promotions = Promotion::all();
        $ranges = Range::all();

        return view("cart.showCart", ['products' => $products, 'promotions' => $promotions, 'ranges' => $ranges]);
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
        return redirect()->route("cart.show")->withMessage("Produit ajouté au panier");

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
