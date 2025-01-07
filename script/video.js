// Получаем элементы
const videoButton = document.getElementById('videoButton');
const videoModal = document.getElementById('videoModal');
const closeModal = document.querySelector('.close');

// Открытие модального окна
videoButton.addEventListener('click', () => {
    videoModal.style.display = 'flex';
});

// Закрытие модального окна
closeModal.addEventListener('click', () => {
    videoModal.style.display = 'none';
});

// Закрытие при клике вне модального окна
window.addEventListener('click', (e) => {
    if (e.target === videoModal) {
        videoModal.style.display = 'none';
    }
});
