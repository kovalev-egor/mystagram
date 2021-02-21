'use strict';

const profileLinks = document.querySelectorAll('.profile-link'),
    userMenu = document.querySelector('.user-menu'),
    loadLinks = document.querySelectorAll('.load-link'),
    loadItem = document.querySelector('.load-item'),
    loadForm = document.querySelector('.load-form'),
    selectAvatar = document.querySelector('.main-avatar'),
    loadBtn = document.querySelector('.load-btn'),
    selectFile = document.querySelector('.select_file'),
    warningMessage = document.querySelector('.warning-message'),
    deleteProfile = document.querySelector('.delete'),
    closeDelete = document.querySelector('.close-delete'),
    confirmDelete = document.querySelector('.confirm-delete'),
    deleteModal = document.querySelector('.delete-modal'),
    settingsBtn = document.querySelector('.settings'),
    mobileSearch = document.querySelector('.mobile-search'),
    searchForm = document.querySelector('.search-form'),
    mainContent = document.querySelector('.main');



for (let profileLink of profileLinks) {
    profileLink.addEventListener('click', () => {
        if(document.documentElement.clientWidth > 576) {
            if(userMenu.classList.contains('hidden')) {
                userMenu.classList.remove('hidden');
            }else {
                userMenu.classList.add('hidden');
            }
        }else {
            document.location.href = "index.php";
        }
    });
}

(function () {
    const photoItems = document.querySelectorAll('.photo-item')
    for (let photoItem of photoItems) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            photoItem.addEventListener('click', () => {
                if(photoItem.firstChild.nextElementSibling.classList.contains('hidden')) {
                    photoItem.firstChild.nextElementSibling.classList.remove('hidden');
                } else {
                    photoItem.firstChild.nextElementSibling.classList.add('hidden');
                }
            });
        } else {
            photoItem.addEventListener('mouseenter', () => {
                photoItem.firstChild.nextElementSibling.classList.remove('hidden');
            });
            photoItem.addEventListener('mouseleave', () => {
                photoItem.firstChild.nextElementSibling.classList.add('hidden');
            });
        }

    }
}());




selectAvatar.addEventListener('click', () => {
    loadForm.setAttribute('action', 'load-avatar.php')
    loadItem.classList.remove('hidden');
    loadBtn.disabled = true;
    warningMessage.textContent = 'Выберите изображение формата jpg';
    loadItem.addEventListener('click', (event) => {
        let target = event.target;
        if(target.classList.contains('load-item')) {
            loadItem.classList.add('hidden');
        }
    });
});

for (let loadLink of loadLinks) {
    loadLink.addEventListener('click', (event) => {
        event.preventDefault();
        loadForm.setAttribute('action', 'load.php')
        loadItem.classList.remove('hidden');
        loadBtn.disabled = true;
        warningMessage.textContent = 'Выберите изображение формата jpg';
        loadItem.addEventListener('click', (event) => {
            let target = event.target;
            if(target.classList.contains('load-item')) {
                loadItem.classList.add('hidden');
            }
        });
    });
}

selectFile.addEventListener('change', () => {
    if(selectFile.value.match(/.jpg$/i)) {
        loadBtn.disabled = false;
        warningMessage.textContent = '';
    }else {
        loadBtn.disabled = true;
        warningMessage.textContent = 'Выберите изображение формата jpg';
    }
});

deleteProfile.addEventListener('click', () => {
    deleteModal.classList.remove('hidden');
    closeDelete.addEventListener('click', () => {
        deleteModal.classList.add('hidden');
    });
    confirmDelete.addEventListener('click', () => {
        document.location.href = "delete.php";
    });
});

settingsBtn.addEventListener('click', () => {
    if(userMenu.classList.contains('hidden')) {
        userMenu.classList.remove('hidden');
        settingsBtn.src = "img/icons/close.svg";
    }else {
        userMenu.classList.add('hidden');
        settingsBtn.src = "img/icons/settings.svg";
    }
});

mobileSearch.addEventListener('click', () => {
    if(searchForm.style.display == 'none') {
        searchForm.style.display = 'block';
        mobileSearch.firstChild.src = "img/icons/close.svg";
        mainContent.classList.add('hidden');
    }else {
        searchForm.style.display = 'none';
        mobileSearch.firstChild.src = "img/icons/search.svg";
        mainContent.classList.remove('hidden');
    }
});



