<?php
function SetSession(){
    if (!isset($_SESSION['GameState'])){
        $_SESSION['GameState'] = 0;
    }
    if ($_SESSION['GameState'] == 0){
        init_chrono();
    }
    if (!isset($_SESSION['StartPage']) || $_SESSION['GameState'] == 0){
        $_SESSION['StartPage'] = clear_title(GetRandURL());
    }
    if (!isset($_SESSION['EndPage']) || $_SESSION['GameState'] == 0){
        $_SESSION['EndPage'] = clear_title(GetRandURL());
    }
    if(isset($_GET['article']) && $_SESSION['GameState'] == 1){
        $_SESSION['CurrentPage'] = $_GET['article'];
        if($_GET['article'] == $_SESSION['EndPage']){
            $_SESSION['GameState'] = 2;
        }
    }
    else {
        $_SESSION['CurrentPage'] = $_SESSION['StartPage'];
    }
    if (!isset($_SESSION['Pathway']) || $_SESSION['GameState'] == 0){
        $_SESSION['Pathway'] = array();
    }
    array_push($_SESSION['Pathway'],$_SESSION['CurrentPage']);
}

function chrono (){
    if (!isset($_SESSION['starttime'])) {
        $_SESSION['starttime'] = new DateTime();
        $_SESSION['currtime'] = new DateTime() ;
        $_SESSION['delta'] = 0;
        $_SESSION['delta2'] = 0;
    }
    else {
        $_SESSION ['lasttime'] = $_SESSION['currtime'];
        $_SESSION['currtime']=new DateTime();
        $_SESSION['delta']= $_SESSION['starttime']-> diff (new DateTime());
        $_SESSION['delta2']= $_SESSION['lasttime']-> diff (new DateTime());
    }
    $time = array($_SESSION['delta']->h, $_SESSION['delta']->m, $_SESSION['delta']->s);
    return $time;
    $second = $_SESSION['delta']->s;
    $min = $_SESSION['delta']->i;
    $heure = $_SESSION['delta']->h;
    $_SESSION['temps'] = $heure*3600 + $min*60 + $second;

}

function display_chrono (){
    $time = chrono();
    $chrono = '';
    for ($i = 0; $i < 3; $i++){
        $chrono .= $time[$i];
        if ($i < 2){
            $chrono .= ':';
        }
    }
    echo $chrono;
}

function init_chrono(){
    $_SESSION ['starttime'] = new DateTime();
    $_SESSION['currtime'] = new DateTime() ;
    $_SESSION['delta'] = 0;
}
