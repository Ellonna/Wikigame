<?php
if(!isset($_SESSION))
    {
        session_start();
    }

?>
<div class="menuLeft item contentLeft">

    <?php

    echo "</br>";
    echo "<div id='targets'>".$_SESSION['StartPage']." > ".$_SESSION['EndPage']."</div>";
    if($_SESSION['GameState'] == 1){
        require 'view/chrono.php';
    }
    $pathway = '<div id = pathway>';
//    for($i = 0; $i < count($_SESSION['Pathway']); $i++){
//        $pathway .= $_SESSION['Pathway'][$i];
//        if($i != count($_SESSION['Pathway'])-1){
//            $pathway .= ' > ';
//        }
//    }
//    $pathway .= "</p>";
//    echo $pathway;
    ?>
</div>
