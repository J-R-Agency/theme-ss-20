<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php
while ( have_posts() ) {
	the_post();
	get_template_part( 'loop-templates/content', 'single' );
}
?>

<section class='generic-post bg-light-teal more-news'>
	<div class='generic-wrapper'>
		<h2>More news</h2>
	
		<div class='blog-cards-container'>
			<?php
				
				$currentID = get_the_ID();
					
				$args = array(
				    'post_type'      => 'post', //write slug of post type
				    'posts_per_page' => 3,
				    'order'          => 'DESC',
				    'post__not_in' => array($currentID)
				 );
				 
				 $query = new WP_Query($args);
				 
				 
				if ( $query->have_posts() ) :
				 
				    while ( $query->have_posts() ) : $query->the_post();
						
						include (get_template_directory().'/global-templates/template-parts/blog-card.php');	
					
					endwhile;
				endif; 
				wp_reset_query();	
						
			?>	
		</div>	
	</div>
</section>

<?php
get_footer();
