<?php
/*
|--------------------------------------------------------------------------
| HEllo function 
|--------------------------------------------------------------------------
| Content comment
*/

function beautyPrice($price)
{
    
    if ($price >= 1000000000) {
        return round($price / 1000000000, 1) . ' tỉ';
    } elseif ($price >= 1000000) {
        return round($price / 1000000, 1) . ' triệu';
    } elseif ($price >= 1000) {
        return round($price / 1000, 1) . ' nghìn';
    } {
        return $price;
    }
}
