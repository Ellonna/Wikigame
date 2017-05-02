<?php
<<<<<<< HEAD
    require 'curl.php';
=======
    session_start();
    require 'functions/curl.php';
>>>>>>> origin/master
?>
<?php
    require 'view/head.php';
    require 'view/sidebar_left.php';
?>
    <div class="content item contentRight">
        <?php require 'view/article.php'?>
    </div>

<?php require 'view/footer.php'?>
