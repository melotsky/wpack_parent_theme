<?php 
if ( !defined('ABSPATH')) exit;


/************************************/
// REMOVE OTHER PLUGIN ON DASHBOARD / START
/************************************/

function remove_dashboard_widgets(){

	global$wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

/************************************/
// REMOVE OTHER PLUGIN ON DASHBOARD / START
/************************************/

/************************************/
// REMOVE OTHER ELEMENTS THAT NEEDS TO HIDE / START
/************************************/
function wps_admin_bar() {
	
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('updates');
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('new-content');
	$wp_admin_bar->remove_menu('wporg');
	//$wp_admin_bar->remove_menu('view-site');
	
}

add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

/************************************/
// REMOVE OTHER ELEMENTS THAT NEEDS TO HIDE / START
/************************************/

/************************************/
// ADD CLASS FPR NEXT AND PREV LINK / START
/************************************/
function add_class_next_post_link($html){
	$html = str_replace('<a','<a class="next"',$html);
	return $html;
}

function add_class_previous_post_link($html){
	$html = str_replace('<a','<a class="prev"',$html);
	return $html;
}

add_filter('next_post_link','add_class_next_post_link',10,1);
add_filter('previous_post_link','add_class_previous_post_link',10,1);

/************************************/
// ADD CLASS FPR NEXT AND PREV LINK / START
/************************************/

/************************************/
// ADD CATEGORY ID IN BODY AND POST CLASS / START
/************************************/
function category_id_class($classes) {
	
	global $post;
	foreach((get_the_category($post->ID)) as $category)
	
		$classes [] = 'cat-' . $category->cat_ID . '-id';
		return $classes;
		
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');

/************************************/
// ADD CATEGORY ID IN BODY AND POST CLASS / end
/************************************/

/************************************/
// LOGIN LOGO / START
/************************************/
function custom_login_logo() {
	
	$image = get_field('logo_for_login_admin', 'option');
	$url = $image['url'];
	$width = $image['width'];
	$height = $image['height'];

	echo '<style type="text/css">
	h1 a { background-image: url('. $url .') !important; 
    background-position: center top !important;
    background-repeat: no-repeat !important;
    background-size: '. $width.'px '. $height.'px !important;
    display: block !important;
    height: '. $height.'px !important;
    margin: 0 auto !important;
    overflow: hidden !important;
    padding-bottom: 0 !important;
    text-indent: -9999px !important;
    width: '. $width.'px !important;
	}
	body.login {background: none repeat scroll 0 0 #FFFFFF;}';
	
	settype($width, "integer"); 
		if( $width >= 320 ){
				echo 'body #login{width: '. $width.'px !important;}';	
			}
	echo '</style>'; 
	
}

add_action('login_head', 'custom_login_logo');

/************************************/
// LOGIN LOGO / END
/************************************/

/************************************/
// LINK OF DEVELOPER AT THE BOTTOM OF ADMIN AREA / START
/************************************/
function custom_admin_footer() {
	echo '<a target="_blank" href="http://www.cumuluseo.com" rel="nofollow">Website Designed & Developed by Cumuluseo.com</a>';
} 
add_filter('admin_footer_text', 'custom_admin_footer');
/************************************/
// LINK OF DEVELOPER AT THE BOTTOM OF ADMIN AREA / START
/************************************/

/************************************/
// ATTACHED CSS ON ADMIN AREA / START
/************************************/
function pro(){
	if (is_admin()) {
		wp_register_style( 'pro-style', get_template_directory_uri(). '/assets/css/mini.css', 'all' );
		wp_enqueue_style( 'pro-style' );
	}
}
add_action('init', 'pro');

/************************************/
// ATTACHED CSS ON ADMIN AREA / END
/************************************/	

/************************************/
// REMOVE HELP AFTER THE ADMIN BAR IN ADMIN AREA / START
/************************************/
function wpse50723_remove_help($old_help, $screen_id, $screen){
	$screen->remove_help_tabs();
	return $old_help;
}

add_filter( 'contextual_help', 'wpse50723_remove_help', 999, 3 );
/************************************/
// REMOVE HELP AFTER THE ADMIN BAR IN ADMIN AREA / END
/************************************/

/************************************/
// TITLE CONTROLLER / START
/************************************/
function mayer_wp_title( $title, $sep ) {
	global $paged, $page;
		if ( is_feed() ) {
			return $title;
		}

	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_description";
		}

		if ( $paged >= 2 || $page >= 2 ) {
			$title = sprintf( __( 'Page %s', 'mayer' ), max( $paged, $page ) ) . " $sep $title";
		}
	return $title;
}

add_filter( 'wp_title', 'mayer_wp_title', 10, 2 );
/************************************/
// TITLE CONTROLLER / END
/************************************/

/************************************/
// GET THE CURRENT URL OF THE PAGE / START
/************************************/
function curPageURL() {
	$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {
				$pageURL .= "s";
		}
	$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		}else{
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
	return $pageURL;
}
/************************************/
// GET THE CURRENT URL OF THE PAGE / END
/************************************/

/************************************/
// DETECTOR / START
/************************************/
function mv_browser_body_class($classes) {
	
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone, $is_edge;
	if($is_lynx) $classes[] = 'lynx';
		elseif($is_gecko) $classes[] = 'firefox';
		elseif($is_opera) $classes[] = 'opera';
		elseif($is_NS4) $classes[] = 'ns4';
		elseif($is_safari) $classes[] = 'safari';
		elseif($is_chrome) $classes[] = 'chrome';
		elseif($is_edge) $classes[] = 'edge';
		elseif($is_IE) {
			$classes[] = 'ie';
			if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
				$classes[] = 'ie'.$browser_version[1];
			} else $classes[] = 'unknown';
		if($is_iphone) $classes[] = 'iphone';
		if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
				$classes[] = 'osx';
			}elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
				$classes[] = 'linux';
			} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
				$classes[] = 'windows';
			}
	return $classes;
}
add_filter('body_class','mv_browser_body_class');

