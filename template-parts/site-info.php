<?php
/**
 * The template for displaying site info
 * @package Amphibious
 */
?>

<div>
  <div class="row footer-news-row">
    <div class="col footer-news-col">
      <h2 class="news-header">Get news from our collective</h2>
      <?php echo do_shortcode('[mc4wp_form id="537"]'); ?>
    </div>
  </div>
  <div class="row footer-info-row">
    <div class="col charity-col">
      <span>Charity No. 1234567</span>
    </div>
    <div class="col credit-col">
      <?php do_action( 'amphibious_credits' ); ?>
    </div>
    <div class="col link-col">
      <a class="footer-link" href="/our-privacy-policy">Policy</a>
      <span class="footer-divider">|</span>
      <a class="footer-link" href="/legal-notice">Legal</a>
    </div>
  </div>
</div>

