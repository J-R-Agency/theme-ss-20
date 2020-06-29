<?php
/**
 * Template Name: News Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php include_once (get_template_directory() . '/global-templates/template-parts/page-intro.php'); ?>

<?php
	$categories = get_categories();
	foreach($categories as $category) {
		
?>
	<!-- News Block -->
	<section class='generic bg-white more-news'>
		<h2><?php echo $category->name; ?></h2>
	
		<div class='blog-cards-container'>
	
		<?php						
			$args = array(
			    'post_type'      => 'post', //write slug of post type
			    'posts_per_page' => 3,
			    'order'          => 'DESC',
			    'category__in'	 => $category
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
	</section>  
	
	<section class='bg-light-grey link-block'>
		<a href='<?php site_url(); ?>/category-<?php echo $category->slug; ?>'>View More <?php echo $category->name; ?></a>
	</section>
<?php
	}	
?>

<?php get_footer(); ?>