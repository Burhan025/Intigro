<?php 


// THIS INCLUDES THE THUMBNAIL IN OUR RSS FEED
function insertThumbnailRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '<a href="' . get_permalink( $thumbnail->ID ) . '">'. get_the_post_thumbnail( $post->ID, 'medium', array( 'alt' => get_the_title(), 'title' => get_the_title(), 'style' => 'float:none; min-height: auto !important; height: auto !important; margin:0 0 10px 15px; display:block !important; max-width:600px;', 'align' => 'center' ) ) . '</a>';
$content .= pov_excerpt( get_the_excerpt(), '300');
} else {
$content = pov_excerpt( get_the_excerpt(), '300');
}
return $content;
}
add_filter('the_excerpt_rss', 'insertThumbnailRSS');
add_filter('the_content_feed', 'insertThumbnailRSS'); 



add_action( 'admin_init', 'hide_editor' );

function hide_editor() {
	// Get the Post ID.
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if( !isset( $post_id ) ) return;

	
 $homepgname = get_the_title($post_id);
  if($homepgname == 'Home'){ 
    remove_post_type_support('page', 'editor');
  }
}


// Generate active class for categories when viewing single posts
  // Props to Sam Nabi http://samnabi.com/blog/highlight-the-current-category-for-single-posts-in-wordpress
  function singlePostActiveCat ($CatText) {
     global $post;
     if (is_singular()) {
		 
		 
		 
       $categories = wp_get_post_categories($post->ID);
       foreach ($categories as $category_id) {
        $category = get_category($category_id);
		
		$cat = get_the_category();
	$cat_id = $cat[0]->cat_ID;
		 
		
		if ($cat_id ==  $category_id) {
        $CatText = preg_replace(
           "/class=\"(.*)\"><a ([^<>]*)>$category->name<\/a>/",
           ' class="$1 active"><a $2>' . $category->name . '</a>',
        $CatText);
		}
		}
     }
  return $CatText;
  }
  add_filter('wp_list_categories', 'singlePostActiveCat');


/*add_action("gform_pre_submission", "pre_submission_handler");
function pre_submission_handler($form){
//	$numdays = (int)$_POST["input_1"];

$_POST["input_2"] = date('m-d-Y',strtotime($_POST["input_2"] . "+" .  $_POST["input_1"] . " days"));
}


add_filter("gform_mailchimp_field_value", "change_birthday", 10, 4);
function change_birthday($value, $form_id, $field_id, $entry){

$rem_date = strtotime('m-d-Y',$_POST["input_2"]);
$rem_date = strtotime('m-d-Y', $rem_date . "+" .  $_POST["input_1"] . " days");

	// $month = date("m",strtotime($rem_date)); //get month
	// $day = date("d",strtotime($rem_date)); //get day
	$rem_date = date('m-d-Y',strtotime($rem_date)); //build date into format needed by MailChimp
	return $rem_date;		
}
*/


/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/	
/* Start Child Admin Only Functions
/*-----------------------------------------------------------------------------------*/	
/*-----------------------------------------------------------------------------------*/	

