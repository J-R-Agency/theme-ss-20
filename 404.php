<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<section class='generic-lg bg-white' style='text-align: center;'>
	<h1>404</h1>
	<p>Sorry, this page is missing.</p>
</section>

<?php
get_footer();
