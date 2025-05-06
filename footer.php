<?php
/**
 * The template for displaying the footer
 *
 * @package Hagefiksern
 */
?>

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-widgets-container">
                <?php if (is_active_sidebar('footer-widgets')) : ?>
                    <div class="footer-widgets">
                        <?php dynamic_sidebar('footer-widgets'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="site-info">
                <div class="footer-menu-container">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'menu_class'     => 'footer-menu',
                        'depth'          => 1,
                    ));
                    ?>
                </div>
                
                <div class="copyright">
                    <p>
                        &copy; <?php echo date('Y'); ?> 
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                        - <?php esc_html_e('All Rights Reserved', 'hagefiksern'); ?>
                    </p>
                </div>
            </div><!-- .site-info -->
        </div><!-- .container -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>