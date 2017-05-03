<?php
/****************************/
/*      cURL Functions      */
/****************************/

//cURL request to get the Wiki page content. Parameter : url adress.
function GetWikipage($url){
    //Init cURL
    $ch = curl_init();
    //Set URL
    curl_setopt($ch, CURLOPT_URL, $url);
    //Return page
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //Do not verify certificate
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //Get header
    curl_setopt($ch, CURLOPT_HEADER, false);
    //Execute request and stock the result into a variable
    $resultat = curl_exec($ch);
    //Close cURL connection
    curl_close($ch);
    //Return variable
    return $resultat;
}

//Return a link to a random Wikipedia article
function GetRandURL(){
    $RandURL = 'https://fr.wikipedia.org/wiki/Spécial:Page_au_hasard';
    //Init cURL
    $ch = curl_init();
    //cURL options
    curl_setopt($ch, CURLOPT_URL, $RandURL);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_exec($ch);
    //Get and return the URL in the header
    $url = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
    return $url;
}


/****************************/
/*  cURL result treatment   */
/****************************/

