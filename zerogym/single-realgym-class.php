<?php
/**
 * Class single file.
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
				<section class="section-content realgym-single-class-section">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-12">
								<?php if ( is_active_sidebar( 'realgymcore-single-class-sidebar' ) ) { ?>
									<div class="realgym-sidebar">
										<?php dynamic_sidebar( 'realgymcore-single-class-sidebar' ); ?>
									</div>
								<?php } ?>
							</div>
							<div class="col-lg-8 col-12">
								<div class="realgymcore-content">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php
			endwhile;
			wp_reset_postdata();
		endif;
		?>
	</main>
<?php
get_footer();
