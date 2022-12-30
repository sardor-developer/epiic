<?php
/**
 * 404 Page output.
 *
 * @author  Balcomsoft
 * @package RealGym
 * @version 1.0.0
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
}


get_header();
?>
	<div class="error_page realgym-page-title-section">
		<div class="realgym-page-title-bg"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="error_page_item">
						<div class="error_404">404</div>
						<p><?php esc_html_e( 'The Page You requested Was Not Found !', 'realgym' ); ?></p>
						<div class="realgym-vc-button">
						<a class="vc_btn3-style-realgym-vc-btn-default" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Go back', 'realgym' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
