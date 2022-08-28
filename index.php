<?php
$pdo = require 'db_connect.php'; // забираем объект подключения к бд в переменную
require 'functions.php';
require 'header.php';
?>
    <div class="container">
<?php
require 'navigation.php';

?>
    <div class="container-menu">
        <?php
        require 'left-side-menu.php';
        require 'feed-menu.php';
        require 'rigth-side-menu.php';
        ?>
    </div>
</div>
<?php
require 'modal.php';
require 'footer.php';
?>



