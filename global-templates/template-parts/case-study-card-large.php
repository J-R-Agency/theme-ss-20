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
				<a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
			</h2>
			<p class='cs-large-excerpt'>
				<?php $summary = get_field('cs_intro'); echo strip_tags(first_sentence($summary)); ?>
			</p>
		</div>
		
		<a class='blue-btn' href='<?php the_permalink(); ?>'>Find out more</a>
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
	<?php else:
		$default_case_study_image = get_field('default_case_study_image', 'option');
		$default_case_study_image_image = $default_case_study_image['dcsi_image']['url'];			
	?>	
		<div class='csc-large-img'
			style="
			background-image:url('<?php echo $default_case_study_image_image; ?>');
			background-position: <?php echo $default_case_study_image['position']; ?>; ">
		</div>
	<?php endif; ?>
	
</div>
