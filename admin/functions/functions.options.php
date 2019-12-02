<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_title;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");   

	       
		//Access the WordPress Pages via an Array
		$of_pages	= array();
		$of_pages_obj= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_title; }
		$pages_tmp = array_unshift($of_pages, "None"); 			
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads= get_option('of_uploads');
		$other_entries= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos	= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
		
		//body background position
		$of_options_position = array("left" => "Left","center" => "Center","right" => "Right"); 
		
		//body background repeat
		$of_options_repeat = array("no-repeat" => "No Repeat","repeat" => "Repeat","repeat-x" => "Repeat Horizontally","repeat-y" => "Repeat Vertically"); 
		
		$of_options_display_type = array("slider" => "Slider", "video" => "Video", "image" => "Parallax Image", "bgimage" => "Image" ,"bgcolor" => "Color");
		
		//body background attachment
		$of_options_attachment = array("scroll" => "Scroll","fixed" => "Fixed");
		
		//Access all menus created by user
		$menus = get_terms('nav_menu');
		$menu_counter = 0; // checks if there is a menu created
		$of_options_select_menu = array();
		foreach($menus as $menu){
			$menu_counter++;
			$of_options_select_menu[]  = $menu->name;
		} 
		
		//get all categories
		$category_args = array(
			'type' => 'post',
			'child_of' => 0,
			'parent' => '',
			'orderby' => 'name',
			'order' => 'ASC',
			'hide_empty' => 0,
			'hierarchical' => 1,
			'exclude' => '',
			'include' => '',
			'number' => '',
			'taxonomy' => 'category',
			'pad_counts' => false 
		);
		$categories = get_categories($category_args);
		$of_options_select_categories = array();
		$of_options_select_categories[] = 'All';
		foreach($categories as $category){
			$of_options_select_categories[]  = $category->name;
		}
		
		$page_menu_positions = array(
			"top" => "Top",
			"bottom" => "Bottom"
		);


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


//General Settings

$of_options[] = array( 	"name"=> "General Settings",
	"type"=> "heading"
);

$of_options[] = array( 	"name"=> "Favicon",
	"desc"=> "Upload favicon here.",
	"id"=> "favicon",
	// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
	"std"=> "",
	"type"=> "upload"
);

$of_options[] = array( 	"name"=> "Mainguard Logo",
	"desc"=> "Upload logo here. If empty, the sitename will display.",
	"id"=> "logo",
	"std"=> "",
	"type"=> "upload"
);

$of_options[] = array( 	"name"=> "Matrimony Logo",
	"desc"=> "Upload logo here. If empty, the sitename will display.",
	"id"=> "logo_2",
	"std"=> "",
	"type"=> "upload"
);

$of_options[] = array( 	"name"=> "Sticky Logo",
	"desc"=> "Upload logo here. If empty, the sitename will display.",
	"id"=> "sticky_logo",
	"std"=> "",
	"type"=> "upload"
);

$of_options[] = array( 	"name"=> "Logo Tagline",
	"desc"=> "Upload file.",
	"id"=> "logo_tagline",
	"std"=> "",
	"type"=> "upload"
);

$of_options[] = array( 	"name"=> "Header Image",
	"desc"=> "Upload file.",
	"id"=> "header_img",
	"std"=> "",
	"type"=> "upload"
);

//Banner
$of_options[] = array( 	"name"=> "Homepage Settings",
	"type"=> "heading"
);


$of_options[] = array( 	"name" => "Tagline",
	"desc" =>"Insert heading.",
	"id" 		=> "tagline",
	"std" 		=> "",
	"type" 		=> "textarea");



$of_options[] = array( 	"name"=> "Footer Settings",
	"type"=> "heading"
);

// $of_options[] = array( 	"name"=> "Footer Logo Light",
// 	"desc"=> "Upload logo here.",
// 	"id"=> "footer_logo_light",
// 	// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
// 	"std"=> "",
// 	"type"=> "upload"
// );

// $of_options[] = array( 	"name"=> "Footer Logo Dark",
// 	"desc"=> "Upload logo here.",
// 	"id"=> "footer_logo_dark",
// 	// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
// 	"std"=> "",
// 	"type"=> "upload"
// );

$of_options[] = array( 	"name" => "Footer Link",
	"desc" =>"",
	"id" 		=> "footer_link",
	"std" 		=> "",
	"type" 		=> "textarea");

$of_options[] = array( 	"name" => "Footer Text",
	"desc" =>"",
	"id" 		=> "footer_text",
	"std" 		=> "",
	"type" 		=> "textarea");

$of_options[] = array( 	"name" => "Facebook Link",
	"desc" =>"",
	"id" 		=> "facebook_link",
	"std" 		=> "",
	"type" 		=> "text");

$of_options[] = array( 	"name" => "Linkedin Link",
	"desc" =>"",
	"id" 		=> "linkedin_link",
	"std" 		=> "",
	"type" 		=> "text");

$of_options[] = array( 	"name" => "Twitter Link",
	"desc" =>"",
	"id" 		=> "twitter_link",
	"std" 		=> "",
	"type" 		=> "text");


	}//End function: of_options()
}//End chack if function exists: of_options()
?>
