<?php

use App\Models\Product;
use App\Models\Review;
use App\Models\Promotion;
use App\Models\Range;
use App\Models\User;

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

function getVariables () {
    $products_navBar = Product::all();
    $ranges_navBar = Range::all();
    $promotions_navBar = Promotion::all();

    return [$products_navBar, $ranges_navBar, $promotions_navBar];
}


function shippingFees ($total, $shippingFees) {
    if ($total >= 150) {
        $oldShippingFees = $shippingFees;
        $shippingFees = 0;
        echo '<del>' . $oldShippingFees . ' €</del> -> ' . $shippingFees . ' €';
    } else {
        echo $shippingFees;
    }
}
?>