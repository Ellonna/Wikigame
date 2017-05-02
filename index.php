<?php
    session_start();
    require 'functions/curl.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> PARCE QUE C'EST NOTRE PROJET </title>
    <link rel="stylesheet" type="text/css" href="css/projet_informatique.css"/>
    <!--<link rel="stylesheet" type="text/css" href="wiki_style.css"/>-->
</head>

<body>
    <div class="container">
        <div class="header item"> ♥ PARCE QUE C'EST NOTRE PROJET ♥ </div>
        <div class="contentBody">
            <div class="menuLeft item contentLeft">
                <!-- TODO : Add left items -->
            </div>

            <div class="content item contentRight">
                <br/>
                Ce projet est jeune et dynamique ! ♥
                </br>
                <img id="macron" src="https://image.noelshack.com/fichiers/2017/02/1484399870-macron.png" />
                <?php
                    //$page = GetWikipage($wikipediaURL);
                    //$head = GetPageHeader($wikipdiaURL);
                    $testpage = GetWikiPage('https://fr.wikipedia.org/wiki/CURL');
                    GetArticle($testpage);
                    //GetWikiHeader('$wikipediaRandURL');
                    //echo bite;
                ?>
            </div>
            <div class="clearb"></div>
        </div>

        <div class="footer item"> HIHIHIIHIHIHI ♥
        </div>
    </div>
</body>
</html>
