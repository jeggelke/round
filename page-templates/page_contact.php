<?php  /* Template Name: Contact */

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

get_header();?>

<style type="text/css">

.acf-map {
	width: 100%;
	height: 400px;
	border: #ccc solid 1px;
	margin: 20px 0;
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYI1JxRv92iJcCzQiC9DkvAbPw84lJIsc"></script>
<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {

	// var
	var $markers = $el.find('.marker');


	// vars
	var args = {
		zoom		: 13,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};


	// create map
	var map = new google.maps.Map( $el[0], args);


	// add a markers reference
	map.markers = [];


	// add markers
	$markers.each(function(){

    	add_marker( $(this), map );

	});


	// center map
	center_map( map );


	// return
	return map;

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 13 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);
</script>

<?php
while ( have_posts() ) : the_post();
$location = get_field('address');
$contactUsShortcodeId = get_field('contact_us_shortcode_id');
$contactUsShortcodeTitle = get_field('contact_us_shortcode_title');
$subscribeText = get_field('subscribe_text');
?> <!--Because the_content() works only inside a WP Loop -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="section container-fluid">
				<div class="row no-side-margin">
					<div>
						<h3 class="text-center">Contact</h3>
						<div class="row no-side-margin">
							<div class="col-xs-12  no-side-padding">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="row no-side-margin">
							<h4>Shop Location: </h4>
							<?php

							$location = get_field('address');

							if( !empty($location) ):
							$mapsUrl = 'http://maps.google.com/?q=' . $location['address'];
							?>
							<a href="<?php echo $mapsUrl ?>" target="_blank"><?php echo str_replace(", United States", "", $location['address'])?> <i class="fa fa-external-link" aria-hidden="true"></i></a>
							<div class="acf-map">
								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
							</div>
							<?php endif; ?>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<!-- Begin MailChimp Signup Form -->
								<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
								<style type="text/css">
									#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;}
									#mc-embedded-subscribe{box-shadow: none !important;}
									#mc-embedded-subscribe:hover{box-shadow: none !important;}
									/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
									   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
								</style>
								<div id="mc_embed_signup">
								<form action="https://iamround.us18.list-manage.com/subscribe/post?u=de7dc4b66b6732c29baf60b33&amp;id=6a936c8c72" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								    <div id="mc_embed_signup_scroll">
									<h3>Subscribe to our mailing list</h3>
									<p><?php echo $subscribeText ?><p>
								<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
								<div class="mc-field-group">
									<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
								</label>
									<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
								</div>
									<div id="mce-responses" class="clear">
										<div class="response" id="mce-error-response" style="display:none"></div>
										<div class="response" id="mce-success-response" style="display:none"></div>
									</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
								    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_de7dc4b66b6732c29baf60b33_6a936c8c72" tabindex="-1" value=""></div>
								    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
								    </div>
								</form>
								</div>
								<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
								<!--End mc_embed_signup-->
							</div>
						</div>
						<div class="row">
							<h4>Contact Us</h4>
							<?php echo $contactUsShortcode;
							echo do_shortcode('[contact-form-7 id="' . $contactUsShortcodeId .'" title="' . $contactUsShortcodeTitle .'"]');
							 ?>
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
			<?php
	    endwhile; //resetting the page loop
	    wp_reset_query(); //resetting the page query
	    ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
