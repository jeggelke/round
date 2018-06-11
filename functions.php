<?php
/**
 * round functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package round
 */

if ( ! function_exists( 'round_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function round_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on round, use a find and replace
	 * to change 'round' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'round', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'round' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'round_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'round_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function round_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'round_content_width', 640 );
}
add_action( 'after_setup_theme', 'round_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function round_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'round' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'round' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'round_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function round_scripts() {
	wp_enqueue_style( 'round-style', get_stylesheet_uri() );

	wp_enqueue_script( 'round-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'round-main', get_template_directory_uri() . '/js/main.js', array(), '20180608', true );

	wp_enqueue_script( 'round-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'round_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function my_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyCYI1JxRv92iJcCzQiC9DkvAbPw84lJIsc';

	return $api;

}

function get_store_address()
{
	$address1 = get_option('store_address');
	$address2 = get_option('store_address2');
	$city = get_option('store_city');
	$state = get_option('store_state');
	$zip = get_option('store_zip');
	$completeAddress = '';
	if($address2 != '')
	{
		$completeAddress = $address1 . '<br />' . $address2 . '<br />' . $city . ', ' . $state . ' ' . $zip;
	}
	else {
		$completeAddress = $address1 . '<br />' . $city . ', ' . $state . ' ' . $zip;
	}
	return $completeAddress;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
add_filter('admin_init', 'my_general_settings_register_store_address_load');
add_filter('admin_init', 'my_general_settings_register_store_address2_load');
add_filter('admin_init', 'my_general_settings_register_store_city_load');
add_filter('admin_init', 'my_general_settings_register_store_state_load');
add_filter('admin_init', 'my_general_settings_register_store_zip_load');
add_filter('admin_init', 'my_general_settings_register_sunday_hours_load');
add_filter('admin_init', 'my_general_settings_register_monday_hours_load');
add_filter('admin_init', 'my_general_settings_register_tuesday_hours_load');
add_filter('admin_init', 'my_general_settings_register_wednesday_hours_load');
add_filter('admin_init', 'my_general_settings_register_thursday_hours_load');
add_filter('admin_init', 'my_general_settings_register_friday_hours_load');
add_filter('admin_init', 'my_general_settings_register_saturday_hours_load');

function my_general_settings_register_store_address_load()
{
    register_setting('general', 'store_address', 'esc_attr');
    add_settings_field('store_address', '<label for="store_address">'.__('Store Address' , 'store_address' ).'</label>' , 'my_general_settings_field_store_address_html', 'general');
}

function my_general_settings_field_store_address_html()
{
    $value = get_option( 'store_address', '' );
    echo '<input type="text" id="store_address" name="store_address" value="' . $value . '" />';
}

function my_general_settings_register_store_address2_load()
{
    register_setting('general', 'store_address2', 'esc_attr');
    add_settings_field('store_address2', '<label for="store_address2">'.__('Store Address 2' , 'store_address2' ).'</label>' , 'my_general_settings_field_store_address2_html', 'general');
}

function my_general_settings_field_store_address2_html()
{
    $value = get_option( 'store_address2', '' );
    echo '<input type="text" id="store_address2" name="store_address2" value="' . $value . '" />';
}

function my_general_settings_register_store_city_load()
{
    register_setting('general', 'store_city', 'esc_attr');
    add_settings_field('store_city', '<label for="store_city">'.__('Store City' , 'store_city' ).'</label>' , 'my_general_settings_field_store_city_html', 'general');
}

function my_general_settings_field_store_city_html()
{
    $value = get_option( 'store_city', '' );
    echo '<input type="text" id="store_city" name="store_city" value="' . $value . '" />';
}

function my_general_settings_register_store_zip_load()
{
    register_setting('general', 'store_zip', 'esc_attr');
    add_settings_field('store_zip', '<label for="store_zip">'.__('Store Zip' , 'store_zip' ).'</label>' , 'my_general_settings_field_store_zip_html', 'general');
}

function my_general_settings_field_store_zip_html()
{
    $value = get_option( 'store_zip', '' );
    echo '<input type="text" id="store_zip" name="store_zip" value="' . $value . '" />';
}

function my_general_settings_register_store_state_load()
{
    register_setting('general', 'store_state', 'esc_attr');
    add_settings_field('store_state', '<label for="store_state">'.__('Store State' , 'store_state' ).'</label>' , 'my_general_settings_field_store_state_html', 'general');
}

function my_general_settings_field_store_state_html()
{
    $value = get_option( 'store_state', '' );
    echo '<input type="text" id="store_state" name="store_state" value="' . $value . '" />';
}

function my_general_settings_register_sunday_hours_load()
{
    register_setting('general', 'sunday_hours', 'esc_attr');
    add_settings_field('sunday_hours', '<label for="sunday_hours">'.__('Sunday Hours' , 'sunday_hours' ).'</label>' , 'my_general_settings_field_sunday_hours_html', 'general');
}

function my_general_settings_field_sunday_hours_html()
{
    $value = get_option( 'sunday_hours', '' );
    echo '<input type="text" id="sunday_hours" name="sunday_hours" value="' . $value . '" />';
}

function my_general_settings_register_monday_hours_load()
{
    register_setting('general', 'monday_hours', 'esc_attr');
    add_settings_field('monday_hours', '<label for="monday_hours">'.__('Monday Hours' , 'monday_hours' ).'</label>' , 'my_general_settings_field_monday_hours_html', 'general');
}

function my_general_settings_field_monday_hours_html()
{
    $value = get_option( 'monday_hours', '' );
    echo '<input type="text" id="monday_hours" name="monday_hours" value="' . $value . '" />';
}

function my_general_settings_register_tuesday_hours_load()
{
    register_setting('general', 'tuesday_hours', 'esc_attr');
    add_settings_field('tuesday_hours', '<label for="tuesday_hours">'.__('Tuesday Hours' , 'tuesday_hours' ).'</label>' , 'my_general_settings_field_tuesday_hours_html', 'general');
}

function my_general_settings_field_tuesday_hours_html()
{
    $value = get_option( 'tuesday_hours', '' );
    echo '<input type="text" id="tuesday_hours" name="tuesday_hours" value="' . $value . '" />';
}

function my_general_settings_register_wednesday_hours_load()
{
    register_setting('general', 'wednesday_hours', 'esc_attr');
    add_settings_field('wednesday_hours', '<label for="wednesday_hours">'.__('Wednesday Hours' , 'wednesday_hours' ).'</label>' , 'my_general_settings_field_wednesday_hours_html', 'general');
}

function my_general_settings_field_wednesday_hours_html()
{
    $value = get_option( 'wednesday_hours', '' );
    echo '<input type="text" id="wednesday_hours" name="wednesday_hours" value="' . $value . '" />';
}

function my_general_settings_register_thursday_hours_load()
{
    register_setting('general', 'thursday_hours', 'esc_attr');
    add_settings_field('thursday_hours', '<label for="thursday_hours">'.__('Thursday Hours' , 'thursday_hours' ).'</label>' , 'my_general_settings_field_thursday_hours_html', 'general');
}

function my_general_settings_field_thursday_hours_html()
{
    $value = get_option( 'thursday_hours', '' );
    echo '<input type="text" id="thursday_hours" name="thursday_hours" value="' . $value . '" />';
}

function my_general_settings_register_friday_hours_load()
{
    register_setting('general', 'friday_hours', 'esc_attr');
    add_settings_field('friday_hours', '<label for="friday_hours">'.__('Friday Hours' , 'friday_hours' ).'</label>' , 'my_general_settings_field_friday_hours_html', 'general');
}

function my_general_settings_field_friday_hours_html()
{
    $value = get_option( 'friday_hours', '' );
    echo '<input type="text" id="friday_hours" name="friday_hours" value="' . $value . '" />';
}

function my_general_settings_register_saturday_hours_load()
{
    register_setting('general', 'saturday_hours', 'esc_attr');
    add_settings_field('saturday_hours', '<label for="saturday_hours">'.__('Saturday Hours' , 'saturday_hours' ).'</label>' , 'my_general_settings_field_saturday_hours_html', 'general');
}

function my_general_settings_field_saturday_hours_html()
{
    $value = get_option( 'saturday_hours', '' );
    echo '<input type="text" id="saturday_hours" name="saturday_hours" value="' . $value . '" />';
}
