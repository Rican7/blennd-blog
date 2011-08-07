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

// Top sidebar widget
if (function_exists('register_sidebar')) {
	register_sidebar(
		array(
			'name' => 'Sidebar Widget',
			'before_widget' => '<section class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<header><h1>',
			'after_title' => '</h1></header>',
		)
	);
}

// Multiple sidebar widgets
if (function_exists('register_sidebars')) {
	register_sidebars(
		$numberOfSidebarWidgets,
		array(
			'name' => 'Sidebar Widget %d',
			'before_widget' => '<section class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<header><h1>',
			'after_title' => '</h1></header>',
		)
	);
}

// Footer widgets
if (function_exists('register_sidebar')) {
	register_sidebar(
		array(
			'name' => 'Left Footer Widget',
			'before_widget' => '<section class="widget %2$s">',
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
			'before_widget' => '<section class="widget %2$s">',
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

?>
