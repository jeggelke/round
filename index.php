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
		<div class="container">
			<div class="page-content container">
				<p class="text-center more-info"><i class="fa fa-circle fa-ellipses" aria-hidden="true"></i><i class="fa fa-circle fa-ellipses" aria-hidden="true"></i><i class="fa fa-circle fa-ellipses" aria-hidden="true"></i><span>Online store & more information coming soon!</span><i class="fa fa-circle fa-ellipses" aria-hidden="true"></i><i class="fa fa-circle fa-ellipses" aria-hidden="true"></i><i class="fa fa-circle fa-ellipses" aria-hidden="true"></i></p>
				<div class="row social-links">
					<h2 class="text-center">Be Social</h2>
					<div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-0 text-center">
							<a href="https://www.facebook.com/iamrounddesigns/" target="blank">
								<i class="fa fa-facebook-official" aria-hidden="true"></i>
								@iamrounddesigns
							</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 text-center">
							<a href="https://www.instagram.com/rounddesigns/" target="blank">
									<i class="fa fa-instagram"></i>
								 @rounddesigns
							 </a>
					</div>
					<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 text-center">

							<a href="mailto:sarah@iamround.com" target="blank">
									<i class="fa fa-envelope"></i>
								 sarah@iamround.com
						 	</a>
					 </div>
					 </div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-8 col-xs-offset-2">
						<div class="center-block">
							<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fiamrounddesigns%2Fposts%2F1786021041685577%3A0&width=500" width="1200" height="389" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
						</div>
					</div>
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
				<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<script>
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
	</script>
<?php
//get_sidebar();
get_footer();
