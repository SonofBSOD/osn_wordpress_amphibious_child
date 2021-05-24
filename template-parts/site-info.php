<?php
/**
 * The template for displaying site info
 * @package Amphibious
 */
?>

<div class="site-info">
	<div class="site-info-inside">

		<div class="container">

			<div class="row">
				<div class="col">
					<div class="credits-wrapper">
                        <div style="display: flex; flex-direction: row; justify-content: center; align-items: flex-start;">
                            <a class="footer-link" href="/our-privacy-policy">Privacy Policy</a> <span style="font-weight: bold; padding-left: 5px; padding-right: 5px;">|</span>
                            <a class="footer-link" href="/legal-notice">Legal Notice</a>
                        </div>
						<?php do_action( 'amphibious_credits' ); ?>
					</div><!-- .credits -->
				</div><!-- .col -->
			</div><!-- .row -->

		</div><!-- .container -->

	</div><!-- .site-info-inside -->
</div><!-- .site-info -->
