<?php
/* Template Name: Profile */
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
                <div class="Search-Cours">
                    <h3>Поиск:</h3> <input type="text">
                </div>
                <!--Здесь добавить таблицу
                <img class = "colovrat" src="Img/Profile/pngwing.com.png">-->
                <table>
                    <thead>
                        <tr>
                            <th aria-label="Курс">Курс</th>
                            <th aria-label="Статус">Статус</th>
                            <th aria-label="Статус">Прогресс</th>
                            <th aria-label="Конец">Конец</th>
                            <th aria-label="Действие">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="singlecour.html">Малые тела</a></td>
                            <td>Не подписан</td>
                            <td><progress value="0" max="30"></progress></td>
                            <td>-</td>
                            <td class = "Button-table">
                                <a href="singlecour.html"><button><img src="<?php echo get_template_directory_uri(); ?>/Img/Profile/case-study.png"></button></a>
                                <button><img src = "<?php echo get_template_directory_uri(); ?>/Img/Profile/close.png"></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="singlecour.html">Космо гороскоп</a></td>
                            <td>Подписан</td>
                            <td><progress value="20" max="30"></td>
                            <td>-</td>
                            <td class = "Button-table">
                                <a href="singlecour.html"><button><img src="<?php echo get_template_directory_uri(); ?>/Img/Profile/case-study.png"></button></a>
                                <button><img src = "<?php echo get_template_directory_uri(); ?>/Img/Profile/close.png"></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="singlecour.html">Миссии на Марс</a></td>
                            <td>Не подписан</td>
                            <td><progress value="0" max="30"></progress></td>
                            <td>-</td>
                            <td class = "Button-table">
                                <a href="singlecour.html"><button><img src="<?php echo get_template_directory_uri(); ?>/Img/Profile/case-study.png"></button></a>
                                <button><img src = "<?php echo get_template_directory_uri(); ?>/Img/Profile/close.png"></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="singlecour.html">Физика звёзд</a></td>
                            <td>Не подписан</td>
                            <td><progress value="0" max="30"></progress></td>
                            <td>-</td>
                            <td class = "Button-table">
                                <a href="singlecour.html"><button><img src="<?php echo get_template_directory_uri(); ?>/Img/Profile/case-study.png"></button></a>
                                <button><img src = "<?php echo get_template_directory_uri(); ?>/Img/Profile/close.png"></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="singlecour.html">Тайны Вселенной</a></td>
                            <td>Не подписан</td>
                            <td><progress value="0" max="30"></progress></td>
                            <td>-</td>
                            <td class = "Button-table">
                                <a href="singlecour.html"><button><img src="<?php echo get_template_directory_uri(); ?>/Img/Profile/case-study.png"></button></a>
                                <button><img src = "<?php echo get_template_directory_uri(); ?>/Img/Profile/close.png"></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="singlecour.html">Космо гороскоп</a></td>
                            <td>Не подписан</td>
                            <td><progress value="0" max="30"></progress></td>
                            <td>-</td>
                            <td class = "Button-table">
                                <a href="singlecour.html"><button><img src="<?php echo get_template_directory_uri(); ?>/Img/Profile/case-study.png"></button></a>
                                <button><img src = "<?php echo get_template_directory_uri(); ?>/Img/Profile/close.png"></button>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="singlecour.html">Космоc - начало</a></td>
                            <td>Не подписан</td>
                            <td><progress value="0" max="30"></progress></td>
                            <td>-</td>
                            <td class = "Button-table">
                                <a href="singlecour.html"><button><img src="<?php echo get_template_directory_uri(); ?>/Img/Profile/case-study.png"></button></a>
                                <button><img src = "<?php echo get_template_directory_uri(); ?>/Img/Profile/close.png"></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
