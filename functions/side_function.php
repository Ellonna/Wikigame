<?php
function chrono (){

    if (  !isset($_SESSION['starttime'])) {
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
