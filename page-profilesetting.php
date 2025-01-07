<?php
/* Template Name: Profilesetting */
get_header(); 
?>
    <main>
        <div class="profileMain">
            <div class="BarPorfile">
                <div class="FotoAndNick">
                    <img src="<?php echo get_template_directory_uri(); ?>/Img/Profile/Profile.png">
                    <h3>НикПрофиля</h3>
                </div>
                <nav>
                    <ul>
                        <li><a href="<?php echo get_permalink(get_page_by_path('profile')); ?>">
                                <h3>Мои курсы</h3>
                            </a></li>
                        <li><a href="<?php echo get_permalink(get_page_by_path('profilesetting')); ?>">
                                <h3>Настройки</h3>
                            </a></li>
                        <li></li>
                    </ul>
                </nav>
            </div>
            <div class="ContentProfile">
                <div class = "settings-profile">
                <h2><b>Профиль</b></h2>
                <div class="ChangeFoto">
                    <img src="<?php echo get_template_directory_uri(); ?>/Img/Profile/Profile.png">
                 </div>
                 <input type = "text" placeholder="Ваш существующий ник">
                 <input type = "date" placeholder="Дата рождения">
                 <input type = "text" placeholder="Ваш пароль">
                 <button>Сохранить <img class = "saveicon" src="<?php echo get_template_directory_uri(); ?>/Img/Profile/save.png"></button>
                </div>
            </div>
    </main>
<?php get_footer(); ?>
