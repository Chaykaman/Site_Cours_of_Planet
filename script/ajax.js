console.log('AJAX есть');
document.addEventListener('DOMContentLoaded', function () {
    const button = document.querySelector('.check-cours button');

    if (button) {
        button.addEventListener('click', function () {
            // Отправка AJAX-запроса
            fetch(cop_ajax_data.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'cop_ajax_action',
                    security: cop_ajax_data.ajax_nonce
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message);
                } else {
                    alert('Ошибка: ' + data.message);
                }
            })
            .catch(error => console.error('Ошибка:', error));
        });
    }
});


