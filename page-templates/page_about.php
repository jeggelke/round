<?php  /* Template Name: About */

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package round
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="section container-fluid">
				<div class="row no-side-margin">
					<div>
						<h3 class="text-center">About Round Designs</h3>
						<div class="row no-side-margin">
							<div class="col-xs-12 col-sm-4 col-sm-offset-1 no-side-padding">
								<img class="image-responsive center-block" src="<?php the_field('about_round_image'); ?>" />
							</div>
							<div class="col-xs-12 col-sm-6 col-sm-offset-1 ">
								<p><?php the_field('about_round_designs'); ?></p>
							</div>
						</div>
					</div>
				</div>
				<?php if ((get_field('about_sarah_haze') != '') && (get_field('about_sarah_image') != '')) : ?>
				<div class="row no-side-margin">
					<div>
						<h3 class="text-center">About Sarah Haze</h3>
						<div class="row no-side-margin">
							<div class="col-xs-12 col-sm-4 col-sm-offset-1 no-side-padding">
								<img class="image-responsive center-block" src="<?php the_field('about_sarah_image'); ?>" />
							</div>
							<div class="col-xs-12 col-sm-6 col-sm-offset-1">
								<p><?php the_field('about_sarah_haze'); ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>
			</div>
			</div>
			<!-- // while ( have_posts() ) : the_post();
			//
			// 	get_template_part( 'template-parts/content', 'page' );
			//
			//
			// endwhile; // End of the loop. -->


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
