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
			<p class='cs-small-title'>
				<?php the_title(); ?>
			</p>
			<p class='cs-small-excerpt'>
				<?php $summary = get_field('cs_intro'); echo strip_tags(first_sentence($summary)); ?>
			</p>
			<img class='cs-card-arrow' src='<?php echo $theme_path; ?>/assets/icons/btn-arrow.png'>
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
	<?php else: ?>	
		<div class='csc-small-img'
			style="
			background-image:url('<?php echo $theme_path; ?>/assets/images/case-study-card-placeholder.jpg');
			background-position: center; ">
		</div>
	<?php endif; ?>
</div>



