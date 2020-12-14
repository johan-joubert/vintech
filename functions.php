<?php

use App\Models\Product;

function tvaCost()
{
    $cost = 0;
    foreach ($_SESSION as $product) {
        $cost += $product->price * (20 / 100);
    }
    return sprintf('%.2f', $cost);
}


function promoPrice($productId)
{    
    $product = Product::findOrFail($productId);
    $product->load('promotions');

    if (count($product->promotions) > 0) {

        $discount = $product->promotions[0]->pivot->discount;

        $promoPrice = $product->price - ($product->price * ($discount / 100));

        return $promoPrice;
    } 
    else {
        return $product->price;
    }
}

?>