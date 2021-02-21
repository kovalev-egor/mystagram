<?php
    require '../db.php';

    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    $pass = md5($pass."cbycbryi6767");


    $result = $db->query("SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$pass'");

    if($result->num_rows == 0) {
        setcookie('reg_data', 'auth', time() + 180, "/");
        header('Location: /index.php');
        exit();
    }
    $user = $result->fetch_assoc();

    session_start();
    $_SESSION['username'] = $user['username'];


    $db->close();

    header('Location: /');
    exit();
?>