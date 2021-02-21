'use strict';

const emailInput = document.querySelector('.email-input'),
    fullNameInput = document.querySelector('.fullName-input'),
    usernameInput = document.querySelector('.username-input'),
    passInput = document.querySelector('.pass-input'),
    btn = document.querySelector('.btn'),
    warningMessage = document.querySelector('.warning-message'),
    form = document.querySelector('FORM'),
    passView = document.querySelector('.pass-view');

const cookieData = document.cookie;


let validCounter = [0, 0, 0];


function delete_cookie(cookie_name)
{
    let cookie_date = new Date ();  // Текущая дата и время
    cookie_date.setTime (cookie_date.getTime() - 1);
    document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}

if (~cookieData.indexOf("email")) {
    warningMessage.textContent = 'Такой адрес электронной почты уже используется';
    delete_cookie('reg_data');
}
if (~cookieData.indexOf("username")) {
    warningMessage.textContent = 'Такое имя пользователя уже используется';
    delete_cookie('reg_data');
}


emailInput.addEventListener('change', () => {
    let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(reg.test(emailInput.value) == false || emailInput.value.length >264) {
        emailInput.nextElementSibling.nextElementSibling.classList.remove('hidden');
        emailInput.nextElementSibling.classList.add('hidden');
        validCounter[0] = 0;
    }else {
        emailInput.nextElementSibling.nextElementSibling.classList.add('hidden');
        emailInput.nextElementSibling.classList.remove('hidden');
        validCounter[0] = 1;
    }
});

fullNameInput.addEventListener('change', (event) => {
    let elem = event.target;
    if(elem.value.length > 30) {
        elem.nextElementSibling.nextElementSibling.classList.remove('hidden');
        elem.nextElementSibling.classList.add('hidden');
        validCounter[1] = 0;
    }else {
        elem.nextElementSibling.nextElementSibling.classList.add('hidden');
        elem.nextElementSibling.classList.remove('hidden');
        validCounter[1] = 1;
    }
});

usernameInput.addEventListener('change', (event) => {
    let reg = /^([A-Za-z0-9_\-\.])/;
    let elem = event.target;
    if(elem.value.length < 1) {
        elem.nextElementSibling.nextElementSibling.classList.remove('hidden');
        elem.nextElementSibling.classList.add('hidden');
        validCounter[2] = 0;
    }else {
        if(reg.test(elem.value) == false) {
            elem.nextElementSibling.nextElementSibling.classList.remove('hidden');
            elem.nextElementSibling.classList.add('hidden');
            validCounter[2] = 2;
        }else {
            elem.nextElementSibling.nextElementSibling.classList.add('hidden');
            elem.nextElementSibling.classList.remove('hidden');
            validCounter[2] = 1;
        }
    }
});

passInput.addEventListener('input', (event) => {
    let elem = event.target;
    if(elem.value.length > 0) {
        passView.classList.remove('hidden');
    }else {
        passView.classList.add('hidden');
    }
    if(elem.value.length < 6) {
        btn.disabled = true;
    }else {
        btn.disabled = false;
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

btn.addEventListener('click', (event) => {

    event.preventDefault();
    if(validCounter[0] === 0) {
        warningMessage.textContent = 'Адрес электронной почты введён неправильно';
    }else {
        if(validCounter[1] === 0) {
            warningMessage.textContent = 'Введите имя и фамилию (не более 30 символов)';
        }else {
            if(validCounter[2] === 0) {
                warningMessage.textContent = 'Введите корректное имя пользователя';
            }if(validCounter[2] === 2) {
                warningMessage.textContent = 'Недопустимые символы в имени пользователя';
            }else {
                form.submit();
            }
        }
    }
})