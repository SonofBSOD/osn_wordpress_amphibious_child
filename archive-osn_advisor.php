<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Amphibious
 */

get_header(); ?>

<?php
get_template_part('template-parts/image-banner', null, array(
    'image_url' => get_stylesheet_directory_uri() . '/images/what-we-do.jpeg',
    'text' => 'Advisors'
))?>

<?php
$blurb = <<<DOC
The below are a group of teachers who have each been living and teaching the Dharma for many decades and therefore form a bridge between emerging students and teachers and the generations of practitioners who have passed on the Dharma since the time of the Buddha. We have asked, and will continue to ask, for their encouragement, support and advice as we develop as an organisation.
DOC;

$footer = <<<DOC
Advisors are invited by the trustees based on a long-standing teaching career & at least 5 years in an established Buddhist ordination lineage.
DOC;

?>

<div class="page-header-wrapper hidden-header-wrapper">
    <div class="container">

        <div class="row">
            <div class="col">

                <header class="page-header hidden-page-header">
                    <?php
                    if ( have_posts() ) :
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    else :
                        printf( '<h1 class="page-title">%1$s</h1>', esc_html__( 'Nothing Found', 'amphibious' ) );
                    endif;
                    ?>
                </header><!-- .page-header -->

            </div><!-- .col -->
        </div><!-- .row -->

    </div><!-- .container -->
</div><!-- .page-header-wrapper -->

<div class="site-content-inside">
    <div class="container">
        <div class="row">

            <div id="primary" class="content-area <?php amphibious_layout_class( 'content' ); ?>">
                <main id="main" class="site-main">
                    <div class="post-wrapper post-wrapper-archive blurb-post-wrapper">
                        <?php get_template_part('template-parts/generic-post-wrapper-square', null, array(
                            'articleId' => 'advisor-event-blurb',
                            'text' => $blurb
                        )); ?>
                    </div>
                    <?php if ( have_posts() ) : ?>

                        <div id="post-wrapper" class="post-wrapper post-wrapper-archive">
                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php
                                // for now, advisors really display
                                get_template_part( 'template-parts/osn_advisor-archive_content');
                                ?>

                            <?php endwhile; ?>

                            <?php get_template_part('template-parts/generic-post-wrapper-square', null, array(
                                'articleId' => 'advisor-event-footer',
                                'text' => $footer
                            )); ?>
                        </div><!-- .post-wrapper -->

                        <?php amphibious_the_posts_pagination(); ?>

                    <?php else : ?>

                        <!-- turn off search box for now -->
                        <div style="display: none" class="post-wrapper post-wrapper-single post-wrapper-single-notfound">
                            <?php get_template_part( 'template-parts/content', 'none' ); ?>
                        </div><!-- .post-wrapper -->

                    <?php endif; ?>

                </main><!-- #main -->
            </div><!-- #primary -->

            <?php get_sidebar(); ?>

        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .site-content-inside -->

<?php get_footer(); ?>
