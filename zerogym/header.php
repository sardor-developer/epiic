<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package    RealGym
 * @since      1.0.0
 */

global $realgym_settings, $post;

wp_reset_postdata();

$header_classes = '';

if ( ! empty( realgym_get_string_option( 'header_position' ) ) && realgym_get_string_option( 'header_position' ) !== 'static' ) {
	$header_classes .= ' header-' . realgym_get_string_option( 'header_position' );
}
if ( ! empty( realgym_get_string_option( 'is_header_sticky' ) ) ) {
	$header_classes .= ' header-sticky-desktop';
}
if ( ! empty( realgym_get_string_option( 'is_header_sticky_tablet' ) ) ) {
	$header_classes .= ' header-sticky-tablet';
}
if ( ! empty( realgym_get_string_option( 'is_header_sticky_mobile' ) ) ) {
	$header_classes .= ' header-sticky-mobile';
}

$header_style = '';
if ( ! empty( realgym_get_string_option( 'custom_header_bg' ) ) ) {
	$header_style .= 'background-color:' . realgym_get_string_option( 'custom_header_bg' ) . ';';
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=1170"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) : ?>
			<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url( get_template_directory_uri() . '/favicon.ico' ); ?>"/>
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="page-wrapper">

	<header id="header" class="page-header<?php echo esc_attr( realgym_filtered_style( $header_classes ) ); ?>"
			style="<?php echo esc_attr( $header_style ); ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-7 d-flex align-items-center">
					<?php get_template_part( 'templates/header/logo' ); ?>
				</div>
				<div class="col-lg-9 col-5 justify-content-end d-flex">
					<?php get_template_part( 'templates/header/toggle-button', null, array( 'toggle_type' => 'open' ) ); ?>
					<div class="header-menu">
						<div class="container">
							<div class="mobile-header">
								<?php get_template_part( 'templates/header/logo', null, array( 'is_mobile' => true ) ); ?>
								<div class="mobile-header-tools">
									<?php get_template_part( 'templates/header/toggle-button', null, array( 'toggle_type' => 'close' ) ); ?>
								</div>
							</div>

							<?php
							if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu(
									array(
										'theme_location'  => 'primary',
										'menu_class'      => 'navbar-nav',
										'container'       => '',
										'container_class' => '',
										'walker'          => new REALGYM_Primary_Menu_Walker(),
									)
								);
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
<?php
get_template_part( 'templates/header/page-title' );
