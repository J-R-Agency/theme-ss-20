<?php
/**
 * Template Name: Safe Steps Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$theme_path = get_template_directory_uri();

get_header(); ?>

<?php include_once (get_template_directory() . '/global-templates/template-parts/page-intro.php'); ?>


<?php
	$ss_title = get_field('ss_title');
	$ss_images = get_field('ss_images');
	$ss_secondary_list_title = get_field('ss_secondary_list_title');
?>

<?php if ($ss_title):?>
	<section class='generic-lg bg-white safe-steps-intro'>
		<div class='generic-wrapper'>
			<div class='ss-container-top'>
				<div class='ss-container-left'>
					<img class='ss-image left'
						 src='<?php echo $ss_images['ss_image_left']['url']; ?>'
						 alt='<?php echo $ss_images['ss_image_left']['alt']; ?>'>			
				</div>
				
				<div class='ss-container-center'>
					
					<h2><?php echo $ss_title; ?></h2>
					
					<img class='ss-image primary'
						 src='<?php echo $ss_images['ss_primary_image']['url']; ?>'
						 alt='<?php echo $ss_images['ss_primary_image']['alt']; ?>'>
					
					<?php if( have_rows('ss_primary_list') ): ?>
						<ul>
						<?php while( have_rows('ss_primary_list') ) : the_row();
							$ss_primary_list_item = get_sub_field('ss_primary_list_item');
						?>
						
							<li><?php echo $ss_primary_list_item; ?></li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					
				</div>
				
				<div class='ss-container-right'>
					<img class='ss-image right'
						 src='<?php echo $ss_images['ss_image_right']['url']; ?>'
						 alt='<?php echo $ss_images['ss_image_right']['alt']; ?>'>				
				</div>
			</div>
			
			<div class='generic-lg ss-container-bottom'>
				<h2><?php echo $ss_secondary_list_title; ?></h2>
				
				<?php if( have_rows('ss_secondary_list') ): ?>
					<div class='secondary-list'>
					<?php while( have_rows('ss_secondary_list') ) : the_row();
						$ss_primary_list_item = get_sub_field('ss_secondary_list_item');
					?>
						<div class='secondary-list-item'>
							<img src='<?php echo $theme_path; ?>/assets/icons/checkmark-teal.png'>
							<p><?php echo $ss_primary_list_item; ?></p>
						</div>
					<?php endwhile; ?>
					</div>
				<?php endif; ?>		
			</div>
		</div>
	</section>
<?php endif; ?>

<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>

<?php get_footer(); ?>