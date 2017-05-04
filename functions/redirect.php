<?php
session_start();
if(isset($_GET['RedirPage'])){
    if($_GET['RedirPage'] == "start"){
        $_SESSION['GameState'] = 1;
        header("Location: ../index.php");
    }
}
