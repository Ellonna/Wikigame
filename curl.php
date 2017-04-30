<?php
//La page qu'on veut utiliser
$wikipediaURL = 'https://fr.wikipedia.org/wiki/Spécial:Page_au_hasard';

function HandleHeaderLine( $curl, $header_line ) {
    echo "<br>YEAH: ".$header_line; // or do whatever
    return strlen($header_line);
}

function GetWikipage($url){
//On initialise cURL
$ch = curl_init();
//On lui transmet la variable qui contient l'URL
curl_setopt($ch, CURLOPT_URL, $url);
//On lui demdande de nous retourner la page
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//On envoie un user-agent pour ne pas être considéré comme un bot malicieux
curl_setopt($ch, CURLOPT_USERAGENT, 'Nous ne sommes pas malicieux');
//Ne pas vérifier le certificat
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//On récupère l'en-tête
curl_setopt($ch, CURLOPT_HEADER, false);
//curl_setopt($ch, CURLOPT_HEADERFUNCTION, "HandleHeaderLine");
//On exécute notre requête et met le résultat dans une variable
$resultat = curl_exec($ch);
//On ferme la connexion cURL
curl_close($ch);
//On retourne la variable
return $resultat;
}



function GetArticle($page){
    //On crée un nouveau document DOMDocument
    $wikipediaPage = new DOMDocument();
    //On y charge le contenu qu'on a récupéré avec cURL
    $wikipediaPage->loadHTML($page);
    //$wikipediaPage->saveHTML();
    $article = $wikipediaPage->GetElementById('bodyContent');
    $children = $article->childNodes;
    foreach ($children as $child) {
        $tmp_doc = new DOMDocument();
        $tmp_doc->appendChild($tmp_doc->importNode($child,true));       
        $innerHTML .= $tmp_doc->saveHTML();
    } 
    echo $innerHTML;
}

function GetPageHeader($url){
    $headers=get_headers($host, 1);
    return $headers;
}

