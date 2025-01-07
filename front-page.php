<?php get_header(); 
$generated_password = wp_generate_password(12, true);?>
<main>
    <div class="titleHome">
        <div class="previewCours">
            <h1>Онлайн-платформа по получению знаний о космосе</h1>
            <div class="cosmic-container">
                <div class="star star-1"></div>
                <div class="star star-2"></div>
                <div class="star star-3"></div>
                <div class="star star-4"></div>
                <div class="star star-5"></div>
                <div class="planet"><a href="about.html"></a></div>
            </div>
            <div class="canvas-container">
                <canvas id="planetCanvas"></canvas>
            </div>
        </div>
        <div class="previewRegistr">
            <h2 class="title-text">Начни проходить курсы прямо сейчас</h2>
            <div class="Registr">
                <input type="text" placeholder="Имя и фамилия">
                <input type="text" placeholder="Email">
                <input type="text" id="passwordField" placeholder="Пароль" value="<?php echo esc_attr($generated_password); ?>">
                <div class="TelefoneLogin">
                    <select>
                        <option>+7</option>
                        <option>+380</option>
                        <option>+381</option>
                        <option>+20</option>
                    </select>
                    <input type="text" placeholder="800-555-35-35">

                </div>
                <a>
                    <h3>Зарегистрироваться</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="CoursHome">
        <h1>Новые курсы</h1>
        <div class="NewCours">
            <?php
            // Запрос для получения новых курсов
            $cours_query = new WP_Query([
                'post_type' => 'cours', // Тип поста "Курсы"
                'posts_per_page' => 5, // Количество курсов
                'orderby' => 'date', // Сортировка по дате
                'order' => 'DESC', // Сначала новые
            ]);

            if ($cours_query->have_posts()):
                while ($cours_query->have_posts()):
                    $cours_query->the_post(); ?>
                    <div class="SiglnePreviewCours">
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/default.png" alt="Default Course Image">
                        <?php endif; ?>
                        <div class="titleSingleCours">
                            <h2><?php the_title(); ?></h2>
                            <h3>
                                <?php
                                // Получаем содержимое и обрезаем до 10 слов
                                $content = get_the_content();
                                echo wp_trim_words($content, 15, '...');
                                ?>
                            </h3>
                        </div>
                        <a href="<?php the_permalink(); ?>">Подробнее</a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p>Курсы пока не добавлены.</p>
            <?php endif; ?>
        </div>


    </div>

    <div class="NewsHome">
        <h1>Последние новости</h1>
        <div class="LastNews">
            <?php
            // Запрос для получения последних новостей
            $news_query = new WP_Query([
                'post_type' => 'post', // Тип постов (новости)
                'posts_per_page' => 3, // Количество постов
            ]);

            if ($news_query->have_posts()):
                while ($news_query->have_posts()):
                    $news_query->the_post(); ?>
                    <div class="SingelNew">
                        <div class="NewsTag">
                            <?php
                            // Выводим первую категорию
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                echo '<h3>' . esc_html($categories[0]->name) . '</h3>';
                            }
                            ?>
                        </div>
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium', ['alt' => get_the_title()]);
                            } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/Img/News/default.jpg" alt="Default Image">
                            <?php } ?>
                        </a>
                        <div class="NameAndAvtor">
                            <h3><b><?php the_title(); ?></b></h3>
                            <h3><?php the_author(); ?></h3>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p>Новостей пока нет.</p>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>

