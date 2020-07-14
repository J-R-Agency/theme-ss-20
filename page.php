<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php include_once (get_template_directory() . '/global-templates/template-parts/page-intro.php'); ?>

<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>

<section class='generic-lg bg-white'>
	<?php
		if (have_posts()) : while (have_posts()) : the_post();
				the_content();
			endwhile;
		endif;	
	?>
</section>

<?php get_footer(); ?>