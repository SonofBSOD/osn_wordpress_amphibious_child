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
    'image_url' => get_stylesheet_directory_uri() . '/images/dana.jpeg',
    'text' => 'Individual Instruction'
))?>

<?php
$blurb = <<<DOC
Within traditional Buddhist contexts, the student teacher relationship is considered foundational to the teachings and practices of the Buddhadharma taking root in the life of a practitioner. We believe strongly that this direct transmission is a vital part of the learning journey that greatly aids the very real possibility of living from the insight of practice. As such, one of the main services we are privileged to offer is connecting students to teachers for individual instruction and mentoring. 
<br/> <br/>All the below teachers are available for mentoring on an individual and <a href="/dana">dana</a> basis. Please ensure that you have read our page on <a href="/dana">dana</a> and watched the short video on the subject provided and thus understand the opportunity and responsibility this traditional structuring of student - teacher interaction allows for and invites.
<br/> <br/>Please introduce yourself to them through the contact link provided within their individual entry below with some background information about your life and practice and await their response.
DOC;

$footer = <<<DOC
Teachers are invited either by the trustees or by an individual advisor.  The trustees & advisors in turn have the ability to challenge each others’ selections.  They also have the ability to revisit and challenge historic selections.
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
                            'articleId' => 'teacher-blurb',
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

                                if (get_field('teacher-available-for-individual-instruction')) {
                                    get_template_part('template-parts/osn_teacher-archive_content');
                                }
                                ?>

                            <?php endwhile; ?>

                            <?php get_template_part('template-parts/generic-post-wrapper-square', null, array(
                                'articleId' => 'teacher-footer',
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