/************************************/
// DETECTOR / START
/************************************/

/************************************/
// REMOVE JUNK ON HEADER / START
/************************************/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
/************************************/
// REMOVE JUNK ON HEADER / END
/************************************/

/************************************/
// FIXED OUTPUT OF IMAGE / START
/************************************/
function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');
/************************************/
// FIXED OUTPUT OF IMAGE / END
/************************************/

/************************************/
// REMOVE IMAGE TITLE ATTRIBUTE / START
/************************************/
function mytheme_wp_get_attachment_image_attributes( $attr ) {

	unset($attr['title']);
	return $attr;

}

//add_filter( 'wp_get_attachment_image_attributes', 'mytheme_wp_get_attachment_image_attributes' );

/************************************/
// REMOVE IMAGE TITLE ATTRIBUTE / END
/************************************/


/************************************/
// SHORTENT THE TEXT / START
/************************************/
function ShortenText($text) {
	$chars_limit = 40; // Character length
	$chars_text = strlen($text);
	$text = $text." ";
	$text = substr($text,0,$chars_limit);
	$text = substr($text,0,strrpos($text,' '));
	
	if ($chars_text > $chars_limit) {
		$text = $text."..."; // Ellipsis
    }
    
    return $text;
}
//output:  echo ShortenText(get_the_title()); 

/************************************/
// SHORTENT THE TEXT / END
/************************************/



/**
 * remove the query strings
 */
function _remove_script_version( $src ){
   $parts = explode( '?ver', $src );
   return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


/**
* change the default image optimizer quality
**/
add_filter( 'jpeg_quality', create_function( '', 'return 70;' ) );

/************************************/
// REDIRECT THE USER WHEN TRYING TO ACCESS IN FRONT END START
/************************************/
function author_page_redirect() {
    if ( is_author() ) {
        wp_redirect( home_url() );
    }
    if ( is_category() ) {
        wp_redirect( home_url() );
    }
}
//add_action( 'template_redirect', 'author_page_redirect' );
/************************************/
// REDIRECT THE USER WHEN TRYING TO ACCESS IN FRONT END END
/************************************/

/************************************/
// DISABLE COMMENTS ON MEDIA PAGE START
/************************************/
function filter_media_comment_status( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );
/************************************/
// DISABLE COMMENTS ON MEDIA PAGE END
/************************************/


/************************************/
// GET DOMAIN NAME ONLY START
/************************************/

function getDomain($url){
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if(preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)){
        return $regs['domain'];
    }
    return FALSE;
}

//sample
/* $theUrl = get_site_url() ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo getDomain($theUrl);?></a> */
//echo getDomain("http://example.com"); // outputs 'example.com'
//echo getDomain("http://www.example.com"); // outputs 'example.com'

/************************************/
// GET DOMAIN NAME ONLY START
/************************************/


// FOR EVERLIGHT ONLY
// ENABLE THE CODE BELOW BUT MAKE SURE YOU ENABLE THE EVELIGHT_MOD.JS IN JS LOADER OF THE THIS CHILD THEME
//wp_dequeue_script( 'everlightbox' );
//wp_deregister_script( 'everlightbox' );


// 	GENERATE RANDOM STRING
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
// EG: echo generateRandomString(); or $var = generateRandomString();


/************************************/
// GET THE ID OF THE IMAGE URL USING THIS FUNCTION.. START
/************************************/
function pippin_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}
//SAMPPLES
/**
set the image url
$image_url = 'http://yoursite.com/wp-content/uploads/2011/02/14/image_name.jpg';
 
store the image ID in a var
$image_id = pippin_get_image_id($image_url);
 
retrieve the thumbnail size of our image
$image_thumb = wp_get_attachment_image_src($image_id, 'thumbnail');
 
display the image
echo $image_thumb[0];
**/
/************************************/
// END
/************************************/


/************************************/
// ADD FEATURED IMAGE FOR BLOG POST / START
/************************************/
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_post_type_support( 'page', 'excerpt' );
/************************************/
// ADD FEATURED IMAGE FOR BLOG POST / END
/************************************/

//DISABLE THE ERRORS IN PHP
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );




/**
 * Change the length of excerpt
 */
function my_excerpt_length($length){
	return 50;
}
add_filter('excerpt_length', 'my_excerpt_length');

/**
 * Change the end of excerpt
 */
function alx_excerpt_more( $more ) {
    return '&nbsp;&#46;&#46;&#46;';
}
add_filter( 'excerpt_more', 'alx_excerpt_more' );

/**
 * Remove the sticky post on blog summary page
 */
function remove_sticky_on_blogsummary_page($qry) {
	if (is_front_page()) {
	  $qry->set('post__not_in',get_option( 'sticky_posts' ));
	}
}
//add_action('pre_get_posts','remove_sticky_on_blogsummary_page');


// Echo string concutination
//eg: _e( string_cut( $target_excerpt, 150) );
function string_cut($string, $count){
	$string = strip_tags($string);
	if (strlen($string) > $count) {
	
		// truncate string
		$stringCut = substr($string, 0, $count);
		$endPoint = strrpos($stringCut, '');
	
		//if the string doesn't contain any space then it will cut without word basis.
		$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
		$string .= "...";
	}
	return $string;	
}