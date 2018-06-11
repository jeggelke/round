<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package round
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
		<div class="row social-footer">
			<div class="col-xs-12">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3">
					<div class="col-xs-12 col-sm-6 shop-info text-center footer-section">
						<div class="footer-header">Visit Us!</div>
						<div class="shop-address">
							<?php echo get_store_address(); ?>
						</div>
					</div>
				<!--	<div class="clearfix visible-sm-block"></div> -->
					<div class="col-xs-12 col-sm-6 shop-info text-center footer-section">
						<div class="footer-header">Store Hours</div>
						<div class="col-xs-12">Sunday: <?php echo get_option('sunday_hours'); ?> </div>
						<div class="col-xs-12">Monday: <?php echo get_option('monday_hours'); ?> </div>
						<div class="col-xs-12">Tuesday: <?php echo get_option('tuesday_hours'); ?> </div>
						<div class="col-xs-12">Wednesday: <?php echo get_option('wednesday_hours'); ?> </div>
						<div class="col-xs-12">Thursday: <?php echo get_option('thursday_hours'); ?> </div>
						<div class="col-xs-12">Friday: <?php echo get_option('friday_hours'); ?> </div>
						<div class="col-xs-12">Saturday: <?php echo get_option('saturday_hours'); ?> </div>

					</div>
				</div>
				<div class="col-xs-12 social-container text-center footer-section">
					<!--<div class="footer-header">Get Social</div>-->
					<div class="col-xs-4 no-side-padding">
						<a href="https://www.facebook.com/iamrounddesigns/" target="blank">
							<i class="fa fa-facebook-official" aria-hidden="true"></i>@iamrounddesigns
						</a>
					</div>
					<div class="col-xs-4 no-side-padding">
						<a href="https://www.instagram.com/rounddesigns/" target="blank">
								<i class="fa fa-instagram"></i>@rounddesigns
						 </a>
					</div>
					<div class="col-xs-4 no-side-padding">
						<a href="mailto:info@iamround.com" target="blank">
								<i class="fa fa-envelope"></i>info@iamround.com
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="site-info row">
			<div class="col-xs-12 text-center">
				<span>Round Designs &copy; <?php echo date("Y"); ?></span>
				<!-- <span class="sep"> | </span> -->
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
