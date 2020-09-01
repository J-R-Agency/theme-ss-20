<?php
/**
 * Template Name: Blog Archive Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="container generic-lg bg-white">
	
	<h1 class='archive-title'>Archive</h1>
	
	<div class='blog-cards-container'>
	<?php
    	
		$args = array(
		    'post_type'      => 'post', //write slug of post type
		    'posts_per_page' => 6,
		    'order'          => 'DESC',
		    'post_status'	 => 'publish',
		    'paged' => ( get_query_var('paged') ? get_query_var('paged') : 0)
		 );
		 
		$query = new WP_Query( $args );
		$wp_query = $query;
		 
		if ( $query->have_posts() ) :
		 
		    while ( $query->have_posts() ) : $query->the_post();
				
				include (get_template_directory().'/global-templates/template-parts/blog-card.php');	
				
			endwhile;
			
		endif; 
		wp_reset_postdata();
	?>
	</div>
	
	<div class='understrap-pagination'>
		<?php understrap_pagination(); ?>
	</div>
	
</section>

<?php
get_footer();
