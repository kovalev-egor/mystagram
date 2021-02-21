<?php
    include 'header.php';

    if(isset($_GET['search_user'])) {
        require 'search.php';
    }
?>
<div class="main container">
    <div class="profile-info row">
        <div class="col-md-3 offset-md-2">
            <button class="<?php
                if(isset($_GET['search_user'])) { echo 'user-avatar'; }
                else { echo 'main-avatar'; }
            ?>">
                <img src="<?php
                    if(isset($_GET['search_user'])) {
                        $uploadDir = 'users/' . $username;
                        if(!file_exists($uploadDir . '/avatar.jpg')) {
                            echo 'img/default-avatar.jpg';
                        }else {
                            echo $uploadDir . '/avatar.jpg';
                        }
                    }else {
                        $uploadDir = 'users/' . $_SESSION['username'];
                        if(!file_exists($uploadDir . '/avatar.jpg')) {
                            echo 'img/default-avatar.jpg';
                        }else {
                            echo $uploadDir . '/avatar.jpg';
                        }
                    }
                ?>" alt="">
            </button>
        </div>
        <div class="col-md-4">
            <p class="main-username"><?php
                if(isset($_GET['search_user'])) {
                    echo $username;
                }else {
                    echo $_SESSION['username'];
                }

                ?></p>
        </div>
    </div>
    <div class="row photos">
        <?php
            if($_GET['search_user']) {
                $uploadDir = 'users/' . $username;
                if(!is_dir('users/' . $username)) {
                    echo 'У пользователя ещё нет фотографий';
                }else {
                    if (file_exists($uploadDir . '/avatar.jpg')) {
                        $filesNum = count(scandir('users/' . $username)) - 1;
                    } else {
                        $filesNum = count(scandir('users/' . $username));
                    }

                    if ($filesNum < 3) {
                        echo 'У пользователя ещё нет фотографий';
                    } else {
                        for ($i = $filesNum - 2; $i > 0; $i --) {
                            echo '
                                <div class="col-md-4 col-6 photo-item">
                                <img src="' . $uploadDir . '/' . $i . '.jpg" alt=""></div>
                            ' . "\n";
                        }
                    }
                }
            }else {
                $uploadDir = 'users/' . $_SESSION['username'];
                if(!is_dir('users/' . $_SESSION['username'])) {
                    echo '
                    <p>У вас ещё нет фотографий <a href="#" class="load-link btn btn-info">Загрузить</a></p>
                ';
                }else {
                    if(file_exists($uploadDir . '/avatar.jpg')) {
                        $filesNum = count(scandir('users/' . $_SESSION['username'])) - 1;
                    }else {
                        $filesNum = count(scandir('users/' . $_SESSION['username']));
                    }

                    if($filesNum < 3) {
                        echo '
                        <p>У вас ещё нет фотографий <a href="#" class="load-link btn btn-info">Загрузить</a></p>
                    ';
                    }else {
                        for($i = $filesNum - 2; $i > 0; $i --) {
                            echo '
                            <div class="col-md-4 col-6 photo-item">
                                <div class="delete-photo hidden">
                                    <a href="delete.php?photo=' . $i . '" class="btn btn-light">Удалить</a>
                                </div>
                                <img src="' . $uploadDir . '/' . $i . '.jpg" alt="">
                            </div>
                        ' . "\n";
                        }
                    }
                }
            }

        ?>

    </div>
</div>

<div class="load-item hidden">
    <form method="post" enctype="multipart/form-data" class="load-form">
        <input type="file" name="filename" class="select_file"><br>
        <button name="go" class="load-btn btn btn-success">Загрузить</button>
        <p class="warning-message"></p>
    </form>
</div>

<?php
    include 'footer.php';
?>
