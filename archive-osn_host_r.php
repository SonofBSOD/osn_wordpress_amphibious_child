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
Retreats offer a potent opportunity to learn, develop and immerse in practice. This allows the transformational contemplative practices within the Buddhist traditions to really take root in our being.
<br/><br/>
However, many retreats offered are prohibitively expensive: a significant barrier to the Dharma. We are committed to supporting retreats that are run on a fully <a href="/dana">dana</a> basis both in terms of teaching and room and board. This support takes the form of sharing retreats offered on this basis by our friends in a variety of sanghas and issuing retreat grants to teachers and working with them to run <a href="/dana">dana</a> only retreats.  

DOC;

$footer = <<<DOC
Teachers are invited either by the trustees or by an individual advisor.  The trustees & advisors in turn have the ability to challenge each others’ selections.  They also have the ability to revisit and challenge historic selections.
DOC;
?>

<?php
get_template_part('template-parts/image-banner', null, array(
    'image_url' => get_stylesheet_directory_uri() . '/images/dana.jpeg',
    'text' => 'Retreats'
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
                            'articleId' => 'retreat-event-blurb',
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
                                get_template_part( 'template-parts/osn_host_r-archive_content');
                                ?>

                            <?php endwhile; ?>

                            <?php get_template_part('template-parts/generic-post-wrapper-square', null, array(
                                'articleId' => 'retreat-event-footer',
                                'text' => $footer
                            )); ?>
                        </div><!-- .post-wrapper -->

                        <?php amphibious_the_posts_pagination(); ?>

                    <?php else : ?>

                        <!-- turn off search box for now -->
                        <div style="display:none" class="post-wrapper post-wrapper-single post-wrapper-single-notfound">
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
