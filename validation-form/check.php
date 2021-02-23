<?php
    $email = mysqli_real_escape_string(filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING));
    $username = mysqli_real_escape_string(filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING));
    $fullName = mysqli_real_escape_string(filter_var(trim($_POST['fullName']), FILTER_SANITIZE_STRING));
    $pass = mysqli_real_escape_string(filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING));

    require_once '../db.php';

    $firstTable = $db->query("SELECT * FROM `non-confirmed-users` WHERE `email` = '$email'");
    $secondTable = $db->query("SELECT * FROM `users` WHERE `email` = '$email'");

    if($firstTable->num_rows !== 0) {
        setcookie('reg_data', 'email', time() + 180, "/");
        header('Location: /reg-form.php');
        exit();
    }
    if($secondTable->num_rows !== 0) {
        setcookie('reg_data', 'email', time() + 180, "/");
        header('Location: /reg-form.php');
        exit();
    }

    $firstTable = $db->query("SELECT * FROM `non-confirmed-users` WHERE `username` = '$username'");
    $secondTable = $db->query("SELECT * FROM `users` WHERE `username` = '$username'");
    if($firstTable->num_rows !== 0) {
        setcookie('reg_data', 'username', time() + 180, "/");
        header('Location: /reg-form.php');
        exit();
    }
    if($secondTable->num_rows !== 0) {
        setcookie('reg_data', 'username', time() + 180, "/");
        header('Location: /reg-form.php');
        exit();
    }

    $pass = md5($pass."cbycbryi6767");
    $hash = md5($email . time());

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "To: <$email>\r\n";
    $headers .= "From: <mail@example.com>\r\n";

    $message = '
                    <html>
                    <head>
                    <title>Подтвердите Email</title>
                    </head>
                    <body>
                    <p>Что бы подтвердить Email, перейдите по <a href="http://e-koval.ru/confirmed.php?hash=' . $hash . '">ссылке</a></p>
                    </body>
                    </html>
                    ';

    $db->query( "INSERT INTO `non-confirmed-users` (`username`, `fullName`, `email`, `pass`, `hash`) VALUES ('$username', '$fullName', '$email', '$pass', '$hash')");

    if (mail($email, "Подтвердите Email на сайте", $message, $headers)) {
        // Если да, то выводит сообщение
        header('Location: /message-sent.php');
        exit();
    }


