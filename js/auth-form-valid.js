'use strict';

const warningMessage = document.querySelector('.warning-message'),
    cookieData = document.cookie,
    passInput = document.querySelector('.pass-input'),
    passView = document.querySelector('.pass-view');

function delete_cookie(cookie_name)
{
    let cookie_date = new Date ();  // Текущая дата и время
    cookie_date.setTime (cookie_date.getTime() - 1);
    document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}

if (~cookieData.indexOf("auth")) {
    warningMessage.textContent = 'Неверный адрес электронной почты или пароль';
    delete_cookie('reg_data');
}

passInput.addEventListener('input', (event) => {
    let elem = event.target;
    if(elem.value.length > 0) {
        passView.classList.remove('hidden');
    }else {
        passView.classList.add('hidden');
    }
});

passView.addEventListener('click', (event) => {
    if(passInput.getAttribute('type') == 'password') {
        passInput.removeAttribute('type');
        passInput.setAttribute('type', 'text');
        passView.textContent = 'Скрыть';
    }
    else {
        passInput.removeAttribute('type');
        passInput.setAttribute('type', 'password');
        passView.textContent = 'Показать';
    }
});
