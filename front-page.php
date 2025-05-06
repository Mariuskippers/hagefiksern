<?php
/**
 * The front page template file
 *
 * @package Hagefiksern
 */

get_header();
?>

<main id="primary" class="site-main front-page">

    <?php get_template_part('template-parts/section', 'hero'); ?>
    
    <?php get_template_part('template-parts/section', 'about'); ?>
    
    <?php get_template_part('template-parts/section', 'services'); ?>
    
    <?php get_template_part('template-parts/section', 'contact'); ?>

</main><!-- #primary -->

<?php
get_footer();