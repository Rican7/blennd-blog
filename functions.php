<?php

// Set values
$numberOfSidebarWidgets = 2;
$postThumbMaxWidth = 480;
$postThumbMaxHeight = 9999;
$postCropMode = false;

// Post thumbnail
remove_filter('template_redirect', 'redirect_canonical');
add_theme_support('post-thumbnails', array('post'));
set_post_thumbnail_size($postThumbMaxWidth, $postThumbMaxHeight, $postCropMode);


// Sidebar functions
//

// Create sidebars

// Sidebar widget area
if (function_exists('register_sidebar')) {
	register_sidebar(
		array(
			'name' => 'Sidebar Widget',
			'before_widget' => '<section class="widget %2$s">',
			'after_widget' => '</div></section>',
			'before_title' => '<header><h1>',
			'after_title' => '</h1></header><div class="widget-content">',
		)
	);
}

// Footer widgets
if (function_exists('register_sidebar')) {
	register_sidebar(
		array(
			'name' => 'Left Footer Widget',
			'before_widget' => '<section class="widget %2$s first">',
			'after_widget' => '</section>',
			'before_title' => '<header><h1>',
			'after_title' => '</h1></header>',
		)
	);
	register_sidebar(
		array(
			'name' => 'Middle Footer Widget',
			'before_widget' => '<section class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<header><h1>',
			'after_title' => '</h1></header>',
		)
	);
	register_sidebar(
		array(
			'name' => 'Right Footer Widget',
			'before_widget' => '<section class="widget %2$s last">',
			'after_widget' => '</section>',
			'before_title' => '<header><h1>',
			'after_title' => '</h1></header>',
		)
	);
}

//
// End Sidebar functions


// Featured image in RSS feeds
function insertThumbnailRSS($content) {
	global $post;

	if ( has_post_thumbnail( $post->ID ) ){
		$content = '' . get_the_post_thumbnail( $post->ID, 'medium' ) . '' . $content;
	}

	return $content;
}

add_filter('the_excerpt_rss', 'insertThumbnailRSS');
add_filter('the_content_feed', 'insertThumbnailRSS');

function cur_date_shortcode($atts) {
	extract(shortcode_atts(array(
		'year' => true,
		'month' => false,
		'date' => false,
	), $atts));

	if ($year) {
		return date('Y');
	}
	elseif ($month) {
		return date('F');
	}
	elseif ($date) {
		return date('j');
	}
}
add_shortcode('cur_date', 'cur_date_shortcode');

// Add the ability to reference shortcodes in the text widget
add_filter('widget_text','do_shortcode');

?>
