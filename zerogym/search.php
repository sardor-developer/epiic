<?php
/**
 * Default search file.
 *
 * @author  Balcomsoft
 * @package RealGym
 * @version 1.0.0
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
}

get_header(); ?>
	<main class="page-main">
		<div class="section-blog">
			<div class="section-blog-content">
				<div class="container">
					<div class="row" id="global-search-results">
						<?php get_template_part( 'partials/blog/sidebar' ); ?>
						<div class="col-lg-8 col-12 order-lg-0 order-0">
							<?php
							if ( have_posts() ) {
								?>
								<div class="appendables-wrap">
									<?php
									while ( have_posts() ) :
										the_post();
										?>
										<div class="search-result">
											<div class="result-metas">
												<span class="result-date"><?php echo get_the_date(); ?></span>
												<span class="result-type"><?php echo esc_html( bmst_get_post_type_label( get_the_ID() ) ); ?></span>
											</div>
											<a href="<?php the_permalink(); ?>" class="result-title"><?php the_title(); ?></a>
										</div>
										<?php
									endwhile;
									wp_reset_postdata();
									?>
								</div>
								<?php
								realgym_pagination( 'search' );
							} else {
								get_template_part( 'templates/content/error' );
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
