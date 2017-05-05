<?php
if(!isset($_SESSION)){
    session_start();
}
require 'functions/curl.php';
require 'functions/side_function.php';
SetSession();
require 'view/head.php';
require 'view/sidebar_left.php';
if($_SESSION['CurrentPage'] == $_SESSION['EndPage']){
    $_SESSION['GameState'] = 2;
}
?>
</div>
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
            chrono();
            echo '<h2>Victory !</h2><p>It took you '.$_SESSION['temps'].' seconds.</br>';
            echo '<p>You clicked '.count($_SESSION['Pathway']).' links.</p>';
            echo '<form action = "functions/redirect.php" method="get"><input type = "hidden" value = "refresh" name = "RedirPage"><input type = "submit" value = "Restart"></form>';
            break;
        default :
            echo 'ERROR, wrong value of GameState';
            echo 'GameState = '.$_SESSION['GameState'];
    }
    ?>
</div>

<?php require 'view/footer.php'?>
