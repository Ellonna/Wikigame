<?php

    libxml_use_internal_errors(true);
    libxml_clear_errors();
    if(!isset($_SESSION))
    {
        session_start();
    }

?>
<div class="menuLeft item contentLeft">
    <?php
        if($_SESSION['GameState'] == 1){
            require 'view/chrono.php';
        }
    ?>
</div>
