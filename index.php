<?php
    session_start();
    require 'functions/curl.php';
    require 'functions/side_function.php';
    require 'view/head.php';
    require 'view/sidebar_left.php';
    if (!isset($_SESSION['GameState'])){
        $_SESSION['GameState'] = 0;
    }
?>
    <div class="content item contentRight">
        <?php
        switch($_SESSION['GameState']){
            case 0:
                $StartPage = GetRandURL();
                $EndPage = GetRandUrl();
                echo $StartPage, '</br>', $EndPage;
                require 'view/StartPage.php';
                break;
            case 1:
                require 'view/article.php';
                break;
            case 2:
                echo 'Victory !';
                break;
            default :
                echo 'ERROR, wrong value of GameState';
                echo 'GameState = '.$_SESSION['GameState'];
        }
        ?>
    </div>

<?php require 'view/footer.php'?>
