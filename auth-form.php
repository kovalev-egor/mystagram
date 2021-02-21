<script src="js/auth-form-valid.js" defer></script>

<div class="container">
    <div class="valid-form col-md-4 offset-md-4">
        <h1>Mystagram</h1>
        <form action="validation-form/auth.php" method="post">
            <div class="input-wrapper">
                <input type="text" class="form-control" name="email" id="email" placeholder="Введите e-mail">
            </div>
            <div class="input-wrapper">
                <input type="password" class="pass-input form-control" name="pass" id="pass" placeholder="Введите пароль">
                <p class="pass-view hidden">Показать</p>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
        <p class="warning-message"></p>
    </div>
    <div class="reg-link col-md-4 offset-md-4">
        <p>У вас ещё нет аккаунта? <a href="reg-form.php">Зарегистрироваться</a></p>
    </div>
</div>

