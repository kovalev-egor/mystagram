<script src="js/main.js" defer></script>

<div class="header">
    <img src="img/icons/settings.svg" alt="" class="settings">
    <div class="container">
        <div class="row desktop-header">
            <div class="col-4 offset-4 col-sm-2 offset-sm-1">
                <a class="logo" href="index.php">Mystagram</a>
            </div>
            <form method="get" action="index.php" class="col-sm-4 offset-sm-1 search-form">
                <input type="text" name="search_user" minlength="1" class="search" placeholder="Поиск">
                <button type="submit"></button>
            </form>
            <div class="col-sm-1 offset-sm-2 profile-link">
                <img src="<?php
                $uploadDir = 'users/' . $_SESSION['username'];
                if(!file_exists($uploadDir . '/avatar.jpg')) {
                    echo 'img/default-avatar.jpg';
                }else {
                    echo $uploadDir . '/avatar.jpg';
                }
                ?>" alt="">
            </div>
            <div class="user-menu hidden">
                <ul>
                    <li><a href="index.php">Профиль</a></li>
                    <li><a href="exit.php">Выход</a></li>
                    <li><a href="#" class="load-link">Загрузить фотографию</a></li>
                    <li><a href="#" class="delete">Удалить профиль</a></li>
                </ul>
            </div>

            <div class="delete-modal hidden">
                <h5>Вы действительно хотите удалить свой профиль?</h5>
                <button class="confirm-delete btn btn-danger">Удалить</button>
                <button class="close-delete btn btn-primary">Закрыть</button>
            </div>
        </div>
    </div>
</div>
