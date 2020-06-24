<?php
/**
 * Template Name: Case Study Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<section class='generic bg-white cs-header'>
	<!-- Hero image -->
	<?php if ( has_post_thumbnail() ): ?>
		<?php
			$thumb = get_the_post_thumbnail_url();
			$hero_image_position = get_field('hero_image_position');
		?>				
		<div class="cs-hero"
			 style="
			 background-image: url('<?php echo $thumb; ?>');
			 background-position: <?php echo $hero_image_position; ?>">	
		</div>				
	<?php endif; ?>
	
	<h1><?php the_title(); ?></h1>
	<div class='cs-intro'>
		<?php the_field('cs_intro'); ?>
	</div>

</section>


<?php get_template_part( 'loop-templates/casestudy', 'flexible' ); ?>

<?php get_footer(); ?>