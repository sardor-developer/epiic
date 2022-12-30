<?php
/**
 * Video single file.
 *
 * @author  Balcomsoft
 * @package RealGym
 * @version 1.0.0
 * @since   1.0.0
 */

get_header();
?>
	<main class="page-main">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<div class="section-content realgym-single-video-section">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-12">
								<?php if ( is_active_sidebar( 'realgymcore-single-video-sidebar' ) ) { ?>
									<?php dynamic_sidebar( 'realgymcore-single-video-sidebar' ); ?>
								<?php } ?>
							</div>
							<div class="col-lg-8 col-12">
								<div class="blog-content">
									<div class="realgym-video-player realgym-video-logo-wrap">
										<?php echo bmst_display_embedded_video( get_the_ID(), true, false ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									</div>
									<h2 class="realgym-single-post-title text-uppercase">
										<?php the_title(); ?>
									</h2>
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
		endif;
		?>
	</main>
<?php
get_footer();
