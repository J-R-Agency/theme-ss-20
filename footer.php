<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$theme_path = get_template_directory_uri();
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<section class="bg-dark-teal">
	<div class='footer-container generic-wrapper'>
		<!-- FOOTER LEFT -->
		<div class='footer-left'>
			<?php if( have_rows('logo', 'option') ): ?>
			    <?php while( have_rows('logo', 'option') ): the_row(); 
			
			        // Get sub field values.
			        $secondary_logo = get_sub_field('secondary_logo', 'option');
			
			    ?>
			        <img id='footer-logo' src="<?php echo esc_url( $secondary_logo['url'] ); ?>" alt="<?php echo esc_attr( $secondary_logo['alt'] ); ?>" />
			    <?php endwhile; ?>
			<?php endif; ?>
			
			<?php if( have_rows('information', 'option') ): ?>
			    <?php while( have_rows('information', 'option') ): the_row(); 
			
			        // Get sub field values.
			        $phone_number = get_sub_field('phone_number', 'option');
					$email = get_sub_field('email', 'option');
			    ?>
			        <a id='tel' href='tel:<?php echo $phone_number; ?>'><?php echo $phone_number; ?></a>
			        <a id='email' href='mailto:<?php echo $email; ?>'><?php echo $email; ?></a>
			    <?php endwhile; ?>
			<?php endif; ?>	
			
			<p id='copyright'>
				Copyright &copy; 2018-<?php echo date('Y'); ?> Safe Steps Ltd.<br>
				All rights reserved.<br>
				Company number (<?php $information = get_field('information', 'option'); echo $information['company_number'];?>)
			</p>
		</div>
		
		<!-- FOOTER RIGHT -->
		<div class='footer-right'>
			
			<div class='footer-products'>
				<h3>Products</h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'products-menu'
					)
				);
				?>	
			</div>
			
			<div class='footer-company'>
				<h3>Company</h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'footer-menu'
					)
				);
				?>			
			</div>
			
			<div class='footer-contact'>
				<h3>Contact</h3>
				
				<div class='footer-social-media'>
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'contact-menu'
						)
					);
					?>
					<?php if( have_rows('social_media', 'option') ): ?>
						<div class='sm-icons'>
					    <?php while( have_rows('social_media', 'option') ): the_row(); 
					
					        // Get sub field values.
					        $social_media_type = get_sub_field('social_media_type', 'option');
							$social_media_link = get_sub_field('social_media_link', 'option');
					    ?>
					        <a href='<?php echo $social_media_link['url']; ?>'><img src='<?php echo $theme_path; ?>/assets/social-media/<?php echo $social_media_type; ?>-logo-white.png'></a>
					    <?php endwhile; ?>
						</div>
					<?php endif; ?>					
								
				</div> <!-- end social media -->
				
				<?php if( have_rows('information', 'option') ): ?>
					<div id='footer-address'>
				    <?php while( have_rows('information', 'option') ): the_row(); 
				
				        // Get sub field values.
				        $address = get_sub_field('address', 'option');
				    ?>
				        <?php echo $address; ?>
				    <?php endwhile; ?>
					</div>
				<?php endif; ?>	
				
			</div>
			
		</div>
	
	</div>
</section>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

