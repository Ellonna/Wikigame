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

function NewPage($url){
            $pagemodif;
            $curl=curl_init($url);//initialisation de la session url
            curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
            if (preg_match('`^https://`i', $url))// Ne pas vérifier la validité du certificat SSL
            {
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            }
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $return = curl_exec($curl);
            curl_close($curl);
            $pagemodif = strstr ( $return , "<h1 id=\"firstHeading\" class=\"firstHeading\"");
            $pagemodif = strstr ( $pagemodif , "<div class=\"printfooter\">",true);
            $pagemodif = $pagemodif.'</div>';

            // Ici nous allons transformer les liens que l'on garde en balise inutile pour ensuite supprimer tout les autres liens
            // a la fois externes et interne inutile (modifier le code / aide / etc...) puis les remettre de sorte a pouvoir les utiliser
            $pagemodif = preg_replace('#<a .*?href="/wiki/([^:]*?)".*?>(.*?)</a>#','<evitercasse$1evitercasse$2evitercasse>',$pagemodif);
            $pagemodif = preg_replace( '#<a [^>]*>(.*?)</a>#','<span class="ancienlien">$1</span>',$pagemodif );
            $pagemodif = preg_replace('#<evitercasse(.*?)evitercasse(.*?)evitercasse>#','<a href="jeu.php?acces=$1">$2</a>',$pagemodif);

            $pagemodif = preg_replace( '#<span class="mw-editsection">.+<span class="mw-editsection-bracket">]</span></span>#'," ",$pagemodif );
            return $pagemodif;
        }

/****************************/
/*  cURL result treatment   */
/****************************/
function GetArticle($page) {
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($page);
    libxml_clear_errors();
}

function clear_article($str){
    $len = strpos($str, "<div_class=\"printfooter")-strpos($str, "<div_id=\"mw-content-text");
    $str = substr($str,strpos($str,"<div_id=\"mw-content-text"),$len);
    $str = preg_replace("/<a(.*?)href=\"\/w\/(.*?)<\/a>/","",$str);
    $str=preg_replace("/<a(.*?)href=\"\/wiki\/(.*?)\"(.*?)>(.*?)<\/a>/","<a_$1_href=\"game.php?article=$2\"$3>$4</a>",$str);
    return $str;
}

function clear_title($url){
    //on efface le début du lien pour ne garder que le titre de l'article
    $url = preg_replace("/https:\/\/fr.wikipedia.org\/wiki\//","",$url);
    //On remplace les %2C ect par les bons caracteres
    $url=preg_replace("/_/","_",$url);

    return $url;//On renvoie le titre
}
