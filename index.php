<?php
    session_start();
    require 'functions/curl.php';
    require 'functions/side_function.php';
    require 'view/head.php';
    require 'view/sidebar_left.php';
    $GameState = 1;
?>
    <div class="content item contentRight">
        <?php
        switch($GameState){
            case 0:
                $StartPage = GetRandURL();
                $EndPage = GetRandUrl();
                echo $StartPage, '</br>', $EndPage;
                break;
            case 1:
                require 'view/article.php';
                break;
            case 2:
                echo 'Victory !';
                break;
            default :
                echo 'ERROR, wrong value of $GameState';
                echo '$GameState = '.$GameState;
        }
        ?>
    </div>

<?php require 'view/footer.php'?>
