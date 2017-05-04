<?php
function clean(){
    //on efface le début du lien pour ne garder que le titre de l'article
    $result = preg_replace("/https:\/\/fr.wikipedia.ord\/wiki\//","",$result);
    //On remplace les %2C ect par les bons caracteres
    $result=preg_replace("/_/","_",$result);

    return $result;//On rencoie le titre
}
