<?php

use App\Models\Product;

function tvaCost($amount)
{
    $tvaCost = $amount * (20 / 100);

    return $tvaCost;
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