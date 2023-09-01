<?php

/**
 * UploadImage helper
 * 
 * @param $request
 * 
 */

function uploadImage($image)
{
    //on donne un nom à l'image : timestamp en temps unix + extension
    $imageName = time() . '.' . $image->extension();

    // on déplace l'image dans public/images
    $image->move(public_path('images'), $imageName);

    //on retourne le nom de l'image
    return $imageName;
}

?>