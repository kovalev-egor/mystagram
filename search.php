<?php
    require 'db.php';

    $username = filter_var(trim($_GET['search_user']), FILTER_SANITIZE_STRING);

    $result = $db->query("SELECT * FROM `users` WHERE `username` = '$username'");

    if($result->num_rows == 0) {
        echo '<h2 style="margin-top: 150px; text-align: center;">Такой пользователь не найден</h2>';
        require 'footer.php';
        exit();
    }


