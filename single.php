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

<!-- Hero image -->
<?php if ( has_post_thumbnail() ): ?>
	<?php
		$thumb = get_the_post_thumbnail_url();
		$hero_image_position = get_field('hero_image_position');
	?>				
	<div class="blog-hero"
		 style="
		 background-image: url('<?php echo $thumb; ?>');
		 background-position: <?php echo $hero_image_position; ?>">	
	</div>				
<?php endif; ?>

<section class='generic bg-white blog-post'>
	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'loop-templates/content', 'single' );
	}
	?>
</section>

<?php
get_footer();
