<?php get_header(); ?>
<main>
    <div class="SingleNews">
        <!-- Основной блок новости -->
        <div class="BlockNews">
            <h1><?php the_title(); ?></h1>

            <!-- Изображение новости -->
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('large ', ['alt' => get_the_title()]); ?>
            <?php endif; ?>

            <!-- Содержимое статьи -->
            <article>
                <?php the_content(); ?>
            </article>

            <!-- Метаданные новости -->
            <div class="news-meta">
                <?php wp_reset_postdata(); ?>
                <h3>
                    <b><?php echo the_date(); ?> Автор: <?php the_author(); ?> <time><?php the_time(); ?></time>
                        <h3>ID:<?php the_ID(); ?></h3>
                    </b>
                    <br>
                    <b>Пост изменён:<?php the_modified_date(); ?></b>
                    <h3>Статус поста: <?php echo get_post_status(get_the_ID()); ?></h3>
                    <h3>Время публикации: <?php echo get_post_time('H:i:s', true); ?></h3>

                </h3>

                <?php if (current_user_can('edit_posts')): ?>
                    <form method="post" action="">
                        <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
                        <button type="submit" name="set_review_status" class="status-submit-btn">Отправить на проверку</button>
                    </form>
                <?php endif; ?>

                <?php
                if (isset($_POST['set_review_status']) && isset($_POST['post_id']) && current_user_can('edit_posts')) {
                    wp_update_post(array(
                        'ID' => intval($_POST['post_id']),
                        'post_status' => 'review',
                    ));
                    echo '<p>Статус обновлён на "На проверке".</p>';
                }
                ?>


                <h3>
                    Категории:
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>, ';
                        }
                    }
                    ?>
                </h3>
                <h3>
                    Теги:
                    <?php
                    $tags = get_the_tags();
                    if (!empty($tags)) {
                        foreach ($tags as $tag) {
                            echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a>, ';
                        }
                    }
                    ?>
                </h3>
            </div>
            <?php edit_post_link('Изменить новость', '<p>', '</p>'); ?>
            <div class="permalink-news">
                <?php
                // Получение следующего и предыдущего поста в таксономии планет
                $next_post = get_next_post(); // Получение следующего поста в текущей таксономии
                $prev_post = get_previous_post(); // Получение предыдущего поста в текущей таксономии
                
                // Вывод ссылки на предыдущий пост, если он существует
                if (!empty($prev_post)): ?>
                    <a href="<?php echo the_permalink($prev_post->ID); ?>">Предыдущая новость</a>
                <?php endif;

                // Вывод ссылки на следующий пост, если он существует
                if (!empty($next_post)): ?>
                    <a href="<?php echo the_permalink($next_post->ID); ?>">Следующая новость</a>
                <?php endif; ?>
            </div>

        </div>

        <!-- Блок фильтров -->
        <div class="NewFilter">
            <h2>Категории</h2>
            <!-- Форма поиска -->
            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="text" name="s" placeholder="Поиск" value="<?php echo get_search_query(); ?>">
            </form>

            <!-- Список категорий с количеством постов -->
            <div class="TagsFilter">
                <?php
                $categories = get_categories();
                foreach ($categories as $category):
                    ?>
                    <div class="singleTagsFilter">
                        <h3><a
                                href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                        </h3>
                        <h3 class="eventTag"><?php echo $category->count; ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>