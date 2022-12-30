<?php
/**
 * Footer output template.
 *
 * @author  Balcomsoft
 * @package RealGym
 * @version 1.0.0
 * @since   1.0.0
 */

global $post;

$footer_logo = realgym_footer_logo();

get_template_part( 'templates/content/apps' );

$company_email = realgym_get_string_option( 'email_address' );

?>
<footer class="page-footer">
	<div class="container">
		<div class="footer-top">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-12 mb-5 mb-lg-0">
					<?php if ( ! empty( $footer_logo ) ) : ?>
						<div class="footer-logo">
							<a href="<?php echo esc_url( home_url() ); ?>" class="logo-img">
								<img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
							</a>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'realgymcore-footer' ) ) { ?>
						<ul class="footer-info">
							<?php dynamic_sidebar( 'realgymcore-footer' ); ?>
						</ul>
					<?php } ?>
				</div>
				<div class="col-lg-3 col-md-6 col-12 order-lg-last mb-5 mb-lg-0">
					<div class="footer-contact">
						<?php if ( realgym_footer_is_subscription_enabled() ) : ?>
							<div class="footer-subscription">
								<?php
								if ( in_array( 'mailchimp-for-wp/mailchimp-for-wp.php', apply_filters( 'active_plugins', (array) get_option( 'active_plugins' ) ), true ) ) {
									echo do_shortcode( '[mc4wp_form]' );
								} else {
									?>
									<form action="" class="form-subscription">
										<input type="email" placeholder="<?php echo esc_attr__( 'Enter', 'realgym' ); ?>" required >
										<button class="form-subscription-submit" type="submit">
											<svg width="12" height="18" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5.17192 6.99999L0.221924 2.04999L1.63592 0.635986L7.99992 6.99999L1.63592 13.364L0.221924 11.95L5.17192 6.99999Z" fill="#0F2D32"/>
											</svg>
										</button>
									</form>
								<?php } ?>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $company_email ) ) : ?>
							<div class="footer-email">
								<a class="realgym-heading-3" title="<?php echo esc_attr( $company_email ); ?>" href="mailto:<?php echo esc_attr( $company_email ); ?>"><?php echo esc_attr( $company_email ); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-4 col-12">
					<?php if ( has_nav_menu( 'footer' ) ) { ?>
						<div class="footer-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
						</div>
						<?php
					}
					?>
				</div>

			</div>
		</div>
		<div class="footer-bottom d-flex justify-content-between">
			<?php dynamic_sidebar( 'realgymcore-footer-bottom' ); ?>
		</div>
	</div>
</footer>
<div class="overlay overlay-menu"></div>


</div>
<?php
get_template_part( 'partials/modals/video-player' );
wp_footer();
?>
</body>
</html>
