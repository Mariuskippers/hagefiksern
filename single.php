<?php
/**
 * The template for displaying all single posts
 *
 * @package Hagefiksern
 */

get_header();
?>

<div class="container">
    <div class="row">
        <main id="primary" class="site-main col-md-8">

            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                        <div class="entry-meta">
                            <time class="post-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                <?php echo esc_html(get_the_date()); ?>
                            </time>
                            <span class="post-author">
                                <?php echo esc_html__('by', 'hagefiksern'); ?> <?php the_author(); ?>
                            </span>
                            <?php
                            $categories_list = get_the_category_list(esc_html__(', ', 'hagefiksern'));
                            if ($categories_list) {
                                printf('<span class="post-categories">' . esc_html__('in %1$s', 'hagefiksern') . '</span>', $categories_list);
                            }
                            ?>
                        </div><!-- .entry-meta -->
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_content(); ?>
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'hagefiksern'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <?php
                        $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'hagefiksern'));
                        if ($tags_list) {
                            printf('<div class="post-tags">' . esc_html__('Tags: %1$s', 'hagefiksern') . '</div>', $tags_list);
                        }
                        ?>

                        <div class="post-navigation">
                            <?php previous_post_link('<div class="nav-previous">%link</div>', '<span class="nav-direction">' . esc_html__('Previous Post', 'hagefiksern') . '</span><span class="nav-title">%title</span>'); ?>
                            <?php next_post_link('<div class="nav-next">%link</div>', '<span class="nav-direction">' . esc_html__('Next Post', 'hagefiksern') . '</span><span class="nav-title">%title</span>'); ?>
                        </div>
                    </footer><!-- .entry-footer -->
                    
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
            endwhile; // End of the loop.
            ?>

        </main><!-- #primary -->

        <?php get_sidebar(); ?>
    </div><!-- .row -->
</div><!-- .container -->

<?php
get_footer();