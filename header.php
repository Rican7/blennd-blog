<?php
// Create TITLE
global $page, $paged;

$page_title = wp_title( '|', false, 'right' );

// Add the blog name.
$page_title .= get_bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
	$page_title .= " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
	$page_title .= ' | ' . sprintf( __( 'Page %s', '' ), max( $paged, $page ) );


// Create DESCRIPTION
if ( !is_single() ) {
	$page_description = 'The home of Trevor N. Suarez';
}
else {
	if (have_posts()) {
		while(have_posts()) {
			the_post();
			$out_excerpt = str_replace(array("\r\n", "\r", "\n", '<p>', '</p>'), '', get_the_excerpt());
			$out_excerpt = str_replace("\"", '&quot;', $out_excerpt);
			$page_description = $out_excerpt;
		}
	}
}

?>
<!doctype html> 
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6" xmlns:fb="http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7" xmlns:fb="http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8" xmlns:fb="http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="no-js ie9" xmlns:fb="http://www.facebook.com/2008/fbml"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js" xmlns:fb="http://www.facebook.com/2008/fbml"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $page_title; ?></title>

	<!-- Start Meta Tags -->
	<meta name="title" content="<?php echo $page_title; ?>" />
	<meta name="description" content="<?php echo $page_description; ?>" />
	<meta name="robots" content="index, follow, noodp, noydir" />
	<meta name="copyright" content="Copyright &copy; <?php echo date('Y'); ?> blennd" />
	<meta name="viewport" content="width=1000, initial-scale=0">
	<!-- End Meta Tags -->

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<link rel="shortcut icon" href="/favicon.ico"> 
	<link rel="apple-touch-icon" href="/apple-touch-icon.png"> 
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/html5bp.css?v=1"> 
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:regular,italic,bold,bolditalic&amp;v1"> 
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/main.css?v=2"> 
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/css3.css?v=2">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<script src="<?php bloginfo('template_directory'); ?>/scripts/libs/modernizr-1.7.min.js"></script>

	<!-- Start RSS Feeds -->
	<link rel="alternate" type="application/rss+xml" title="blennd" href="http://feeds.feedburner.com/blennd" />
	<!-- End RSS Feeds -->

	<?php
		// Include wordpress head (plugin necessary)
		wp_head();
	?>

</head>
<body>

<?php

// Include the middle section	
get_template_part( 'middle' );

?>
