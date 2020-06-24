<?php
/**
 * Blog card
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
$theme_path = get_template_directory_uri();
?>

<div class='blog-card'>
	
	<!-- Thumbnail -->
	<?php if ( has_post_thumbnail() ): ?>
		<?php
			$thumb = get_the_post_thumbnail_url();
			$hero_image_position = get_field('hero_image_position');
			
			if (!$hero_image_position) {
				$hero_image_position = 'center';
			}
		?>	
		<a href='<?php the_permalink(); ?>'>			
			<div class="post-thumbnail"
				 style="
				 background-image: url('<?php echo $thumb; ?>');
				 background-position: <?php echo $hero_image_position; ?>">	
			</div>
		</a>
	<?php else: ?>
		<a href='<?php the_permalink(); ?>'>
			<div class="post-thumbnail"
				 style="
				 background-image: url('<?php echo $theme_path; ?>/assets/images/blog-card-placeholder.jpg');
				 background-position: center;">	
			</div>
		</a>				
	<?php endif; ?>
	
	<a href='<?php the_permalink(); ?>' class='blog-card-title'>
		<?php the_title(); ?>
	</a>
	<p class='blog-card-author'>By <?php the_author(); ?></p>
	
	<div class='blue-btn'>
		<a href='<?php the_permalink(); ?>'>
			Read More
		</a>
	</div>
</div>