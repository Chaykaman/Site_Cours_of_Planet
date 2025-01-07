<?php
/* Template Name: Cours */
get_header(); ?>
<main>
    <div class="Cours">
        <h1>Курсы</h1>
        <div class="CoursBlock">
            <div class="CoursFilter">
                <h2>Каталог курсов</h2>
                <input type="text" placeholder="Поиск">
                <?php
                // Вывод таксономий
                $terms = get_terms(array('taxonomy' => 'course_direction', 'hide_empty' => false));
                if (!empty($terms)) {
                    echo '<div class="Direction"><h3><b>Направление:</b></h3>';
                    foreach ($terms as $term) {
                        echo '<div class="SingleDirection">';
                        echo '<input type="checkbox" id="' . esc_attr($term->slug) . '">';
                        echo '<h3>' . esc_html($term->name) . '</h3>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
                
                $levels = get_terms(array('taxonomy' => 'course_level', 'hide_empty' => false));
                if (!empty($levels)) {
                    echo '<div class="Levels"><h3><b>Уровень сложности:</b></h3>';
                    foreach ($levels as $level) {
                        echo '<div class="SingleLvl">';
                        echo '<input type="checkbox" id="' . esc_attr($level->slug) . '">';
                        echo '<h3>' . esc_html($level->name) . '</h3>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
            <div class="Cours">
                <div class="CoursPreview">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Определяем текущую страницу
                    $args = array(
                        'post_type' => 'cours',
                        'posts_per_page' => 6,
                        'paged' => $paged, // Передаем текущую страницу
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post(); ?>
                            <div class="SingleCours">
                                <div class="titleSingleCours">
                                    <h3><?php the_excerpt(); ?></h3>
                                    <h2><?php the_title(); ?></h2>
                                    <a href="<?php the_permalink(); ?>">Подробнее</a>
                                </div>
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/Img/Cours/default.png">
                                <?php endif; ?>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else: ?>
                        <p>Курсы не найдены.</p>
                    <?php endif; ?>
                </div>
                <div class="PagesNews">
                    <?php
                    $big = 999999999; // Уникальное число для замены
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, $paged),
                        'total' => $query->max_num_pages,
                        'prev_text' => __('Предыдущая'),
                        'next_text' => __('Следующая'),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
