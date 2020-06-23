<?php
/**
 * Team Member
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php 
	$image = get_sub_field('image');
	$name = get_sub_field('name');
	$position = get_sub_field('position');
	
	// SOCIAL MEDIA
	echo "
	<div class='column-four team-wrapper'>
		<img class='portrait' src='".$image['url']."' alt='".$image['alt']."'>
		<strong>".$name."</strong>
		<p>".$position."</p>";
		
		if( have_rows('social_media') ):
			echo "<div class='team-sm-icons'>
			<span>CONNECT</span>";
			while ( have_rows('social_media') ) : the_row();
				$social_media_type = get_sub_field('social_media_type');
				$social_media_link = get_sub_field('social_media_link');
				$social_media_link_url = $social_media_link['url'];
				
				echo "
				<a href='".$social_media_link_url."' target='_blank'>
					<img src='".$theme_path."/assets/social-media/".$social_media_type."-logo-blue.png'>
				</a>";	
					
			endwhile;
			echo "</div>";
		endif;						
		
	echo "</div>";
?>