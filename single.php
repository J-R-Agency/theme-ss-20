<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php
while ( have_posts() ) {
	the_post();
	get_template_part( 'loop-templates/content', 'single' );
}
?>

<?php
get_footer();
