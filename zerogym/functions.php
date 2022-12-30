<?php
/**
 * REALGYM functions and definitions.
 *
 * @author  Balcomsoft
 * @package RealGym
 * @version 1.0.0
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * Define variables
 */
define( 'REALGYM_DIR', get_parent_theme_file_path() ); // template directory.
define( 'REALGYM_URI', get_parent_theme_file_uri() ); // template directory uri.
define( 'REALGYM_THEME_NAME', 'RealGym' ); // Framework directory.
define( 'REALGYM_THEME_SETTINGS_OPT', 'realgym_settings' ); // Framework directory.
define( 'REALGYM_FRAMEWORK', REALGYM_DIR . '/framework' ); // Framework directory.
define( 'REALGYM_ADMIN', REALGYM_FRAMEWORK . '/admin' ); // admin directory.
define( 'REALGYM_PLUGINS', REALGYM_FRAMEWORK . '/wp_booster' ); // plugins directory.
define( 'REALGYM_MENU', REALGYM_FRAMEWORK . '/menu' ); // menu directory.
define( 'REALGYM_ADMIN_FUNCTIONS', REALGYM_FRAMEWORK . '/functions' ); // functions directory.
define( 'REALGYM_ADMIN_OPTIONS_DIR', REALGYM_ADMIN . '/theme_options' ); // options directory.
define( 'REALGYM_ASSETS', REALGYM_URI . '/assets' ); // css uri.
define( 'REALGYM_CSS', REALGYM_ASSETS . '/css' ); // css uri.
define( 'REALGYM_JS', REALGYM_ASSETS . '/js' ); // javascript uri.
define( 'REALGYM_PLUGINS_URI', REALGYM_URI . '/framework/wp_booster' ); // plugins uri.
define( 'REALGYM_OPTIONS_URI', REALGYM_URI . '/framework/admin/theme_options' ); // theme options uri.
define( 'REALGYM_LIB_URI', REALGYM_URI . '/framework/lib' ); // library uri.
define( 'REALGYM_VC_ELEMENTS_OUTPUT_PATH', 'framework/vc-components/output' ); // options directory.


$theme_version = '';
$theme         = wp_get_theme();
if ( is_child_theme() ) {
	$theme = wp_get_theme( $theme->template );
}
$theme_version = $theme->version;
define( 'REALGYM_VERSION', $theme_version );
define( 'THEME_NAME', REALGYM_THEME_NAME );

$upload_dir = wp_upload_dir();
define( 'REALGYM_STYLES', $upload_dir['basedir'] . '/realgym_styles' );
define( 'REALGYM_STYLES_URI', $upload_dir['baseurl'] . '/realgym_styles' );

global $wp_filesystem;
if ( empty( $wp_filesystem ) ) {
	include_once ABSPATH . '/wp-admin/includes/file.php';
	WP_Filesystem();
}

/**
 * WordPress theme check
 */
// set content width.
if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}

/**
 * Info for the Panel.
 */
require_once 'inc/balcomsoft-conf.php';

/**
 * Include Helpers functions
 */
require_once 'inc/helpers.php';

/**
 * Include Hooks functions
 */
require_once 'inc/hooks.php';

/**
 * Breadcrumbs Helper file
 */
require_once 'inc/breadcrumbs.php';

/**
 * Autoload files
 */
require_once 'inc/autoload.php';

/**
 * Include RealGym Admin Options
 */
if ( file_exists( get_parent_theme_file_path() . '/panel/init.php' ) && current_user_can( 'manage_options' ) ) {
	include_once get_parent_theme_file_path() . '/panel/init.php';
}

/**
 * Redux theme options
 */
if ( ! isset( $realgym_settings ) ) {
	include_once REALGYM_FRAMEWORK . '/wp_booster/theme_options/settings.php';
}
