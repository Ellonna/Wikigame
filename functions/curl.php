<?php
//URL for a random article
$RandURL = 'https://fr.wikipedia.org/wiki/Spécial:Page_au_hasard';

//(NOT FINISHED) Header treatment.
function HandleHeaderLine( $curl, $header_line ) {
    echo "<br>YEAH: ".$header_line; // or do whatever
    return strlen($header_line);
}

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
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
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

//cURL request to get the Wiki page header only. Parameter : url adress.
function GetWikiHeader($url){
    //Init cURL
    $ch = curl_init();
    //Set URL
    curl_setopt($ch, CURLOPT_URL, $url);
    //Return page
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    //Send User-agent
    curl_setopt($ch, CURLOPT_USERAGENT, 'Nous ne sommes pas malicieux');
    //Do not verify certificate
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //Get header
    //curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_HEADERFUNCTION, "HandleHeaderLine");
    //Execute request and stock the result into a variable
    $headers = curl_exec($ch);
    var_dump($headers);
    //Close cURL connection
    curl_close($ch);
    //Return variable
    return $headers;
    //list($headers, $response) = explode("\r\n\r\n", $resultat, 2);
    // $headers now has a string of the HTTP headers
    // $response is the body of the HTTP response

    /*$headers = explode("\n", $headers);
    var_dump ($headers);
    foreach($headers as $header) {
        if (stripos($header, 'Location:') !== false) {
            echo "The location header is: '$header'";
        }
    }
    return $resultat;*/
}

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

    $url = curl_getinfo($ch, CURLINFO_REDIRECTED_URL);
    return $url;
}


/****************************/
/*  cURL result treatment   */
/****************************/

//Get information from header. Parameter : cURL header.
function get_headers_from_curl_response($response){
    $headers = array();

    $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

    foreach (explode("\r\n", $header_text) as $i => $line){
        if ($i === 0){
            $headers['http_code'] = $line;
        }
        else{
            list ($key, $value) = explode(': ', $line);

            $headers[$key] = $value;
        }

        return $headers;
    }
    $headersTab = get_headers_from_curl_response($headers);
    var_dump($headersTab);
    return $headersTab;
}

//Get inner HTML of Wiki article. Parameter : cURL result page.
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
    echo $innerHTML;
    //return $innerHTML;
}

function clear_article($str){
    $len = strpos($str, "<div_class=\"printfooter")-strpos($str, "<div_id=\"mw-content-text");
$str = substr($str,strpos($str,"<div_id=\"mw-content-text"),$len);
    $str = preg_replace("/<a(.*?)href=\"\/w\/(.*?)<\/a>/","",$str);
    $str=preg_replace("/<a(.*?)href=\"\/wiki\/(.*?)\"(.*?)>(.*?)<\/a>/","<a_$1_href=\"game.php?article=$2\"$3>$4</a>",$str);
    return $str;
}
