<?php
    require 'db.php';

    if ($_GET['hash']) {
        $hash = $_GET['hash'];
        // Получаем id и подтверждено ли Email
        if($result = $db->query( "SELECT `email`, `pass`, `username`, `fullName` FROM `non-confirmed-users` WHERE `hash`='$hash'")) {
            $row = $result->fetch_assoc();

            $email = $row['email'];
            $pass = $row['pass'];
            $username = $row['username'];
            $fullName = $row['fullName'];

            $db->query("INSERT INTO `users` (`email`, `pass`, `username`, `fullName`) VALUES('$email', '$pass', '$username', '$fullName')");
            $db->query("DELETE FROM `non-confirmed-users` WHERE `email`='$email'");

            session_start();
            $_SESSION['username'] = $row['username'];

        }
    }


    header('Location: /');
    exit;
?>
