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
						<div class='generic-wrapper'>
							".$sitewide_notice['sn_text']."
						</div>
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
	   		$fcb_margins = get_sub_field('fcb_margins');
	   		
	   		
	   		if ($fcb_style == 'style1') {
		   		$fcb_padding = 'generic-lg';	   		
	   		} else {
		   		$fcb_padding = '';		   		
	   		}
	   		
	   		echo "
       		<!-- FC Content Block -->
			<section class='content-block ".sanitize_title($fcb_title)." bg-".$fcb_background_color." ".$fcb_padding."'>
				<div class='generic-wrapper ".$fcb_style." ".$fcb_margins."'>
			";	
			
				if( have_rows('fcb_media') ):
					echo "<div class='fcb-media ".$fcb_margins."'>";
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
			
			echo "</div>
				</div>
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
			$fcis_icon_type = get_sub_field('fcis_icon_type');
			$fcis_icons = get_sub_field('fcis_icons');
			$fcis_button = get_sub_field('fcis_button');
			
			echo "
			<!-- Icon Set -->
			<section class='fc-icon-set ".sanitize_title($fcis_title)." generic-lg bg-".$fcis_background_color."'>
				<div class='generic-wrapper'>
			";
				
				if ($fcis_title) {
					echo "<h2 class='fcis-title'>".$fcis_title."</h2>";
				} else {
					echo "";
				}
				
				if ($fcis_subtitle) {
					echo "<p class='fcis-subtitle'>".$fcis_subtitle."</p>";
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
						<div class='fcis-wrapper column-".$fcis_columns." ".$fcis_icon_type."'>
							<img src='".$fcis_icon['url']."' alt='".$fcis_icon['alt']."'>";
							
						if ($fcis_icon_title) {
							echo "<h3>".$fcis_icon_title."</h3>";
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
						<a class='btn' href='".$fcis_button['url']."' target='".$fcis_button['target']."'>
						".$fcis_button['title']."
						</a>
						";
				} else {
					echo "";
				}			
				
			echo "</div>
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
			<section class='generic-lg bg-".$fcqb_background_color."'>
				<div class='quote-block generic-wrapper'>
			";
				
			if ($fcqb_image) {
				$fb_class = 'half-width';
			echo "<div class='fcqb-image'>
					<img src='".$fcqb_image['url']."' alt='".$fcqb_image['alt']."'>
				</div>";				
			} else {
				$fb_class = 'full-width';
			}
				
			echo "<div class='fcqb-quote ".$fb_class."'>
					<blockquote>".$fcqb_quote."</blockquote>";
			
			if ($fcqb_citation['fcqb_name']) {
			echo "<div class='fcqb-citation'>";
			}
			
			if ($fcqb_citation['fcqb_portrait']) {
			echo	"<img src='".$fcqb_citation['fcqb_portrait']['url']."' alt='".$fcqb_citation['fcqb_portrait']['alt']."'>";
			}
						
			if ($fcqb_citation['fcqb_name']) {
			echo	"<cite> - ".$fcqb_citation['fcqb_name']."</cite>
				</div>";
			}
			
			echo "</div>
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
       		<section class='team-banner generic-lg bg-yellow'>
       			<div class='generic-wrapper'>
       				<h2>".$fctb_title."</h2>
	   				<p>".$fctb_subtitle."</p>
	   			</div>
       		</section>
			<section class='team-block generic-lg bg-white'>
				<div class='generic-wrapper'>
			";
			
			
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
	   				<a class='btn' href='".$fctb_link['url']."' target='".$fctb_link['target']."'>
	   					".$fctb_link['title']."
	   				</a> 
					";
				}
				
			echo "</div>
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
       		<section class='generic-lg bg-light-grey'>
       			<div class='generic-wrapper'>
	       			<div class='image-cta-filter'>
	       			
	       				<div>
	       					<h2>".$fcicta_title."</h2>
		   					<p>".$fcicta_subtitle."</p>
		   				</div>
		   				
	       				<a class='btn' href='".$fcicta_link['url']."' target='".$fcicta_link['target']."'>
	       					".$fcicta_link['title']."
	       				</a> 
	       				
	      			</div>  			
	       			<div class='image-cta' style='background-image:url(".$fcicta_image['url'].");'>
	       			</div>
	       		</div>
       		</section>";
					      		

  	   	  // -------------------------- //
         // ----- CASE: NEWS BLOCK ----//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_news_block' ):
			$fcnb_title = get_sub_field('fcnb_title');
			
       		echo "
       		<!-- News Block -->
			<section class='generic-lg bg-light-teal more-news'>
				<div class='generic-wrapper'>
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
								
						
			echo "</div>
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
   				<div class='generic-wrapper'>
   					<a href='".$fclb_link['url']."' target='".$fclb_link['target']."'>".$fclb_link['title']."</a>
   				</div>
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
	   		
	   		if ($fcol_image_left or $fcol_image_right) {
	       		echo "
	       		<!-- Ordered List Block -->
	   			<section class='generic-lg bg-".$fcol_background_color." ordered-list-block'
	   			style =
					 'background-image:url(".$fcol_image_left['url']."),
					 				   url(".$fcol_image_right['url'].");
					 background-position: center left, center right;
					 background-repeat: no-repeat;
					 '
	   			>";		   		
	   		} else {
		   		echo "
		   		<!-- Ordered List Block -->
		   		<section class='generic-lg bg-".$fcol_background_color." ordered-list-block'>
		   		";
	   		}

   			echo "<div class='generic-wrapper'>
	   				<h2 class='fcol-title'>".$fcol_title."</h2>
	   				<div class='ordered-list-block-container'>
   			";
 
 
   				// Numbered list
   				if ($fcol_style == 'numbered') {
					if( have_rows('fcol_list_item') ):
						echo "
						<div class='numbered-list'>
							<ol>";
						while ( have_rows('fcol_list_item') ) : the_row();
							$fcol_description = get_sub_field('fcol_description');
							
							echo "
								<li><span>".$fcol_description."</span></li>
							";
								
						endwhile;
						echo "</ol>
						</div>";
					endif;	   				
   				} 
   				
   				// Unordered list
   				if ($fcol_style == 'unordered') {
					if( have_rows('fcol_list_item') ):
						echo "
						<div class='unordered-list'>
							<ul>";
						while ( have_rows('fcol_list_item') ) : the_row();
							$fcol_description = get_sub_field('fcol_description');
							$fcol_link = get_sub_field('fcol_link');

							if ( $fcol_link ){
							    $link_url = $fcol_link['url'];
							    $link_title = $fcol_link['title'];
							    $link_target = $fcol_link['target'] ? $link['target'] : '_self';

							    if ( $link_title == "" ){
							    	$link_title = $fcol_description;
							    }

							    $link_start = "<a href=\"$link_url\" title=\"$link_title\" target=\"$link_target\">";
							    $link_end = "</a>";
							} else {
								unset($link_url);
								unset($link_title);
								unset($link_target);
								unset($link_start);
								unset($link_end);
							}

							echo "
								<li>".$link_start.$fcol_description.$link_end."</li>
							";
								
						endwhile;
						echo "</ul>
						</div>";
					endif;	   				
   				}
   				
   				// Icon list
   				if ($fcol_style == 'icons') {
					if( have_rows('fcol_list_item') ):
						echo "
						<div class='icon-list'>";
						while ( have_rows('fcol_list_item') ) : the_row();
							$fcol_icon = get_sub_field('fcol_icon');
							$fcol_description = get_sub_field('fcol_description');
							
							echo "
								<div class='icon-list-item'>
									<img src='".$fcol_icon['url']."' alt='".$fcol_icon['alt']."'>
									<p>".$fcol_description."</p>
								</div>
							";
								
						endwhile;
						echo "</div>";
					endif;	   				
   				}
   				
   			echo "</div>
   				</div>
			</section>
       		";


 	   	  // --------------------------- //
         // - CASE: CONTACT FORM BLOCK -//
        // --------------------------- //
       elseif( get_row_layout() == 'fc_contact_form_block' ):
	   		$fccf_title = get_sub_field('fccf_title');
	   		
       		echo "
       		<!-- Contact Form Block -->
   			<section class='generic-lg bg-light-grey contact-form-block'>
   				<div class='generic-wrapper'>
	   				<h2>".$fccf_title."</h2>";
	   				
	   				echo do_shortcode('[contact-form-7 id="5" title="Contact form"]');
   				
			echo "</div>
			</section>
       		";


 	   	  // ------------------------------- //
         // - CASE: PEOPLE HIGHLIGHT BLOCK -//
        // ------------------------------- //
       elseif( get_row_layout() == 'fc_people_highlight_block' ):
	   		$fcphb_background_color = get_sub_field('fcphb_background_color');
	   		$fcphb_title = get_sub_field('fcphb_title');
	   		$people_count = count(get_sub_field('fcphb_people'));
	   		
       		echo "
       		<!-- PEOPLE HIGHLIGHT BLOCK -->
   			<section class='generic-lg bg-".$fcphb_background_color."'>
   				<div class='generic-wrapper'>
   			";
   				
	   			if ($people_count <= 1) {
	   				echo "
	   				<div class='people-highlight-block single'>
		   				<div class='people-highlight-container'>
		   					<h2>".$fcphb_title."</h2>
	   				";
	   			} else {
		   			echo "
		   			<div class='people-highlight-block'>
			   			<h2>".$fcphb_title."</h2>
			   			<div class='people-highlight-container'>
		   			";
	   			}
	   				
	   				if( have_rows('fcphb_people') ):
	   					while ( have_rows('fcphb_people') ) : the_row();
	   						$fcphb_portrait = get_sub_field('fcphb_portrait');
	   						$fcphb_name = get_sub_field('fcphb_name');
	   						$fcphb_position = get_sub_field('fcphb_position');
	   						
	   						echo "
	   						<div class='people-wrapper'>
	   							<img class='portrait' src='".$fcphb_portrait['url']."' alt='".$fcphb_portrait['alt']."'>
	   							<div class='people-info'>
	   								<p class='fcphb-name'><strong>".$fcphb_name."</strong></p>
	   								<p class='fcphb-position'>".$fcphb_position."</p>";
	   								
	   									if( have_rows('fcphb_social_media') ):
	   										echo "
	   										<div class='people-social-media'>
	   											<span>Connect</span>
	   										";
	   										while ( have_rows('fcphb_social_media') ) : the_row();
	   											$social_media_type = get_sub_field('social_media_type');
	   											$social_media_link = get_sub_field('social_media_link');
	   											
	   											echo "
	   											<a href='".$social_media_link['url']."' target='_blank'>
	   												<img src='".$theme_path."/assets/social-media/".$social_media_type."-logo-blue.png' alt='".$social_media_type."'>
	   											</a>
	   											";
	   										
	   										endwhile;
	   										echo "</div>";
	   									endif;
	   									
	   						echo	"
	   							</div>
	   						</div>
	   						";
	   					endwhile;
	   				endif;
	   			
	   		echo "		</div>
	   				</div>
	   			</div>
	   		</section>
       		";

 	   	  // --------------------------- //
         // - CASE: COMPANY INFO BLOCK -//
        // --------------------------- //
       elseif( get_row_layout() == 'fc_company_info_block' ):
       		if( have_rows('information', 'option') ):
       			while( have_rows('information', 'option') ): the_row();
	   				$phone_number = get_sub_field('phone_number', 'option');
	   				$address = get_sub_field('address', 'option');
	   			endwhile;
	   		endif;
	   		
       		echo "
       		<!-- Company Info Block -->
   			<section class='generic-lg bg-teal'>
   				<div class='company-info-block generic-wrapper'>
	   				<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2378.6146371733503!2d-2.9719051841593815!3d53.40383307999107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487b211ae153ada9%3A0xb6a1a59bf543d7a8!2sSafe%20Steps!5e0!3m2!1sen!2suk!4v1596496122182!5m2!1sen!2suk' width='600' height='450' frameborder='0' style='border:0;' allowfullscreen='' aria-hidden='false' tabindex='0'></iframe>   
	   							
	   				<div class='company-info-wrapper'>
	   					<p class='company-phone'>".$phone_number."</p>";
	   					
					if( have_rows('social_media', 'option') ):
						echo "<div class='sm-icons'>";
					    while( have_rows('social_media', 'option') ): the_row();
					        $social_media_type = get_sub_field('social_media_type', 'option');
							$social_media_link = get_sub_field('social_media_link', 'option');
					    
					     echo "
					     	<a href='".$social_media_link['url']."'>
					     		<img src=".$theme_path."'/assets/social-media/".$social_media_type."-logo-yellow.png'>
					     	</a>";
					    endwhile;
						echo "</div>";					
					endif;
								
	   			echo   "<p class='company-address'>".$address."</p>
	   				</div>
   				</div>
			</section>
       		";


 	   	  // --------------------------- //
         // - CASE: IMAGE TRIPTYCH BLOCK -//
        // --------------------------- //
       elseif( get_row_layout() == 'fc_image_triptych_block' ):
			$fcitb_title = get_sub_field('fcitb_title');
			$fcitb_intro = get_sub_field('fcitb_intro');
						
   			echo "
   			<section class='generic-lg bg-white'>
   				<div class='generic-wrapper image-triptych-block'>
   				<h2>".$fcitb_title."</h2>
   				<p>".$fcitb_intro."</p>
   				";
   				
   				if( have_rows('fcitb_images') ):
   					echo "<div class='image-triptych-container'>";
   					while( have_rows('fcitb_images') ): the_row();
   						$fcitb_image = get_sub_field('fcitb_image');
   						$fcitb_image_link = get_sub_field('fcitb_image_link');
   						
   						if ($fcitb_image_link) {
	   						echo "<a class='image-triptych' href='".$csitb_image_link['url']."' target='".$csitb_image_link['target']."'>";
   						} else {
	   						echo "<div class='image-triptych'>";
   						}
   						
   						echo "<img class='image-triptych' src='".$fcitb_image['url']."' alt='".$fcitb_image['alt']."'>";
   						
   						if ($fcitb_image_link) {
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