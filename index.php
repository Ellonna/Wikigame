<?php
    session_start();
    require 'curl.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title> Wikigame </title>
</head>
<body>
    <h1>OKAY IT'S DONE NOW KOFEE TIME !!!</h1>
    <?php
        //$page = GetWikipage($wikipediaURL);
        //$head = GetPageHeader($wikipdiaURL);
        $testpage = GetWikiPage('https://fr.wikipedia.org/wiki/CURL');
        GetArticle($testpage);
        //echo $page;
    ?>
    <!--<iframe src="https://fr.wikipedia.org/wiki/CURL" width="100%" height="800%" frameborder="0" scrolling="yes"></iframe>-->
    <div>
        
    </div>
</body>
</html>