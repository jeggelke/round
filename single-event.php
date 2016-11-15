<?php
/*
WP Post Template: EventPost
*/

/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package round
 */

get_header(); ?>
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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		$date = get_field('event_date', false, false);
		$date = new DateTime($date);
		?>

		<div class="row no-side-margin event-archive-container">
			<h1 class="text-center"><?php the_title(); ?></a></h1>
			<div class="col-xs-12 col-sm-4 col-sm-offset-1">
				<?php the_post_thumbnail( 'medium', array( 'class' => 'event-thumb-homepage img-responsive center-block' ) ); ?>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="center-block">
					<p>
						<?php global $post;
						echo $post->post_content;
						 ?>
				 </p>
					<strong>Date:</strong> <?php

					echo $date->format('m/d/Y'); ?>
					<br>
					<strong>Time: </strong>
					<?php echo get_field('event_start_time', false, false) ?> - <?php echo get_field('event_end_time', false, false) ?>
					<br>
					<strong><a href="<?php the_field('event_website') ?>" target="_blank">Event Website <i class="fa fa-external-link" aria-hidden="true"></i></a></strong>
					<br>
					<strong>Location: </strong>
					<?php

					$location = get_field('event_location');

					if( !empty($location) ):
					$mapsUrl = 'http://maps.google.com/?q=' . $location['address'];
					?>
					<a href="<?php echo $mapsUrl ?>" target="_blank"><?php echo $location['address']?> <i class="fa fa-external-link" aria-hidden="true"></i></a>
					<br>
					<strong><a href="<?php echo $mapsUrl ?>" target="_blank">Directions <i class="fa fa-external-link" aria-hidden="true"></i></a></strong>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
