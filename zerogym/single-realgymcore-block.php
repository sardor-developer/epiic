<?php
/**
 * Realgym template Block single file.
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
				<div class="section-content realgym-single-realgymcore-block-section">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-12">
								<h2 class="realgym-single-post-title text-uppercase">
										<?php the_title(); ?>
									</h2>
								<div class="blog-content">
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
