<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.0.1' );

//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
}

//* Enqueue jquery
wp_enqueue_script("jquery");

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 115 ) );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add support for Genesis Connect for WooCommerce
add_theme_support( 'genesis-connect-woocommerce' );

//* Register sidebars
if (function_exists('register_sidebars')) {
    register_sidebars(4, array('name' => 'Meat %d'));
    register_sidebars(1, array('name' => 'Pledge'));
    register_sidebars(3, array('name' => 'Mission %d'));
    register_sidebars(2, array('name' => 'Current %d'));
}

//* Include pledge.php
add_action( 'genesis_header', 'include_pledge' );
function include_pledge() {
	if ( !is_user_logged_in() ) {
    	require(CHILD_DIR.'/pledge.php');
	} else {
  		require(CHILD_DIR.'/call.php');
	}
}
//* Teams Map include 
add_action( 'genesis_before_content_sidebar_wrap', 'include_googlemap' );
function include_googlemap() {
	if (is_page( 695 )) {
		require(CHILD_DIR.'/map.php');
	}
}
//* Homepage include
add_action( 'genesis_before_content', 'include_home' );
function include_home() {
	if ( is_front_page() ) {
		require(CHILD_DIR.'/count.php');
		if ( !is_user_logged_in() ) {
			require(CHILD_DIR.'/meat.php');
		}
	}
}
//* Include meat.php
add_action( 'genesis_after_content', 'include_meat' );
function include_meat() {
	if ( !is_front_page() ) {
		if ( !is_user_logged_in() ) {
			require(CHILD_DIR.'/meat.php');
		} else {
			require(CHILD_DIR.'/mission.php');
		}
	}
}

//* Include sign.php 
add_action( 'genesis_before_footer', 'include_sign' );
function include_sign() {
	if ( !is_front_page() ) {
		require(CHILD_DIR.'/count.php');
		require(CHILD_DIR.'/topteams.php');
	}
	if ( is_front_page() ) {
		require(CHILD_DIR.'/promo.php');
		require(CHILD_DIR.'/topteams.php');
	}
	if ( !is_user_logged_in() ) {
  		require(CHILD_DIR.'/sign.php');
	}
  	require(CHILD_DIR.'/share.php');
}

//* Include teamsmap.php
add_action('bp_after_directory_groups', 'include_map' );
function include_map() {
  		require(CHILD_DIR.'/teamsmap.php');
}

//* Include script.php and quiz
add_action( 'genesis_after', 'include_script' );
function include_script() {
    require(CHILD_DIR.'/script.php');
//    require(CHILD_DIR.'/quiz.php');
}

//* Correct tag cloug title for BP Group Tags
function my_tag_text_callback( $count ) {
	//This function is used to replace the "topic" with "club" for the tag cloud. When you hover mouse over a tag value, it
	//would normally say "1 topic". Now it will say "1 club".
 return sprintf( _n('%s team', '%s teams', $count), number_format_i18n( $count ) );
}

//* Set fields for Profile Progression
function edit_progression_point_for_field_2($item){ 
	$item['points']=0; 
	return $item; 
} 
add_filter('bppp_register_progression_point_profile-field-2',edit_progression_point_for_field_2);

function edit_progression_point_for_field_555($item){ 
	$item['points']=0; 
	return $item; 
} 
add_filter('bppp_register_progression_point_profile-field-555',edit_progression_point_for_field_555);

function edit_progression_point_for_field_557($item){ 
	$item['points']=0; 
	return $item; 
} 
add_filter('bppp_register_progression_point_profile-field-557',edit_progression_point_for_field_557);

function bppp_custom_function_avatar_register_point(){ bppp_register_progression_point( 'avatar', 'bppp_custom_function_check_user_has_avatar', 1 ); }

function bppp_custom_function_check_user_has_avatar(){ 
$user_id = bppp_get_user_id(); $has_avatar = ( bp_core_fetch_avatar( array( 'item_id' => $user_id, 'no_grav' => true,'html'=> false ) ) != bp_core_avatar_default() ); 
return (bool)$has_avatar; } 

add_action('bppp_register_progression_points','bppp_custom_function_avatar_register_point');


//* Accept SVG uploads to media library
function custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter( 'upload_mimes', 'custom_mtypes' );

//* Join user to group A whenever...
function join_A(){
	if(is_user_logged_in()){
		$user_id = get_current_user_id();
		Groups_User_Group::create( array( 'user_id' => $user_id, 'group_id' => 5 ) );
	}
}
add_action( 'gform_after_submission_15', 'join_A' );

//* Join user to group B whenever...
function join_B(){
	if(is_user_logged_in()){
		$user_id = get_current_user_id();
		Groups_User_Group::create( array( 'user_id' => $user_id, 'group_id' => 6 ) );
	}
}
add_action( 'gform_after_submission_3', 'join_B' );

//* Join user to Champions group whenever...
function join_champions(){
	if(is_user_logged_in()){
		$user_id = get_current_user_id();
		groups_accept_invite( $user_id, 4 );
		Groups_User_Group::create( array( 'user_id' => $user_id, 'group_id' => 2 ) );
	}
}
add_action( 'gform_after_submission_5', 'join_champions' );