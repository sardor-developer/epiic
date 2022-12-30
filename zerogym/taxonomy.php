<?php
/**
 * Default taxonomy file.
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
	<main class="page-main">
		<?php if ( have_posts() ) : ?>
			<div class="section-blog">
				<div class="section-blog-content">
					<div class="container">
						<div class="row" id="collections">
							<?php
							while ( have_posts() ) :
								the_post();
								?>
								<div class="col-lg-4 col-md-6">
									<?php get_template_part( 'content' ); ?>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
		<?php else : ?>
			<?php get_template_part( 'templates/content/error' ); ?>
		<?php endif; ?>
	</main>
<?php
get_footer();
