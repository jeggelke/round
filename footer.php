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
$mondayHours = get_option('monday_hours');
$tuesdayHours = get_option('tuesday_hours');
$wednesdayHours = get_option('wednesday_hours');
$thursdayHours = get_option('thursday_hours');
$fridayHours = get_option('friday_hours');
$saturdayHours = get_option('saturday_hours');
$sundayHours = get_option('sunday_hours');

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
		<div class="row social-footer">
			<div class="col-xs-12">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
					<div class="col-xs-12 col-sm-6 shop-info text-center footer-section">
						<div class="footer-header">Visit Us!</div>
						<div class="shop-address">
							<?php echo get_store_address(); ?>
						</div>
					</div>
				<!--	<div class="clearfix visible-sm-block"></div> -->
					<div class="col-xs-12 col-sm-6 shop-info text-center footer-section">
						<div class="footer-header">Store Hours</div>
						<?php if(!empty($mondayHours)) : ?> <div class="col-xs-12">Monday: <?php echo $mondayHours ?> </div> <?php endif ?>
						<?php if(!empty($tuesdayHours)) : ?> <div class="col-xs-12">Tuesday: <?php echo $tuesdayHours ?> </div> <?php endif ?>
						<?php if(!empty($wednesdayHours)) : ?> <div class="col-xs-12">Wednesday: <?php echo $wednesdayHours ?> </div> <?php endif ?>
						<?php if(!empty($thursdayHours)) : ?> <div class="col-xs-12">Thursday: <?php echo $thursdayHours ?> </div> <?php endif ?>
						<?php if(!empty($fridayHours)) : ?> <div class="col-xs-12">Friday: <?php echo $fridayHours ?> </div> <?php endif ?>
						<?php if(!empty($saturdayHours)) : ?> <div class="col-xs-12">Saturday: <?php echo $saturdayHours ?> </div> <?php endif ?>
						<?php if(!empty($sundayHours)) : ?> <div class="col-xs-12">Sunday: <?php echo $sundayHours ?> </div> <?php endif ?>
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
