<?php
if( ! $_SESSION) {
    session_start();
}
?>
<?php
    $articleURL = 'https://fr.wikipedia.org/wiki/'.$_SESSION['CurrentPage'];
    $page = GetWikiPage($articleURL);
    echo clear_article($page);
?>
