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
if( have_rows('flexible_content_block') ):

    // Loop through rows.
    while ( have_rows('flexible_content_block') ) : the_row();


 	   	  // -------------------------- //
         // -- CASE: SITEWIDE NOTICE --//
        // -------------------------- //
       if( get_row_layout() == 'fc_sitewide_notice' ):
	   		$sitewide_notice = get_field('sitewide_notice', 'option');
	   		
	   		if ($sitewide_notice['sn_text']):
	       		echo "
	       		<!-- Sitewide Notice -->
	   			<a class='sitewide-notice-link' href='".$sitewide_notice['sn_link']['url']."' target='".$sitewide_notice['sn_link']['target']."'>
					<section class='sitewide-notice bg-".$sitewide_notice['sn_color']."'>
						".$sitewide_notice['sn_text']."
					</section>
				</a>
	       		"; 
       		endif;
       		
       		
 	   	  // -------------------------- //
         // --- CASE: CONTENT BLOCK ---//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_content_block' ):
	   		$fcb_background_color = get_sub_field('fcb_background_color');
	   		$fcb_style = get_sub_field('fcb_style');
	   		$fcb_title = get_sub_field('fcb_title');
	   		$fcb_content = get_sub_field('fcb_content');
	   		
	   		
	   		echo "
       		<!-- FC Content Block Style 1 -->
			<section class='content-block ".$fcb_margins." ".$fcb_style." ".sanitize_title($fcb_title)." generic bg-".$fcb_background_color."'>";
			
			if( have_rows('fcb_media') ):
				echo "<div class='fcb-media'>";
				while ( have_rows('fcb_media') ) : the_row();
					if( get_row_layout() == 'fcb_image' ):
						$fcb_image_file = get_sub_field('fcb_image_file');
						
						echo "<img class='fcb-image' src='".$fcb_image_file['url']."' alt='".$fcb_image_file['alt']."'>";
						
					elseif( get_row_layout() == 'fcb_video' ): 
						$fcb_video = get_sub_field('fcb_video');
						
						echo "<div class='fcb-video'>";
						echo $fcb_video;
						echo "</div>";
						
					endif;
				
				endwhile;
				echo "</div>";
			endif;
			
			echo "<div class='fcb-content'>";
			if ($fcb_title){
				echo "<h2>".$fcb_title."</h2>";
			}
			
			if ($fcb_content){
				echo "<p>".$fcb_content."</p>";
			} 
			echo "</div>";
			
			echo"
			</section>
       		";   
   		   		

          // -------------------------- //
         // --- CASE: ICON SET ---//
        // -------------------------- //
        elseif( get_row_layout() == 'fc_icon_set' ):
			$fcis_background_color = get_sub_field('fcis_background_color');
			$fcis_columns = get_sub_field('fcis_columns');
			$fcis_title = get_sub_field('fcis_title');
			$fcis_subtitle = get_sub_field('fcis_subtitle');
			$fcis_icons = get_sub_field('fcis_icons');
			$fcis_button = get_sub_field('fcis_button');
			
			echo "
			<!-- Icon Set -->
			<section class='fc-icon-set ".sanitize_title($fcis_title)." generic bg-".$fcis_background_color."'>";
			
			if ($fcis_title) {
				echo "<h2>".$fcis_title."</h2>";
			} else {
				echo "";
			}
			
			if ($fcis_subtitle) {
				echo "<p>".$fcis_subtitle."</p>";
			} else {
				echo "";
			}
			
			
			if( have_rows('fcis_icons') ):
				echo "<div class='fcis-container'>";
				while ( have_rows('fcis_icons') ) : the_row();
					$fcis_icon = get_sub_field('fcis_icon');
					$fcis_icon_title = get_sub_field('fcis_icon_title');
					$fcis_icon_description = get_sub_field('fcis_icon_description');
					
					echo "
					<div class='fcis-wrapper column-".$fcis_columns."'>
						<img src='".$fcis_icon['url']."' alt='".$fcis_icon['alt']."'>";
						
					if ($fcis_icon_title) {
						echo "<p><strong>".$fcis_icon_title."</strong></p>";
					} else {
						echo "";
					}
					
					if ($fcis_icon_description) {
						echo "<div class='fcis-intro'>".$fcis_icon_description."</div>";
					} else {
						echo "";
					}
					
					echo "
					</div>
					";
					
				endwhile;
				echo "</div>";
			endif;
	
			if ($fcis_button) {
				echo "
					<div class='blue-btn'>
						<a href='".$fcis_button['url']."' target='".$fcis_button['target']."'>
						".$fcis_button['title']."
						</a>
					</div>";
			} else {
				echo "";
			}			
				
			echo "
			</section>
			";
			
 	   	  // -------------------------- //
         // ---- CASE: QUOTE BLOCK ----//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_quote_block' ):
			$fcqb_background_color = get_sub_field('fcqb_background_color');
			$fcqb_image = get_sub_field('fcqb_image');
			$fcqb_quote = get_sub_field('fcqb_quote');
			$fcqb_citation = get_sub_field('fcqb_citation');
			
       		echo "
       		<!-- Quote Block -->
			<section class='quote-block generic bg-".$fcqb_background_color."'>
				<div class='fcqb-image'>
					<img src='".$fcqb_image['url']."' alt='".$fcqb_image['alt']."'>
				</div>
				
				<div class='fcqb-quote'>
					<p>".$fcqb_quote."</p>
					
					<div class='fcqb-citation'>
						<img src='".$fcqb_citation['fcqb_portrait']['url']."' alt='".$fcqb_citation['fcqb_portrait']['alt']."'>
						<cite> - ".$fcqb_citation['fcqb_name']."</cite>
					</div>
				</div>
			</section>
       		"; 
       		
       		
  	   	  // ------------------------- //
         // ---- CASE: TEAM BLOCK ----//
        // ------------------------- //
       elseif( get_row_layout() == 'fc_team_block' ):
			$fctb_title = get_sub_field('fctb_title');
			$fctb_subtitle = get_sub_field('fctb_subtitle');
			$fctb_link = get_sub_field('fctb_link');
			
       		echo "
       		<!-- Team Block -->
       		<section class='team-banner generic bg-yellow'>
       			<h2>".$fctb_title."</h2>
       			<p>".$fctb_subtitle."</p>
       		</section>
			<section class='team-block generic bg-white'>";
			
			
			// BOARD
			if( have_rows('fctb_board') ):
				echo "
				<div class='team-container'>
					<h2>Our Board</h2>";
				while ( have_rows('fctb_board') ) : the_row();
					
					include (get_template_directory() . '/global-templates/template-parts/team-member.php');
						
				endwhile;
				echo "</div>";
			endif;
			
			// TEAM
			if( have_rows('fctb_team') ):
				echo "
				<div class='team-container'>
					<h2>Our Team</h2>";
				while ( have_rows('fctb_team') ) : the_row();
					
					include (get_template_directory() . '/global-templates/template-parts/team-member.php');
						
				endwhile;
				echo "</div>";
			endif;
			
			if($fctb_link) {
				echo "
			    <div class='blue-btn'>
       				<a href='".$fctb_link['url']."' target='".$fctb_link['target']."'>
       					".$fctb_link['title']."
       				</a> 
   				</div>
				";
			}
				
			echo "
			</section>"; 
	
	
  	   	  // -------------------------- //
         // -- CASE: IMAGE CTA BLOCK --//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_image_cta' ):
			$fcicta_image = get_sub_field('fcicta_image');
			$fcicta_title = get_sub_field('fcicta_title');
			$fcicta_subtitle = get_sub_field('fcicta_subtitle');
			$fcicta_link = get_sub_field('fcicta_link');
			
       		echo "
       		<!-- Image CTA Block -->
       		<section class='generic bg-light-grey'>     
       			<div class='image-cta-filter'>
       			
       				<div>
       					<h2>".$fcicta_title."</h2>
	   					<p>".$fcicta_subtitle."</p>
	   				</div>
	   				
       				<div class='blue-btn'>
	       				<a href='".$fcicta_link['url']."' target='".$fcicta_link['target']."'>
	       					".$fcicta_link['title']."
	       				</a> 
       				</div>  			       			
      			</div>  			
       			<div class='image-cta' style='background:url(".$fcicta_image['url'].");'>
       			</div>
       		</section>";
					      		

  	   	  // -------------------------- //
         // ----- CASE: NEWS BLOCK ----//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_news_block' ):
			$fcnb_title = get_sub_field('fcnb_title');
			
       		echo "
       		<!-- News Block -->
			<section class='generic bg-light-teal more-news'>
				<h2>".$fcnb_title."</h2>
			
				<div class='blog-cards-container'>
			";
												
					$args = array(
					    'post_type'      => 'post', //write slug of post type
					    'posts_per_page' => 3,
					    'order'          => 'DESC',
					 );
					 
					 $query = new WP_Query($args);
					 
					 
					if ( $query->have_posts() ) :
					 
					    while ( $query->have_posts() ) : $query->the_post();
							
							include (get_template_directory().'/global-templates/template-parts/blog-card.php');	
						
						endwhile;
					endif; 
					wp_reset_query();	
								
						
			echo "
				</div>
			</section>
			";	     

 	   	  // -------------------------- //
         // ----- CASE: LINK BLOCK ----//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_link_block' ):
	   		$fclb_link = get_sub_field('fclb_link');
	   		
       		echo "
       		<!-- Link Block -->
   			<section class='bg-light-grey link-block'>
   				<a href='".$fclb_link['url']."' target='".$fclb_link['target']."'>".$fclb_link['title']."</a>
			</section>
       		";


 	   	  // --------------------------- //
         // - CASE: ORDERED LIST BLOCK -//
        // --------------------------- //
       elseif( get_row_layout() == 'fc_ordered_list' ):
	   		$fcol_background_color = get_sub_field('fcol_background_color');
	   		$fcol_title = get_sub_field('fcol_title');
	   		$fcol_style = get_sub_field('fcol_style');
	   		$fcol_list_item = get_sub_field('fcol_list_item');
	   		$fcol_image_right = get_sub_field('fcol_image_right');
	   		$fcol_image_left = get_sub_field('fcol_image_left');
	   		
       		echo "
       		<!-- Ordered List Block -->
   			<section class='generic bg-".$fcol_background_color." ordered-list-block'>
   				<h2>".$fcol_title."</h2>";
   				
   				// Unordered list
   				if ($fcol_style == 'unordered') {
					if( have_rows('fcol_list_item') ):
						echo "
						<div class='unordered-list'>
							<ul>";
						while ( have_rows('fcol_list_item') ) : the_row();
							$fcol_description = get_sub_field('fcol_description');
							
							echo "
								<li>".$fcol_description."</li>
							";
								
						endwhile;
						echo "</ul>
						</div>";
					endif;	   				
   				}
   				
   			echo "
			</section>
       		";


			
		endif; // Final endif        
    // End loop.
    endwhile;
// No value.
else :
    
endif;

?>