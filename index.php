<?php
    session_start();
    require 'functions/curl.php';
    require 'functions/side_function.php';
    require 'view/head.php';
    require 'view/sidebar_left.php';
    if (!isset($_SESSION['GameState'])){
        $_SESSION['GameState'] = 0;
    }
    if (!isset($_SESSION['StartPage'])){
        $_SESSION['StartPage'] = clear_title(GetRandURL());
    }
    if (!isset($_SESSION['EndPage'])){
        $_SESSION['EndPage'] = clear_title(GetRandURL());
    }
    if(isset($_GET['article'])){
        $_SESSION['CurrentPage'] = $_GET['article'];
    }
    else {
        $_SESSION['CurrentPage'] = $_SESSION['StartPage'];
    }
    echo $_SESSION['CurrentPage'];
    echo $_SESSION['StartPage'];
    if (!isset($_SESSION['Pathway'])){
        $_SESSION['Pathway'] = array();
    }
    array_push($_SESSION['Pathway'],$_SESSION['CurrentPage']);
?>
    <div class="content item contentRight">
        <?php
        switch($_SESSION['GameState']){
            case 0:
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
