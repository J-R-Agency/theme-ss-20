<?php
/**
 * Case study card small
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
$theme_path = get_template_directory_uri();
?>

<div class='case-study-card-small'>
	<a href='<?php the_permalink(); ?>'>
		<div class='csc-small-filter'>
			<h2 class='cs-small-title'>
				<?php the_title(); ?>
			</h2>
			<p class='cs-small-excerpt'>
				<?php $summary = get_field('cs_intro'); echo strip_tags(first_sentence($summary)); ?>
			</p>
			<img class='cs-card-arrow' src='<?php echo $theme_path; ?>/assets/icons/btn-arrow-white.png'>
		</div>
	</a>
	
	<?php if ( has_post_thumbnail() ): ?>
		<?php
			$thumb = get_the_post_thumbnail_url();
			$hero_image_position = get_field('hero_image_position');
		?>
		<div class='csc-small-img'
			style="
			background-image:url('<?php echo $thumb; ?>');
			background-position: <?php echo $hero_image_position; ?>">
		</div>
	<?php else:
		$default_case_study_image = get_field('default_case_study_image', 'option');
		$default_case_study_image_image = $default_case_study_image['dcsi_image']['url'];		
	?>	
		<div class='csc-small-img'
			style="
			background-image: url('<?php echo $default_case_study_image_image; ?>');
			background-position: <?php echo $default_case_study_image['position']; ?>; ">
		</div>
	<?php endif; ?>
</div>



