<?php session_start(); ?>
<div class="menuLeft item contentLeft">
    <?php
        if($_SESSION['GameState'] == 1){
            require 'view/chrono.php';
        }
    ?>
</div>
