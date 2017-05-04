
<?php
    if (  !isset($_SESSION['starttime'])) {
        $_SESSION['starttime'] = new DateTime();
        $_SESSION['currtime'] = new DateTime() ;
        $_SESSION['delta'] = 0;
        $_SESSION['delta2'] = 0;
    }
        $_SESSION ['lasttime'] = $_SESSION['currtime'];
        $_SESSION['currtime']=new DateTime();
        $_SESSION['delta']= $_SESSION['starttime']-> diff (new DateTime());
        $_SESSION['delta2']= $_SESSION['lasttime']-> diff (new DateTime());
    $second = $_SESSION['delta']->s;
    $min = $_SESSION['delta']->m;
    $heure = $_SESSION['delta']->h;
    $_SESSION['temps'] = $heure*3600 + $min*60 + $second;

    $time = $_SESSION['temps'];
    $second = $time%60;
    $min = ($time-($time%60))/60;
?>
    <div id='min'><?php         echo($min); ?></div><div id='m'>, m </div>
    <div id='sec'><?php         echo($second) ?></div><div id='s'>, s </div>
    <div id='mili'><?php         echo("000") ?></div><div id='mil'>, mil </div>
<script type="text/javascript">

var time='<?php echo $time; ?>';
var m = " . m . ";
var s = " . s . ";
var mil = " . mili  ";
var mili = "0";

setInterval(function(){
    mili++;
    if(mili >= 100){
        time++;
       mili = mili%100;
    }
var sec = time%60;
var min = (time - time%60)/60;

    document.getElementById("min").innerHTML = min;     document.getElementById("m").innerHTML = m;
    document.getElementById("sec").innerHTML = sec;     document.getElementById("s").innerHTML = s;
    document.getElementById("mili").innerHTML = mili;     document.getElementById("mil").innerHTML = mil;

},10)
</script>

