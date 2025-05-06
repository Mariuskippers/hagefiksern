<?php
/**
 * Hagefiksern fallback template
 *
 * @package Hagefiksern
 */

get_header();

if ( is_front_page() ) {
    include get_template_directory() . '/front-page.php';
} elseif ( is_home() ) {
    include get_template_directory() . '/home.php';
} elseif ( is_single() ) {
    include get_template_directory() . '/single.php';
} else {
    // Fallback: display front-page
    include get_template_directory() . '/front-page.php';
}

get_footer();