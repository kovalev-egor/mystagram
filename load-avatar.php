<?php

session_start();

if(!is_dir('users/' . $_SESSION['username'])) {
    mkdir('users/' . $_SESSION['username'], 0755);
}

$uploadDir = '/users/' . $_SESSION['username'];

if(file_exists($uploadDir . 'avatar.jpg')) {
    unlink($uploadDir . 'avatar.jpg');
}

if(isset($_POST['go'])){
    $err = array();#Массив с ошибками
    #Проверки
    if(!is_uploaded_file($_FILES["filename"]["tmp_name"])){
        $err[] = "Ошибка загрузки файла";
    }
    if($_FILES["filename"]['error']!= 0){
        $err[] =

            "Ошибка загрузки файла";
    };
    if($_FILES["filename"]['size'] > 10485760){
        $err[] = "Файл слишком большой";
    };

    if(count($err) == 0){
        //Если файл загружен успешно, то перемещаем в конечную директорию
        move_uploaded_file($_FILES["filename"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $uploadDir . '/avatar.jpg');
    } else{
        #Вывод ошибок проверок
        foreach($err AS $error){
            print $error."<br>";
        }
    }
}

header('Location: /');
exit();

?>