<?php

function tvaCost()
{
    $cost = 0;
    foreach ($_SESSION as $product) {
        $cost += $product->price * (20 / 100);
    }
    return sprintf('%.2f', $cost);
}

?>