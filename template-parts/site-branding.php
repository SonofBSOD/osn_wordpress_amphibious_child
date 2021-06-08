<?php
/**
 * The template for displaying site branding
 * @package Amphibious
 */
?>

<div class="site-branding-wrapper">
    <div style="display: flex; flex-direction: row; justify-content: center; align-items: center">
        <a href="https://www.opensanghacollective.org"><img style="width: 354px; height: 354px; margin-bottom: 15px;" src="<?php echo get_stylesheet_directory_uri() ?>/images/osn_logo2.png"></a>
    </div>

    <div class="site-branding">
        <?php
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) :
            ?>
            <p class="site-description">
                <?php echo esc_html( $description ); ?>
            </p>
        <?php endif; ?>
    </div>
</div><!-- .site-branding-wrapper -->
