<?php
//URL for a random article
$wikipediaRandURL = 'https://fr.wikipedia.org/wiki/Spécial:Page_au_hasard';

function HandleHeaderLine( $curl, $header_line ) {
    echo "<br>YEAH: ".$header_line; // or do whatever
    return strlen($header_line);
}

function GetWikipage($url){
    //Init cURL
    $ch = curl_init();
    //Set URL
    curl_setopt($ch, CURLOPT_URL, $url);
    //Return page
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //Send User-agent
    curl_setopt($ch, CURLOPT_USERAGENT, 'Nous ne sommes pas malicieux');
    //Do not verify certificate
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //Get header
    curl_setopt($ch, CURLOPT_HEADER, false);
    //curl_setopt($ch, CURLOPT_HEADERFUNCTION, "HandleHeaderLine");
    //Execute request and stock the result into a variable
    $resultat = curl_exec($ch);
    //Close cURL connection
    curl_close($ch);
    //Return variable
    return $resultat;
}

function GetWikiHeader($url){
    //Init cURL
    $ch = curl_init();
    //Set URL
    curl_setopt($ch, CURLOPT_URL, $url);
    //Return page
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    //Send User-agent
    curl_setopt($ch, CURLOPT_USERAGENT, 'Nous ne sommes pas malicieux');
    //Do not verify certificate
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //Get header
    curl_setopt($ch, CURLOPT_HEADER, true);
    //curl_setopt($ch, CURLOPT_HEADERFUNCTION, "HandleHeaderLine");
    //Execute request and stock the result into a variable
    $resultat = curl_exec($ch);
    //Close cURL connection
    curl_close($ch);
    //Return variable
    return $resultat;
}



function GetArticle($page){
    //Create new DOMDocument
    $wikipediaPage = new DOMDocument();
    //Load cURL content
    libxml_use_internal_errors(true);
    $wikipediaPage->loadHTML($page);
    libxml_clear_errors();
    //Get the bodyContent block (article)
    $article = $wikipediaPage->GetElementById('bodyContent');
    //Get inner HTML
    $children = $article->childNodes;
    foreach ($children as $child) {
        $tmp_doc = new DOMDocument();
        $tmp_doc->appendChild($tmp_doc->importNode($child,true));       
        $innerHTML = '';
        $innerHTML .= $tmp_doc->saveHTML();
    } 
    return $innerHTML;
}

function GetPageHeader($url){
    $headers=get_headers($host, 1);
    return $headers;
}

