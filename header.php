<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$theme_path = get_template_directory_uri();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	

	<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

	<nav id="main-nav" class="navbar navbar-expand-lg navbar-dark bg-white" aria-labelledby="main-nav-label">

		<h2 id="main-nav-label" class="sr-only">
			<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
		</h2>

	<?php if ( 'container' === $container ) : ?>
		<div class="container">
	<?php endif; ?>

				<!-- Your site title as branding in the menu -->
				<?php if ( ! has_custom_logo() ) { ?>

					<?php if ( is_front_page() && is_home() ) : ?>

						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

					<?php else : ?>

						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

					<?php endif; ?>

					<?php
				} else {
					the_custom_logo();
				}
				?>
				<!-- end custom logo -->

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
				<span class="navbar-toggler-icon"></span>
			</button>
				
				<div id="navbarNavDropdown" class="menu-container navbar-collapse collapse">
					<!-- The WordPress Menu goes here -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
					
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'secondary-menu',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'secondary-menu',
						)
					);
					?>
				</div>
			
			
		<?php if ( 'container' === $container ) : ?>
		</div><!-- .container -->
		<?php endif; ?>

	</nav><!-- .site-navigation -->


	
	<!-- Notice bar -->		
	<?php if( have_rows('notice_bar') ): ?>
		<section class='login-container bg-teal'>
	    <?php while( have_rows('notice_bar') ): the_row(); 
	
	        // Get sub field values.
	        $nb_text = get_sub_field('nb_text');
			$nb_button_color = get_sub_field('nb_button_color');
			$nb_link = get_sub_field('nb_link');
	    ?>
	        <p><?php echo $nb_text; ?></p>
	        
	        <?php if ($nb_link): ?>
	        	<a class='<?php echo $nb_button_color; ?>-btn <?php echo sanitize_title($nb_link['title']); ?>' href="<?php echo $nb_link['url']; ?>">
					<?php echo $nb_link['title']; ?>
				</a>
			<?php elseif (!$nb_link): ?>
				<a class='blue-btn login' href="#">Login</a>
			<?php endif; ?>
	    <?php endwhile; ?>
	    </div>
	<?php endif; ?>
		
	
