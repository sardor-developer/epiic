<?php
/**
 * Stories Post Type single file.
 *
 * @author  Balcomsoft
 * @package RealGym
 * @version 1.0.0
 * @since   1.0.0
 */

get_header(); ?>
<main class="page-main">
	<?php
	if ( have_posts() ) :
		?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<section <?php post_class( 'section-single-realgym-stories' ); ?>>
				<div class="realgym-margin">
					<div class="container">
						<div class="detailed-content">
							<?php the_content(); ?>
						</div>
						<?php get_template_part( 'partials/stories/profile-data' ); ?>
					</div>
				</div>
				<div class="realgym-margin">
					<div class="container">
						<?php get_template_part( 'partials/stories/quotation' ); ?>
					</div>
				</div>
				<div class="realgym-margin">
					<div class="container">
						<?php get_template_part( 'partials/stories/first-month' ); ?>
					</div>
				</div>
				<div class="realgym-margin realgym-stories-gallery">
					<div class="container">
						<?php get_template_part( 'partials/stories/gallery-images' ); ?>
					</div>
				</div>
				<div class="realgym-margin">
					<div class="container">
						<?php get_template_part( 'partials/stories/after-six-months' ); ?>
					</div>
				</div>
				<div class="realgym-ba-block">
					<div class="container">
						<div class="row">
							<?php get_template_part( 'partials/stories/before-after-block' ); ?>
						</div>
					</div>
				</div>
			</section>
			<?php wp_reset_postdata(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
