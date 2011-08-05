<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = $query_split[1];
} // foreach

$search = new WP_Query($search_query);
?>
<?php get_header(); ?>
<?php

// Include the loop
get_template_part('theloop');

?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
