<?php
/**
 * Case study card large
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
$theme_path = get_template_directory_uri();
?>

<div class='case-study-card-large'>
	<div class='csc-large-filter'>
		<div class='cs-large-info'>
			<h2 class='cs-large-title'>
				<?php the_title(); ?>
			</h2>
			<p class='cs-large-excerpt'>
				<?php $summary = get_field('cs_intro'); echo strip_tags(first_sentence($summary)); ?>
			</p>
		</div>
		
		<div class='blue-btn'>
			<a href='<?php the_permalink(); ?>'>Find out more</a>
		</div>			
	</div>

	<?php if ( has_post_thumbnail() ): ?>
		<?php
			$thumb = get_the_post_thumbnail_url();
			$hero_image_position = get_field('hero_image_position');
		?>
		<div class='csc-large-img'
			style="
			background-image:url('<?php echo $thumb; ?>');
			background-position: <?php echo $hero_image_position; ?>">
		</div>
	<?php else: ?>	
		<div class='csc-large-img'
			style="
			background-image:url('<?php echo $theme_path; ?>/assets/images/case-study-card-placeholder.jpg');
			background-position: center; ">
		</div>
	<?php endif; ?>
	
</div>