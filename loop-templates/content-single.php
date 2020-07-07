<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$theme_path = get_template_directory_uri();
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<header class="entry-header">		
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

	</header><!-- .entry-header -->
	
	<div class='generic-lg bg-white entry-meta'>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		<div class='entry-meta-bottom'>
			<span class="entry-author"> By <?php the_author(); ?></span>
			<span class="entry-category"><?php the_category(' ',' '); ?></span>
		</div>
	</div>
	
	<div class='social-share'>
		
		<div class='share'>
			Share <img src='<?php echo $theme_path; ?>/assets/icons/share-icon.png' alt="Share icon">
		</div>
		
		<div class='share-btns'>
		<?php if ( function_exists( 'sharing_display' ) ) { echo sharing_display(); } ?>
		</div>
		
		<!--
		<div class='share-btns'>
			<a href="#">
				<img src='<?php echo $theme_path; ?>/assets/social-media/facebook-logo-teal.png' alt="Share on Facebook">
			</a>
			<a href="#">
				<img src='<?php echo $theme_path; ?>/assets/social-media/twitter-logo-teal.png' alt="Share on Twitter">
			</a>
			<a href="#">
				<img src='<?php echo $theme_path; ?>/assets/social-media/linkedin-logo-teal.png' alt="Share on LinkedIn">
			</a>
		</div>
		-->
		
	</div>
	

	<div class="generic-lg bg-white entry-content">

		<?php the_content(); ?>

	</div><!-- .entry-content -->


</article><!-- #post-## -->
