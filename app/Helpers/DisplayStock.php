<?php

/**
 * DisplayStock helper
 *
 * 
 * @param $articleId
 *
 * 
 */

function displayStock($type_prix, $stock)
{
    if ($type_prix == "pièce") {

        if ($stock >= 10) {
            echo "<button class=\"btn btn-success btn-sm mb-3\">En stock</button>";
        } else if ($stock < 10 && $stock > 0) {
            echo "<button class=\"btn btn-warning btn-sm mb-3\">Plus que " . $stock . " en stock !</button>";
        } else {
            echo "<button class=\"btn btn-danger btn-sm mb-3\">Article en rupture de stock</button>";
        }

    } elseif ($type_prix == "kilo") {

        if ($stock >= 5) {
            echo "<button class=\"btn btn-success btn-sm mb-3\">En stock</button>";
        } else if ($stock < 5 && $stock > 0) {
            echo "<button class=\"btn btn-warning btn-sm mb-3\">Plus que " . $stock . " kilo(s) en stock !</button>";
        } else {
            echo "<button class=\"btn btn-danger btn-sm mb-3\">Article en rupture de stock</button>";
        }
    }
}


