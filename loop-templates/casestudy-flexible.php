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
				<section class='generic-lg bg-white cs-wp-content'>
					<div class='generic-wrapper'>
				";
				
					if (have_posts()) : while (have_posts()) : the_post();
							the_content();
						endwhile;
					endif;
										
			echo "</div>
			</section>
       		";
       		
 	   	  // -------------------------- //
         // ---- CASE: QUOTE BLOCK ----//
        // -------------------------- //
       elseif( get_row_layout() == 'cs_quote' ):
			$csq_background_color = get_sub_field('csq_background_color');
			$csq_quote = get_sub_field('csq_quote', false, false);
			$csq_citation = get_sub_field('csq_citation');
			$csq_portrait = get_sub_field('csq_portrait');
			$csq_quotation_marks = get_sub_field('csq_quotation_marks');

			if ($csq_quotation_marks) {
				$csq_include_quotes = 'include-quotes';
			} else {
				$csq_include_quotes = 'exclude-quotes';
			}
			
			$cite_alignment = '0';
			
			if (!$csq_portrait) {
				$cite_alignment = '0 auto';
			} 
			
       		echo "
       		<!-- Quote Block -->
			<section class='generic-lg bg-".$csq_background_color."'>
				<div class='quote-block generic-wrapper'>
			";
				
			echo "<div class='quote-quote full-width'>
					<blockquote class='".$csq_include_quotes."'>".$csq_quote."</blockquote>";
			
			if ($csq_citation) {
			echo "<div class='quote-citation'>";
			}
			
			if ($csq_portrait) {
			echo	"<img src='".$csq_portrait['url']."' alt='".$csq_portrait['alt']."'>";
			}
						
			if ($csq_citation) {
			echo	"<cite> - ".$csq_citation."</cite>
				</div>";
			}
			
			echo "</div>
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
			<section class='cs-video-block generic-lg bg-light-grey'>";
			
			if ($csv_title) {
			echo	"<h3>".$csv_title."</h3>";
			}
					
			echo	"
					<div class='embed-responsive embed-responsive-16by9'>
						".$csv_video_embed."
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
			<section class='csc-container generic-lg bg-".$csc_background_color."'>
				<div class='generic-wrapper'>
					<h3>".$csc_title."</h3>
					
					<div class='csc-content ".$csc_style."'>
						".$csc_content."
					</div>
				</div>
			</section>
       		"; 

 	   	  // --------------------------- //
         // - CASE: IMAGE TRIPTYCH BLOCK -//
        // --------------------------- //
       elseif( get_row_layout() == 'cs_image_triptych_block' ):
			$csitb_title = get_sub_field('csitb_title');
			$csitb_intro = get_sub_field('csitb_intro');	
				
   			echo "
   			<section class='generic-lg bg-white'>
   				<div class='generic-wrapper image-triptych-block'>
	   				<h2>".$csitb_title."</h2>
	   				<p>".$csitb_intro."</p>
	   				";
	   				
	   				if( have_rows('csitb_images') ):
	   					echo "<div class='image-triptych-container'>";
	   					while( have_rows('csitb_images') ): the_row();
	   						$csitb_image = get_sub_field('csitb_image');
	   						$csitb_image_link = get_sub_field('csitb_image_link');
	   						
	   						if ($csitb_image_link) {
		   						echo "<a class='image-triptych' href='".$csitb_image_link['url']."' target='".$csitb_image_link['target']."'>";
	   						} else {
		   						echo "<div class='image-triptych'>";
	   						}
	   						
	   						echo "<img src='".$csitb_image['url']."' alt='".$csitb_image['alt']."'>";
	   						
	   						if ($csitb_image_link) {
	   							echo "</a>";
	   						} else {
		   						echo "</div>";
	   						}
	   					
	   					endwhile;
	   					echo "</div>";
	   				endif;
   			
   			echo "</div>
   			</section>";

			
		endif; // Final endif        
    // End loop.
    endwhile;
// No value.
else :
    
endif;

?>