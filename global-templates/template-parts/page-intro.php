<?php
/**
 * Page Intro
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post; 
?>

<?php if( have_rows('page_intro') ): ?>
    <?php while( have_rows('page_intro') ): the_row(); 

        $pi_background_color = get_sub_field('pi_background_color');
        $pi_title = get_sub_field('pi_title');
        $pi_subtitle = get_sub_field('pi_subtitle');
        $pi_intro = get_sub_field('pi_intro');
        $pi_button = get_sub_field('pi_button');
        $pi_media = get_sub_field('pi_media');
    ?>
    

	<section class="page-intro <?php echo $post_slug = $post->post_name; ?> generic-lg bg-<?php echo $pi_background_color; ?>">
		<div class='generic-wrapper page-intro'>
		<!-- Title -->
		<?php
			if ($pi_title) {
				echo "<h1 class='pi-title'>";
				echo $pi_title;
				echo "</h1>";
			} else {
				echo '';	
			}
		?>
		
		<!-- Subtitle -->
		<?php
			if ($pi_subtitle) {
				echo "<p class='pi-subtitle'>";
				echo $pi_subtitle;
				echo "</p>";
			} else {
				echo '';	
			}
		?>
		
		<!-- Intro -->
		<?php
			if ($pi_intro) {
				echo "<p class='pi-intro'>";
				echo $pi_intro;
				echo "</p>";
			} else {
				echo '';	
			}
		?>	
		
		
		<!-- Button -->
		
		<?php
			if ($pi_button) {
				echo "
				<a class='btn' href='".$pi_button['url']."' target='".$pi_button['target']."'>
					".$pi_button['title']."
				</a>
				";
			} else {
				echo "";
			}
		?>
		
		<!-- Media -->
		<?php
			if( have_rows('pi_media') ):
				while ( have_rows('pi_media') ) : the_row();
				
				if( get_row_layout() == 'pi_image' ):
					$pi_image_file = get_sub_field('pi_image_file');
					$pi_image_styles = get_sub_field('pi_image_styles');
					
					if (!$pi_image_styles['pi_drop_shadow']) {
						$drop_shadow = '';
					} else {
						$drop_shadow = 'drop-shadow';
					}
					
					echo "<img class='pi-image ".$pi_image_styles['pi_margins']." ".$pi_image_styles['pi_corners']." ".$drop_shadow."' src='".$pi_image_file['sizes']['large']."' alt='".$pi_image_file['alt']."'>";
					
				elseif( get_row_layout() == 'pi_video' ):
					$pi_video = get_sub_field('pi_video');
					
					echo "<div class='video-wrapper'>";
					echo $pi_video;
					echo "</div>";
					
				endif;
				
				endwhile;
			endif;
		?>
		
		</div>
	</section>
	
	
    <?php endwhile; ?>
<?php endif; ?>
