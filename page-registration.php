<?php
/* Template Name: Registration */
get_header();

$nonce = wp_create_nonce('registration_form');
?>

<main>
    <div class="previewRegistr">
        <h2 class="title-text">Начни проходить курсы прямо сейчас</h2>
        <form id="registration-form" method="POST">
            <div class="Registr">
                <input type="text" name="full_name" placeholder="Имя и фамилия" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Пароль"
                    value="<?php echo esc_attr(wp_generate_password(12, true)); ?>" required>
                <div class="TelefoneLogin">
                    <select name="country_code" required>
                        <option value="+7">+7</option>
                        <option value="+380">+380</option>
                        <option value="+381">+381</option>
                        <option value="+20">+20</option>
                    </select>
                    <input type="text" name="phone" placeholder="800-555-35-35" required>
                </div>
                <?php wp_nonce_field('registration_form', 'registration_nonce'); ?>
                <button type="submit" name="register_submit">
                    <h3>Зарегистрироваться</h3>
                </button>
            </div>
        </form>

    </div>
</main>

<?php get_footer(); ?>