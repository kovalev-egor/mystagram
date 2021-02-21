<?php
    require 'db.php';

    session_start();

    $username = $_SESSION['username'];

    if(isset($_GET['photo'])) {
        unlink('users/' . $_SESSION['username'] . '/' . $_GET['photo'] . '.jpg');
    }else {
        $db->real_query("DELETE FROM `users` WHERE `username` = '$username'");
        $db->close();

        function removeDirectory($dir) {
            if ($objs = glob($dir."/*")) {
                foreach($objs as $obj) {
                    is_dir($obj) ? removeDirectory($obj) : unlink($obj);
                }
            }
            rmdir($dir);
        }

        if(is_dir('users/' . $_SESSION['username'])) {
            removeDirectory('users/' . $_SESSION['username']);
        }

        session_destroy();
    }





    header('Location: /');