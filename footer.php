<footer>
    <div class="footer-block">
        <div class="logoFooter">
            <a href="<?php echo home_url(); ?>">
                <?php the_custom_logo(); ?>
                <h3>CoP</h3>
            </a>
        </div>
        <nav class="NavFooter">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main_footer',
                'container' => false,
                'menu_class' => 'footer-menu',
            ));
            ?>
        </nav>
        <?php if (is_active_sidebar('footer_social_media')): ?>
            <div class="widget-area">
                <?php dynamic_sidebar('footer_social_media'); ?>
            </div>
        <?php endif; ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>