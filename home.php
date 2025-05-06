<?php
/**
 * The blog template file
 *
 * @package Hagefiksern
 */

get_header();
?>

<div class="container">
    <div class="row">
        <main id="primary" class="site-main col-md-8">

            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>

            <div class="posts-grid">
                <?php
                if (have_posts()) :
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
                            <div class="post-inner">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="post-content">
                                    <header class="post-header">
                                        <?php the_title('<h2 class="post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

                                        <div class="post-meta">
                                            <time class="post-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                <?php echo esc_html(get_the_date()); ?>
                                            </time>
                                            <span class="post-author">
                                                <?php echo esc_html__('by', 'hagefiksern'); ?> <?php the_author(); ?>
                                            </span>
                                        </div>
                                    </header>

                                    <div class="post-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php
                    endwhile;

                    the_posts_navigation(array(
                        'prev_text' => '<span class="nav-label">' . esc_html__('Older posts', 'hagefiksern') . '</span>',
                        'next_text' => '<span class="nav-label">' . esc_html__('Newer posts', 'hagefiksern') . '</span>',
                    ));

                else :
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </div><!-- .posts-grid -->

        </main><!-- #primary -->

        <?php get_sidebar(); ?>
    </div><!-- .row -->
</div><!-- .container -->

<?php
get_footer();