<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$categories = get_the_category();

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="generic-lg bg-white">
	
	<h1 class='archive-title'><?php the_category(' ',' '); ?></h1>
	
	<div class='blog-cards-container'>
	<?php
    	$selected_category = $categories[0];
    	
		$args = array(
		    'post_type'      => 'post', //write slug of post type
		    'posts_per_page' => 6,
		    'order'          => 'DESC',
		    'post_status'	 => 'publish',
		    'category__in'   => $selected_category,
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
