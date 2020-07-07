<?php
/**
 * Template Name: Case Studies Parent Template
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

<!-- FEATURED CASE STUDIES -->
<?php
					
	$args = array(
	    'post_type'      => 'page', //write slug of post type
	    'posts_per_page' => -1,
	    'post_parent'    => $post->ID, //place here id of your parent page
	    'orderby'		 => 'menu_order',
	    'order'          => 'ASC'
	 );
	 
	$children = new WP_Query( $args );
	 
	 
	if ( $children->have_posts() ) :
	 	echo "<section class='generic-lg bg-light-grey case-studies-container'>";
	    while ( $children->have_posts() ) : $children->the_post();
			$featured = get_field('featured');
			
			if($featured == true):
				include (get_template_directory().'/global-templates/template-parts/case-study-card-large.php');
			endif;
		
		endwhile;
		echo "</section>";
	endif; 
	wp_reset_query();	
			
?>


<?php
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
?>

<!-- NON-FEATURED CASE STUDIES -->
<?php
					
	$args = array(
	    'post_type'      => 'page', //write slug of post type
	    'posts_per_page' => -1,
	    'post_parent'    => $post->ID, //place here id of your parent page
	    'orderby'		 => 'menu_order',
	    'order'          => 'ASC'
	 );
	 
	$children = new WP_Query( $args );
	 
	 
	if ( $children->have_posts() ) :
	 	echo "<section class='generic-lg bg-white'>
	 			<h2 style='text-align:center'>More case studies</h2>
	 			<div class='case-study-card-container'>
	 	";
	    while ( $children->have_posts() ) : $children->the_post();
			$featured = get_field('featured');
			
			if($featured == false):
				include (get_template_directory().'/global-templates/template-parts/case-study-card-small.php');
			endif;
		
		endwhile;
		echo "</div>
		</section>";
	endif; 
	wp_reset_query();	
			
?>



<?php get_footer(); ?>