<?php
/* Template Name: Login */
ob_start(); // Включаем буферизацию вывода
get_header(); 

// Статичный логин/телефон и хэш пароля
$valid_username = 'twqt@mail.ru';
$valid_phone = '88005553535';
$hashed_password = wp_hash_password('123456');

// Обработка данных при отправке формы
$error_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Обработка ввода для защиты
    $username_or_phone = isset($_POST['username_or_phone']) ? wp_kses_post(trim($_POST['username_or_phone'])) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Проверяем логин/телефон и пароль
    if (
        ($username_or_phone === $valid_username || $username_or_phone === $valid_phone) &&
        wp_check_password($password, $hashed_password)
    ) {
        // Редирект на профиль после успешного входа
        wp_redirect(get_permalink(get_page_by_path('profile')));
        exit;
    } else {
        $error_message = 'Неверный логин, телефон или пароль.';
    }
}
?>

<main>
    <div class="loginPreview">
        <h2>Вход в профиль</h2>
        <?php if ($error_message): ?>
            <div class="error-message">
                <p><?php echo esc_html($error_message); ?></p>
            </div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="textbox-login">
                <input type="text" name="username_or_phone" placeholder="Почта или телефон" required>
                <input type="password" name="password" placeholder="Пароль" required>
                <a href = "#"><h3>Не помню пароль</h3></a>
            </div>
            <div class="logOrCreat">
                <button type="submit"><h3>Войти</h3></button>
                <a href="<?php echo get_permalink(get_page_by_path('registration')); ?>">
                    <button type="button"><h3>Создать профиль</h3></button>
                </a>
            </div>
        </form>
    </div>
</main>
<?php 
get_footer(); 
ob_end_flush(); // Закрываем буферизацию вывода
?>
