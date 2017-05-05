<?php
if(!isset($_SESSION))
    {
        session_start();
    }

?>
<div class="menuLeft item contentLeft">

    <?php

    echo "</br>";
    echo "<div id='targets'>".$_SESSION['StartPage']." > ".$_SESSION['EndPage']." </div>";
    if($_SESSION['GameState'] == 1){
        require 'view/chrono.php';
    }
    $pathway = '<div id = pathway>';
    ?>
</div>
