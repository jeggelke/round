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
				<div class="social-container center-block text-center">
					<div class="col-xs-12 col-sm-4 no-side-padding">
						<a href="https://www.facebook.com/iamrounddesigns/" target="blank">
							<i class="fa fa-facebook-official" aria-hidden="true"></i>@iamrounddesigns
						</a>
					</div>
					<div class="col-xs-12 col-sm-4 no-side-padding">
						<a href="https://www.instagram.com/rounddesigns/" target="blank">
								<i class="fa fa-instagram"></i>@rounddesigns
						 </a>
					</div>
					<div class="col-xs-12 col-sm-4 no-side-padding">
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
