<?php
/* Template Name: News */
get_header(); ?>
<main>
    <div class="News">
        <h1>Новости</h1>
        <div class="Newsblock">
            <div class="PreviewNews">
                <?php
                // Параметры WP_Query для вывода постов
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 9, // Количество новостей на страницу
                    'paged' => $paged,
                    'category_name' => '' // Категория новостей
                );
                $query = new WP_Query($args);

                // Проверяем, есть ли посты
                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post(); ?>
                        <div class="SingleNews">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                                <?php else: ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <h2><?php the_title(); ?></h2>
                                <div class="news-meta">
                                    <span class="news-date"><?php echo get_the_date(); ?></span>
                                    <span class="news-author">Автор: <?php the_author(); ?></span>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>

                    <!-- Пагинация -->
                    <div class="PagesNews">
                        <?php
                        echo paginate_links(array(
                            'total' => $query->max_num_pages,
                            'current' => $paged,
                            'prev_text' => __('Предыдущая'),
                            'next_text' => __('Следующая'),
                        ));
                        ?>
                    </div>

                <?php else: ?>
                    <p>Новостей пока нет.</p>
                <?php endif;

                // Сбрасываем посты
                wp_reset_postdata();
                ?>
            </div>
            <aside>
                <!-- Блок фильтров -->
                <div class="NewFilter">
                    <h2>Категории</h2>
                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="text" list="search-news" name="" placeholder="Поиск"
                            value="<?php echo get_search_query(); ?>">
                        <datalist id="search-news">
                            <option value="Без рубрики"></option>
                            <option value="Астрономия"></option>
                            <option value="Жизнь"></option>
                            <option value="Звёзды"></option>
                            <option value="Космический корабль"></option>
                            <option value="Планета"></option>
                            <option value="Технологии"></option>
                        </datalist>
                    </form>
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
            </aside>
        </div>
    </div>
</main>
<?php get_footer(); ?>