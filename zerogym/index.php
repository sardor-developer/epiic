<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package RealGym
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
}

global $realgym_settings;
$blog_page_sidebar     = false;
$main_content_classes  = 'col-12';
$inner_content_classes = 'col-lg-4 col-md-6';
$columns               = 3;

if ( get_queried_object_id() === intval( get_option( 'page_for_posts' ) ) && ! empty( $realgym_settings['blog_archive_show_sidebar'] ) ) {
	$blog_page_sidebar     = true;
	$main_content_classes  = 'col-lg-8 col-12';
	$inner_content_classes = 'col-md-6';
	$columns               = 2;
}

get_header();

?>
	<main class="page-main">
		<?php if ( have_posts() ) : ?>
			<div class="section-blog">
				<div class="section-blog-content">
					<div class="container">
						<div class="row">
							<?php
							if ( $blog_page_sidebar ) {
								get_template_part( 'partials/blog/sidebar' );
							}
							?>
							<div class="<?php echo esc_attr( $main_content_classes ); ?>">
								<div class="row appendables-wrap" id="collections">
									<?php
									while ( have_posts() ) :
										the_post();
										?>
										<div class="<?php echo esc_attr( $inner_content_classes ); ?>">
											<?php get_template_part( 'content' ); ?>
										</div>
										<?php
									endwhile;
									wp_reset_postdata();
									?>
								</div>
								<?php realgym_pagination( 'post', 'grid', $columns ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php else : ?>
			<?php get_template_part( 'templates/content/error' ); ?>
		<?php endif; ?>
	</main>
<?php get_footer(); ?>
