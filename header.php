<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
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

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Css/Main.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Css/Header.css?3">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Css/Footer.css?1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="header-block">
            <div class="logoHeader">
                <a href="<?php echo home_url(); ?>">
                    <?php the_custom_logo(); ?>
                    <h3>CoP</h3>
                </a>
            </div>
            <nav class="NavHeader">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main',
                    'container' => false,
                    'menu_class' => 'header-menu',
                ));
                ?>
            </nav>
            <!-- Кнопка открытия окна авторизации -->
            <button id="open-login-dialog"><h3>Войти</h3></button>
        </div>
    </header>
<?php 
?>
    <!-- Всплывающее окно -->
    <dialog id="login-dialog">
        <div class="dialog-content">
            <button id="close-login-dialog" class="close-dialog">×</button>
            <h2>Вход в профиль</h2>
            <form method="post">
                <div class="textbox-login">
                    <input type="text" name="username_or_phone" placeholder="Почта или телефон" required>
                    <input type="password" name="password" placeholder="Пароль" required>
                    <a href="#"><h3>Не помню пароль</h3></a>
                </div>
                <div class="logOrCreat">
                    <button type="submit"><h3>Войти</h3></button>
                    <a href="<?php echo get_permalink(get_page_by_path('registration')); ?>">
                        <button type="button"><h3>Создать профиль</h3></button>
                    </a>
                </div>
            </form>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Css/Login.css">
        </div>
    </dialog>
    <script src="<?php echo get_template_directory_uri(); ?>/script/login-dialog.js"></script>

    
