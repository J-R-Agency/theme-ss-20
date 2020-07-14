<?php
/**
 * More Case Studies
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
$theme_path = get_template_directory_uri();
?>

<section class='generic-lg bg-white more-case-studies'>
	<div class='generic-wrapper'>
		<h2>More case studies</h2>
		
		<div class='case-study-card-container'>
		<?php
			
			$currentID = get_the_ID();
				
			$args = array(
			    'post_type'      => 'page',
			    'posts_per_page' => 3,
			    'order'          => 'DESC',
			    'post__not_in' => array($currentID),
			    'meta_query' => array(
			        array(
			            'key' => '_wp_page_template',
			            'value' => 'page-templates/case-study.php', // folder + template name as stored in the dB
			        )
			    )		    
			    
			 );
			 
			 $query = new WP_Query($args);
			 
			 
			if ( $query->have_posts() ) :
			 
			    while ( $query->have_posts() ) : $query->the_post();
					
					include (get_template_directory().'/global-templates/template-parts/case-study-card-small.php');	
				
				endwhile;
			endif; 
			wp_reset_query();	
					
		?>		
		</div>
	
	</div>
</section>