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
$blurb = <<<DOC
Courses are a great way to delve into a specific facet of the Dharma in a structured way with the guidance of a teacher and the support of peers. The emphasis on any course we offer will always be on how the aspect of the Dharma being explored can impact the student’s life and lead to away from suffering and towards flourishing. Please <a href="https://forms.gle/N3opMfWv3WNeTXCs7">contact us here</a> if you have a suggestion for a future course.

All courses are offered on a purely <a href="/dana">dana</a> basis.

DOC;

$footer = <<<DOC
Teachers are invited either by the trustees or by an individual advisor.  The trustees & advisors in turn have the ability to challenge each others’ selections.  They also have the ability to revisit and challenge historic selections.
DOC;

?>

<?php
get_template_part('template-parts/image-banner', null, array(
    'image_url' => get_stylesheet_directory_uri() . '/images/dana.jpeg',
    'text' => 'Courses'
))?>

<div class="page-header-wrapper hidden-header-wrapper">
    <div class="container">

        <div class="row">
            <div class="col">

                <header class="page-header">
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
                            'articleId' => 'course-event-blurb',
                            'text' => $blurb
                        )); ?>
                    </div>
                    <?php if ( have_posts() ) : ?>

                        <div id="post-wrapper" class="post-wrapper post-wrapper-archive">
                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/osn_course-archive_content');
                                ?>

                            <?php endwhile; ?>

                            <?php get_template_part('template-parts/generic-post-wrapper-square', null, array(
                                'articleId' => 'course-event-footer',
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
