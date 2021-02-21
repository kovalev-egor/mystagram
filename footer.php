<div class="footer">
    <div class="container mobile-footer">
        <div class="row">
            <div class="col-3">
                <div class="mobile-search"><img src="img/icons/search.svg" alt=""></div>
            </div>
            <div class="col-3 offset-1">
                <div class="add-post load-link"><span>+</span></div>
            </div>
            <div class="col-1 offset-4">
                <div class="profile-link">
                    <img src="<?php
                    $uploadDir = 'users/' . $_SESSION['username'];
                    if(!file_exists($uploadDir . '/avatar.jpg')) {
                        echo 'img/default-avatar.jpg';
                    }else {
                        echo $uploadDir . '/avatar.jpg';
                    }
                    ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="desktop-footer">
        <p>Directed by Egor Kovalev</p>
    </div>
</div>