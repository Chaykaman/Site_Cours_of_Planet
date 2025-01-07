document.addEventListener('DOMContentLoaded', () => {
    const loginDialog = document.getElementById('login-dialog');
    const openDialogButton = document.getElementById('open-login-dialog');
    const closeDialogButton = document.getElementById('close-login-dialog');

    openDialogButton.addEventListener('click', () => {
        loginDialog.showModal();
    });

    closeDialogButton.addEventListener('click', () => {
        loginDialog.close();
    });

    // Закрытие окна по клику вне формы
    loginDialog.addEventListener('click', (event) => {
        if (event.target === loginDialog) {
            loginDialog.close();
        }
    });
});
