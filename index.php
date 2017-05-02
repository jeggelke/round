<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package round
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		<div class="container-fluid no-side-padding">
			<div class="section container-fluid no-side-padding">
				<div class="center-block metaslider-container">
					<?php
					$page = get_page_by_title( 'Home' );
					$pageid = $page->ID;
					$sliderID =  get_field('metaslider_id', $pageid);
	    			echo do_shortcode("[metaslider id=". $sliderID . "]");

					?>
				</div>
			</div>
			<div class="section container-fluid no-side-padding">
				<h3 class="text-center">About</h3>
				<div class="row no-side-margin">
					<?php $args = array(
												'numberposts' => 1,
												'offset' => 0,
												'category' => 0,
												'orderby' => 'post_date',
												'order' => 'DESC',
												'include' => '',
												'exclude' => '',
												'meta_key' => '_wp_page_template',
												'meta_value' => 'page_about.php',
												'meta_compare' => 'like',
												'post_type' => 'page',
												'post_status' => 'draft, publish, future, pending, private',
												'suppress_filters' => true
					);

					$about_page = get_posts( $args, ARRAY_A );

					foreach ($about_page as $post) : setup_postdata( $post );
					$about_text = get_field('home_page_about_text', false, false);
					?>
					<div class="col-xs-12 col-sm-4 col-sm-offset-1 no-side-padding">
						<img class="img-responsive center-block" src="<?php the_field('home_page_about_image') ?>" />
					</div>
					<div class="col-xs-12 col-sm-5 col-sm-offset-1">
						<p><?php echo $about_text ?></p>
						<h4 class="text-center read-more-text"><a href="about">Read More</a></h4>
					</div>
				<?php endforeach ?>
				</div>
			</div>
			<div class="section container-fluid no-side-padding">

				<!-- current events -->

								<?php
								$date = date('Ymd');
					 		 	$prevargs = array(
															'numberposts' => 100,
															'offset' => 0,
															'category' => 0,
															'orderby' => 'event_date',
															'order' => 'asc',
															'meta_key' => 'event_date',
															'meta_compare'	=> '<',
															'meta_value'		=> $date,
															'post_type' => 'event',
															'post_status' => 'publish',
															'suppress_filters' => true
								);

								$recent_posts = get_posts( $prevargs, ARRAY_A );
								$number_of_current_posts = 0;

								foreach ($recent_posts as $post) : setup_postdata( $post );
									$date = get_field('event_date', false, false);
									$datestring = $date;
									$date = new DateTime($date);
									$enddate = get_field('event_end_date', false, false);
									$enddateproper = new DateTime($enddate);
									$todays_date = new DateTime(date('Ymd'));
									$todays_date->setTimezone(new DateTimeZone('America/New_York'));
									if (($enddateproper->format('Ymd') >= $todays_date->format('Ymd')) and $date->format('Ymd') <= date('Ymd') and !empty($enddate)):
										$number_of_current_posts = $number_of_current_posts + 1;
									endif;
								endforeach;

								if ($number_of_current_posts > 0) : ?>
									<div class="section past-events container-fluid">
										<h3 class="text-center no-bottom-margin">Current Events</h3>
								<?php
								foreach ($recent_posts as $post) : setup_postdata( $post );
								$date = get_field('event_date', false, false);
								$datestring = $date;
								$date = new DateTime($date);
								$enddate = get_field('event_end_date', false, false);
								$enddateproper = new DateTime($enddate);
								$todays_date = new DateTime(date('Ymd'));
								$todays_date->setTimezone(new DateTimeZone('America/New_York'));
								if (($enddateproper->format('Ymd') >= $todays_date->format('Ymd')) and $date->format('Ymd') <= date('Ymd') and !empty($enddate)):

								?>

								<div class="row no-side-margin event-archive-container event-section">
									<div class="col-xs-12 col-sm-4 col-sm-offset-1">
										<?php the_post_thumbnail( 'medium', array( 'class' => 'event-thumb-homepage img-responsive center-block' ) ); ?>
									</div>
									<div class="col-xs-12 col-sm-7">
										<div class="center-block">
											<h4><?php the_title(); ?></h4>
											<?php the_content(); ?>
											<strong>Date:</strong> <?php

											echo $date->format('m/d/Y');
											if ($enddate != '') {
												$enddate = new DateTime($enddate);
												echo ' - ' . $enddate->format('m/d/Y');
											}
											if (get_field('event_start_time', false, false) != '') :
											?>
											<br>
											<strong>Time:</strong>
											<?php echo get_field('event_start_time', false, false);
											if (get_field('event_end_time', false, false) != '')
											{
											 	 echo " - " . get_field('event_end_time', false, false);
											}
											endif;
				 							?>
											<br>
											<strong>Location: </strong>
											<?php

											$location = get_field('event_location');

											if( !empty($location) ):
											$mapsUrl = 'http://maps.google.com/?q=' . $location['address'];
											?>
											<a href="<?php echo $mapsUrl ?>" target="_blank"><?php echo str_replace(", United States", "", $location['address'])?> <i class="fa fa-external-link" aria-hidden="true"></i></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<?php
								endif;
								endforeach;
								?>
								</div>
								<?php
								endif;
								?>

				<!-- end current events -->


				<h3 class="text-center no-bottom-margin">Next Event</h3>
				<div class="row no-side-margin event-section">
					<?php
					$todays_date = date('Ymd');
					$args = array(
																'numberposts' => 1,
																'offset' => 0,
																'category' => 0,
																'orderby' => 'event_date',
																'order' => 'asc',
																'meta_key' => 'event_date',
																'meta_compare'	=> '>=',
																'meta_value'		=> $todays_date,
																'post_type' => 'event',
																'post_status' => 'publish',
																'suppress_filters' => true
					);

					$recent_posts = get_posts( $args, ARRAY_A );
					if (!empty($recent_posts)) :
					foreach ($recent_posts as $post) : setup_postdata( $post );
					$date = get_field('event_date', false, false);
					$date = new DateTime($date);
					$enddate = get_field('event_end_date', false, false);
					?>

					<div class="col-xs-12 event-archive-container">
						<div class="col-xs-12 col-sm-4  col-sm-offset-1">
							<?php the_post_thumbnail( 'medium', array( 'class' => 'event-thumb-homepage img-responsive center-block' ) ); ?>
						</div>
						<div class="col-xs-12 col-sm-6  col-sm-offset-1">
							<div class="center-block">
								<h4><?php the_title(); ?></h4>
								<?php the_content(); ?>
								<strong>Date:</strong> <?php

								echo $date->format('m/d/Y');
								if ($enddate != '') {
									$enddate = new DateTime($enddate);
									echo ' - ' . $enddate->format('m/d/Y');
								}
								if (get_field('event_start_time', false, false) != '') :
								?>
								<br>
								<strong>Time:</strong>
								<?php echo get_field('event_start_time', false, false);
								if (get_field('event_end_time', false, false) != '')
								{
								 	 echo " - " . get_field('event_end_time', false, false);
								}
								endif;
	 							?>
								<br>
								<strong>Location: </strong>
								<?php

								$location = get_field('event_location');

								if( !empty($location) ):
								$mapsUrl = 'http://maps.google.com/?q=' . $location['address'];
								?>
								<a href="<?php echo $mapsUrl ?>" target="_blank"><?php echo str_replace(", United States", "", $location['address'])?> <i class="fa fa-external-link" aria-hidden="true"></i></a>
								<?php endif ?>
								<h4><a href="<?php the_field('event_website') ?>" target="_blank">More info <i class="fa fa-external-link" aria-hidden="true"></i></a></h4>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				<?php else : ?>
					<h4 class="text-center">Stay tuned for more events!</h4>
					<?php endif ?>
				</div>
				<h3 class="text-center read-more"><a href="events">See All Events</a></h3>
			</div>
			<!-- <div class="section">
				<h2 class="text-center">Gallery</h2>
			</div> -->
				</div>
				<!-- <div class="row no-side-margin">
					<div class="col-xs-12 col-sm-6 col-md-4 instaframe-container">
						<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BLgrlzpBpLy/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">The most colorful kiln load ever! Little spirit animals are ready for Saturday&#39;s sale 🐝🐢🦃(More info in my bio) ••• #madeinaskutt #glazefiring #spiritanimal #basementlighting #rounddesigns #oneofakind #totem #kiln #artistsoninstagram #ceramics #clay #madeofmud #cat #lizard #cow #lion #fish #redwingblackbird #mouse #chipmunk #deer #skunk #parrot #cute</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A photo posted by Round Designs by Sarah Haze (@rounddesigns) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-10-13T16:58:11+00:00">Oct 13, 2016 at 9:58am PDT</time></p></div></blockquote>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 instaframe-container">
						<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BLetc2vBpG_/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">I&#39;ve been glazing like crazy getting ready for my first sale this weekend. This spooning koala spoon rest is just one of the round designs that will be available! ••• #ceramic #koala #spooning #underglaze #handmade #cute #earthenware #oneofakind #newbusiness #glazing</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A photo posted by Round Designs by Sarah Haze (@rounddesigns) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-10-12T22:35:57+00:00">Oct 12, 2016 at 3:35pm PDT</time></p></div></blockquote>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 instaframe-container">
						<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BLeMS3vhVNG/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">They all look like little green aliens at the moment, but once that glaze gets fired and turns clear these 100 little spirit animals will be colorful and for sale! #ceramic #spiritanimal #wip #earthenware #oneofakind #handbuilt #handmade #craft #makersgonnamake #artistsoninstagram</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A photo posted by Round Designs by Sarah Haze (@rounddesigns) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-10-12T17:46:14+00:00">Oct 12, 2016 at 10:46am PDT</time></p></div></blockquote>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 instaframe-container">
						<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BLeLhCJBlji/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">Exciting times are afoot! This weekend is the debut of my new creative business adventure: Round Designs. I&#39;m stoked for how the future will unfold from here! ••• #newbusiness #firstpost #creativeentrepreneur #smallbusiness #artwork #artist #ceramics #thefutureisbright</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A photo posted by Round Designs by Sarah Haze (@rounddesigns) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-10-12T17:39:26+00:00">Oct 12, 2016 at 10:39am PDT</time></p></div></blockquote>
					</div>
				</div>
				<script async defer src="//platform.instagram.com/en_US/embeds.js"></script> -->
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<!-- <script>
		$(document).ready(
			function(){
				var check = function(){
				    if($('iframe.instagram-media:last-of-type').height()>0){
							setIframeHeight();
				    }
				    else {
				        setTimeout(check, 200); // check again in a second
				    }
				}
				check();
				$(window).resize(function(){setIframeHeight()})
			}
		)
		function setIframeHeight(){
			var biggestHeight = 0;
				$('iframe.instagram-media').each(
					function(){
						console.log(this.height);
						if (this.height > biggestHeight)
						{
							biggestHeight = this.height;
						}
					}
				);
				$('.instaframe-container').height(biggestHeight);
		}
	</script> -->
<?php
//get_sidebar();
get_footer();
