<?php
    if(isset($_COOKIE['user'])) {
        header('Location: /');
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Yusei+Magic&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/reg-form-valid.js" defer></script>
    <title>MyStagram</title>
</head>
    <body>
        <div class="container">
            <div class="valid-form col-md-4 offset-md-4 col-sm-10 offset-sm-1 col-12">
                <h1>Mystagram</h1>
                <form action="validation-form/check.php" method="post">
                    <div class="input-wrapper">
                        <input type="text" class="email-input form-control" name="email" id="email" placeholder="Эл. адрес">
                        <div class="valid hidden"><span>✓</span></div>
                        <div class="not-valid hidden"><span>x</span></div>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" class="fullName-input form-control" name="fullName" id="fullName" placeholder="Имя и фамилия">
                        <div class="valid hidden"><span>✓</span></div>
                        <div class="not-valid hidden"><span>x</span></div>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" class="username-input form-control" name="username" id="username" placeholder="Имя пользователя">
                        <div class="valid hidden"><span>✓</span></div>
                        <div class="not-valid hidden"><span>x</span></div>
                    </div>
                    <div class="input-wrapper">
                        <input type="password" class="pass-input form-control" maxlength="50" name="pass" id="pass" placeholder="Пароль">
                        <p class="pass-view hidden">Показать</p>
                    </div>

                    <button type="submit" class="btn btn-primary" disabled>Регистрация</button>
                </form>
                <p class="warning-message"></p>
            </div>
            <div class="reg-link col-md-4 offset-md-4 col-sm-10 offset-sm-1">
                <p>Есть аккаунт? <a href="index.php">Вход</a></p>
            </div>
        </div>
    </body>
</html>

