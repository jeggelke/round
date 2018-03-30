<?php  /* Template Name: Work Samples */

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

get_header('nofollow'); ?>
<style>
.entry-title {
	text-align: center;
}
</style>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="section container-fluid">
				<div class="row no-side-margin">
					<div>
						<div class="row no-side-margin">
							<div class="col-xs-12 no-side-padding">
								<?php while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/content', 'page' );
									endwhile ?>
							</div>
						</div>
					</div>
				</div>
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
