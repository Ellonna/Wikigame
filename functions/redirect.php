<?php
session_start();
require 'curl.php';
if(isset($_GET['RedirPage'])){
    if($_GET['RedirPage'] == "start"){
        $_SESSION['Pseudo'] = $_GET['Pseudo'];
        $_SESSION['ClickMax'] = $_GET['clickmax'];
        if($_SESSION['ClickMax'] != 0){
            $_SESSION['StartPage'] = clear_title(GetRandURL());
            $_SESSION['EndPage'] = nclicks($_SESSION['StartPage'], $_SESSION['ClickMax']);
        }
        $_SESSION['GameState'] = 1;
        header("Location: ../index.php");
    }
    else if($_GET['RedirPage'] == "refresh"){
        $_SESSION['GameState'] = 0;
        header("Location: ../index.php");
    }
}