if (is_admin()) {
	
	// ENABLE FONT SELECTION IN WYSIWYG
function add_font_selection_to_tinymce($buttons) {
    array_push($buttons, 'fontselect');
	return $buttons;
}

add_filter('mce_buttons', 'add_font_selection_to_tinymce');
	

// SET SPECIFIC FONT SIZES IN THE ADMIN WYSIWYG EDITOR
function customize_text_sizes($initArray){
   $initArray['theme_advanced_font_sizes'] = "10px,12px,14px,16px,18px,20px,22px,24px,26px,28px,29px,30px,32px,48px";
   return $initArray;
}
add_filter('tiny_mce_before_init', 'customize_text_sizes');



function make_mce_awesome( $init ) {
    $init['theme_advanced_text_colors'] = '617c89,bf412f,707174,d2c23b,93a24b,785c44,d5d4b6';
	

    return $init;
}
 
add_filter('tiny_mce_before_init', 'make_mce_awesome');	
	
	
	
/*-----------------------------------------------------------------------------------*/		
// VISUALLY LOAD FONTS IN WYSIWYG EDITOR
/*-----------------------------------------------------------------------------------*/	

function load_tiny_mce() {
	
	$theme_advanced_fonts = 'MontserratBold=MontSerratBold, Georgia;';
	$theme_advanced_fonts .= 'Montserrat=Montserrat, Times;';
	$theme_advanced_fonts .= 'Merriweather=Merriweather, Georgia;';
	$theme_advanced_fonts .= 'RobotoCondensed=RobotoCondensed, sans-serif;';
	$theme_advanced_fonts .= 'OpenSans=OpenSans, sans-serif;';
	
    // Default fonts for TinyMCE
    $theme_advanced_fonts  .= 'Andale Mono=Andale Mono, Times;';
    $theme_advanced_fonts .= 'Arial=Arial, Helvetica, sans-serif;';
    $theme_advanced_fonts .= 'Book Antiqua=Book Antiqua, Palatino;';
    $theme_advanced_fonts .= 'Courier New=Courier New, Courier;';
    $theme_advanced_fonts .= 'Helvetica=Helvetica;';
    $theme_advanced_fonts .= 'Impact=Impact, Chicago;';
    $theme_advanced_fonts .= 'Tahoma=Tahoma, Arial, Helvetica, sans-serif;';
    $theme_advanced_fonts .= 'Times New Roman=Times New Roman, Times;';
    $theme_advanced_fonts .= 'Trebuchet MS=Trebuchet MS, Geneva;';
    $theme_advanced_fonts .= 'Verdana=Verdana, Geneva;';
     
	
	$content_css =  home_url('/wp-content/themes/thrive/fonts/montserrat-bold.css') .',';
	$content_css .=  home_url('/wp-content/themes/thrive/fonts/montserrat_stylesheet.css') .',';
	$content_css .=  home_url('/wp-content/themes/thrive/fonts/merriweather_stylesheet.css') .',';
	$content_css .=  home_url('/wp-content/themes/thrive/fonts/robotocondensed-regular-stylesheet.css') .',';
	$content_css .=  home_url('/wp-content/themes/thrive/fonts/OpenSans-Regular.css') .',';
	$content_css .= home_url('/wp-content/themes/thrive/css/style.css'). ',';
	$content_css .= home_url('/wp-content/themes/child-theme/css/child.css'). ',';
	 $content_css .= home_url('/wp-content/themes/thrive/css/editor-style.php');
	 
	wp_tiny_mce(false, array(
		'theme_advanced_fonts' => $theme_advanced_fonts,
		'content_css' => $content_css
	));

}
add_action('admin_head', 'load_tiny_mce');

/*-----------------------------------------------------------------------------------*/	
//Admin Styling 
/*-----------------------------------------------------------------------------------*/	


function hide_menus() {
global $post;
	echo '<style type="text/css">.widefat #override {display:none; !important;}';
	
if (current_user_can('editor')) {
	echo '#revisionsdiv {display:block !important;} #yoast_db_widget, #descriptiondiv, #linkcategorydiv, #linktargetdiv, #linkxfndiv, #linkadvanceddiv, .menu-icon-tools, #gallery-settings, #menu-appearance,';
	echo '#wpseo_meta, #postcustom, #postexcerpt, #acx_plugin_dashboard_widget, #pb_backupbuddy, .menu-icon-settings, #cpt_info_box, #cart66_feature_level_meta, .tagcloud, .update-nag, #toplevel_page_w3tc_dashboard, #toplevel_page_better-wp-security,';
	echo '#yoast_db_widget, .toplevel_page_rs-post-restrictions, .toplevel_page_rs-post-roles, #tribe-filters, #slidedeck-sidebar, #tribe_dashboard_widget, #event_cost, #eventBritePluginPlug, #event_organizer,';	
	echo '.overview-options, #callout-sidebar, .callout-button, .slide-convert-vertical, .slide-background-url, .mce_slidedeck, .menu_acf, #menu-plugins, #edit-box-ppr, #content_wp_help, #wp-admin-bar-w3tc-modules, #wp-admin-bar-w3tc-faq, #wp-admin-bar-w3tc-support,';	
	echo '#content_wp_help, .mce_wp_more, #content_wp_help, #menu-links, #toplevel_page_edit-post_type-acf, #thrive-preview, .toplevel_page_thrivethemes, #my-meta-box, #menu-comments,#toplevel_page_wpseo_dashboard, #toplevel_page_redirect-options, #toplevel_page_thethefly, #menu-posts-slider, #mandrill_widget ';
	echo '{display:none; !important;}';
} else {
    echo '#revisionsdiv {display:block !important;} ';
	echo '#yoast_db_widget, #yoast_db_widget, #slidedeck-sidebar, #cpt_info_box, .widefat #override, #slidedeck-sidebar, #tribe_dashboard_widget,';
	echo '#content_wp_help, #menu-links, #thrive-preview '; 
	echo '{display:none;}';
}
	echo '</style>';
}
add_action('admin_head', 'hide_menus');


function my_theme_add_editor_styles() {
    add_editor_style( '/css/custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


}//End is_admin()

/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/	
/* Start Child FrontEnd Only Functions
/*-----------------------------------------------------------------------------------*/	
/*-----------------------------------------------------------------------------------*/	


if (!is_admin()) {
/*	
	// LOAD EXTERNAL CHILD THEME SPECIFIC LINKS (Properly hosted Javascript, Google Fonts) 

function load_external_links() {
	
	// EXAMPLES:
	// Load Oswald Regular Font
	wp_register_style('Oswald-Regular', home_url('/wp-content/themes/child-theme/fonts/Oswald-Regular.css'));
	wp_enqueue_style( 'Oswald-Regular');
	
	
	//Load Ubunto Bold Font
	wp_register_style('Ubuntu-Bold', home_url('/wp-content/themes/child-theme/fonts/Ubuntu-Bold.css'));
	wp_enqueue_style( 'Ubuntu-Bold');
}

*/


//Load Montserrat Bold & Regular Fonts
	wp_register_style('Montserrat-Bold', home_url('/wp-content/themes/thrive/fonts/montserrat-bold.css'));
	wp_enqueue_style( 'Montserrat-Bold');
	
	wp_register_style('Montserrat-Regular', home_url('/wp-content/themes/thrive/fonts/montserrat_stylesheet.css'));
	wp_enqueue_style( 'Montserrat-Regular');
	
	wp_register_style('Merriweather', home_url('/wp-content/themes/thrive/fonts/merriweather_stylesheet.css'));
	wp_enqueue_style( 'Merriweather');
	
	wp_register_style('Roboto-Condensed', home_url('/wp-content/themes/thrive/fonts/robotocondensed-regular-stylesheet.css'));
	wp_enqueue_style( 'Roboto-Condensed');
	
	wp_register_style('OpenSans-Regular', home_url('/wp-content/themes/thrive/fonts/OpenSans-Regular.css'));
	wp_enqueue_style( 'OpenSans-Regular');
	

/*-----------------------------------------------------------------------------------*/	
//Load Theme Styles
/*-----------------------------------------------------------------------------------*/	

function child_theme_stylesheets() {
		
	//Child Theme Scripts	
	wp_register_style('child', home_url('/wp-content/themes/child-theme/css/child.css'), array('style','shortcodes')); 
	wp_enqueue_style('child');
	
	wp_register_style('mediaqueries', home_url('/wp-content/themes/child-theme/css/mediaqueries.css'), array('style','child','shortcodes','mobile'));									 	wp_enqueue_style('mediaqueries');
	
}

add_action( 'wp_enqueue_scripts', 'child_theme_stylesheets' );



}//END !is_admin()


/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/	
/* Start Child Admin & FrontEnd Only Functions
/*-----------------------------------------------------------------------------------*/	
/*-----------------------------------------------------------------------------------*/	

// Show ALL POSTS on Archive pages - GW
function custom_posts_per_page( $query ) {
    if ( $query->is_archive() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', '-1' );
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );