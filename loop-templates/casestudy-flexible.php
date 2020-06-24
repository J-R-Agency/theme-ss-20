<?php
/**
 * Partial template for flexible content in templates
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$theme_path = get_template_directory_uri();
?>

<?php

// Check value exists.
if( have_rows('flexible_case_study_blocks') ):

    // Loop through rows.
    while ( have_rows('flexible_case_study_blocks') ) : the_row();


 	   	  // -------------------------- //
         // -- CASE: WP CONTENT BLOCK -//
        // -------------------------- //
       if( get_row_layout() == 'cs_wp_content' ):
       		
       		echo "<!-- Content Module -->
				<section class='generic bg-white cs-wp-content'>";
				
			if (have_posts()) : while (have_posts()) : the_post();
					the_content();
				endwhile;
			endif;
										
			echo "</section>
       		";
       		
 	   	  // -------------------------- //
         // ---- CASE: QUOTE BLOCK ----//
        // -------------------------- //
       elseif( get_row_layout() == 'cs_quote' ):
			$csq_background_color = get_sub_field('csq_background_color');
			$csq_quote = get_sub_field('csq_quote');
			$csq_citation = get_sub_field('csq_citation');
			$csq_portrait = get_sub_field('csq_portrait');
			
       		echo "
       		<!-- Quote Block -->
			<section class='cs-quote-block generic bg-".$csq_background_color."'>
				
				<div class='cs-quote'>
					<p>".$csq_quote."</p>
					
					<div class='cs-citation'>
						<img src='".$csq_portrait['url']."' alt='".$csq_portrait['alt']."'>
						<cite> - ".$csq_citation."</cite>
					</div>
				</div>
			</section>
       		";       		

 	   	  // -------------------------- //
         // ---- CASE: VIDEO BLOCK ----//
        // -------------------------- //
       elseif( get_row_layout() == 'cs_video' ):
			$csv_title = get_sub_field('csv_title');
			$csv_video_embed = get_sub_field('csv_video_embed');
			
       		echo "
       		<!-- Video Block -->
			<section class='cs-video-block generic bg-light-grey'>
				
				<h3>".$csv_title."</h3>
				
				<div class='container'>
					<div class='embed-responsive embed-responsive-16by9'>
						".$csv_video_embed."
					</div>
				</div>
				
			</section>
       		";       		

 	   	  // -------------------------- //
         // ---- CASE: CONTENT BLOCK ----//
        // -------------------------- //
       elseif( get_row_layout() == 'cs_content' ):
			$csc_style = get_sub_field('csc_style');
			$csc_background_color = get_sub_field('csc_background_color');
			$csc_title= get_sub_field('csc_title');
			$csc_content = get_sub_field('csc_content');
						
       		echo "
       		<!-- Content Block -->
			<section class='csc-container generic bg-".$csc_background_color."'>
				
				<h3>".$csc_title."</h3>
				
				<div class='csc-content ".$csc_style."'>
					".$csc_content."
				</div>
				
			</section>
       		"; 

			
		endif; // Final endif        
    // End loop.
    endwhile;
// No value.
else :
    
endif;

?>