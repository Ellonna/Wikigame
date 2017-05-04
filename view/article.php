<?php session_start(); ?>
<br/>
Ce projet est jeune et dynamique ! ♥
</br>
<?php
    $articleURL = 'https://fr.wikipedia.org/wiki/'.$_SESSION['CurrentPage'];
    /*$page = GetWikiPage('https://fr.wikipedia.org/wiki/CURL');
    echo NewPage('https://fr.wikipedia.org/wiki/CURL');*/
    echo $articleURL;
    //echo $_SESSION['CurrentPage'];
    $page = GetWikiPage($articleURL);
    echo clear_article($page);
?>
