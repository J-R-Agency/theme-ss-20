<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$theme_path = get_template_directory_uri();
$author_name = get_the_author_meta('display_name');

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	
	<!-- Hero image -->
	<?php if ( has_post_thumbnail() ): ?>
	<header class="entry-header">
		<?php
			$thumb = get_the_post_thumbnail_url();
			$hero_image_position = get_field('hero_image_position');
		?>				
		<div class="blog-hero"
			 style="
			 background-image: url('<?php echo $thumb; ?>');
			 background-position: <?php echo $hero_image_position; ?>">	
		</div>	
	</header><!-- .entry-header -->				
	<?php endif; ?>
	
	
	<div class='generic-post bg-white entry-meta'>
		<div class='generic-wrapper'>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			
			<div class='entry-meta-bottom'>
				<span class="entry-author"> By <?php echo $author_name; ?></span>
				<span class="entry-category"><?php the_category(' ',' '); ?></span>
			</div>
		</div>
	</div>
	
	<div class='generic-post social-share'>
		<div class='generic-wrapper'>
			
			<div class='share'>
				Share <img src='<?php echo $theme_path; ?>/assets/icons/share-icon.svg' alt="Share icon">
			</div>
			
			<div class='share-btns'>
			<?php if ( function_exists( 'sharing_display' ) ) { echo sharing_display(); } ?>
			</div>
			
		</div>
	</div>
	

	<div class="generic-post bg-white entry-content">
		<div class='generic-wrapper'>
			<?php the_content(); ?>
		</div>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
