<?php
/**
 * Team Post Type single file.
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
			$subtitle = realgym_get_meta_value( 'realgymcore_subtitle' );
			$classes  = realgym_get_meta_value( 'realgymcore_trainer_classes' );
			?>
			<section <?php post_class( 'section-single-team' ); ?>>
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-12">
							<?php if ( get_the_post_thumbnail_url( null, 'realgym-post-thumbnail' ) !== false ) { ?>
								<div class="team-member-image-wrapper">
									<img src="<?php echo esc_url( get_the_post_thumbnail_url( null, 'realgym-post-thumbnail' ) ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( the_title() ) ); ?>">
									<div class="image-content">
										<div class="image-content__share"><?php echo esc_html__( 'Follow', 'realgym' ); ?></div>
										<div class="image-content__social-links"><?php do_action( 'realgym_get_team_member_social_links_html', get_the_ID() ); ?></div>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="col-md-8 col-12">
							<div class="team-member-content">
								<h2 class="realgym-display-2">
									<?php the_title(); ?>
								</h2>
								<?php if ( ! empty( $subtitle ) ) : ?>
									<h6 class="subtitle realgym-opacity60 realgym-text-1"><?php echo esc_html( $subtitle ); ?></h6>
								<?php endif; ?>

								<div class="person-info">
									<div class="joining-date"><span class="realgym-text-3 realgym-opacity60"><?php echo esc_html__( 'Joining Date', 'realgym' ); ?></span> <?php echo esc_html( apply_filters( 'realgymcore_wp_date', realgym_get_meta_value( 'realgymcore_joining_date' ) ) ); ?></div>
									<div class="experience"><span class="realgym-text-3 realgym-opacity60"><?php echo esc_html__( 'Experience', 'realgym' ); ?></span> <?php echo esc_html( realgym_get_meta_value( 'realgymcore_experience' ) ); ?></div>
									<div class="training"><span class="realgym-text-3 realgym-opacity60"><?php echo esc_html__( 'Training', 'realgym' ); ?></span> <?php echo esc_html( realgym_get_meta_value( 'realgymcore_training' ) ); ?></div>
								</div>

								<div class="detailed-content">
									<?php the_content(); ?>
								</div>

								<div class="personal-skills">
									<h3 class="realgym-display-3"><?php echo esc_html__( 'Personal Skills', 'realgym' ); ?></h3>
									<div class="row">
										<div class="col-12 col-lg-6"><?php do_action( 'realgym_progress_bar_html', esc_html__( 'Weight Lifting', 'realgym' ), realgym_get_meta_value( 'realgymcore_weight_lifting' ) ); ?></div>
										<div class="col-12 col-lg-6"><?php do_action( 'realgym_progress_bar_html', esc_html__( 'Cardio Training', 'realgym' ), realgym_get_meta_value( 'realgymcore_cardio_training' ) ); ?></div>
										<div class="col-12 col-lg-6"><?php do_action( 'realgym_progress_bar_html', esc_html__( 'Fat Loss', 'realgym' ), realgym_get_meta_value( 'realgymcore_fat_loss' ) ); ?></div>
										<div class="col-12 col-lg-6"><?php do_action( 'realgym_progress_bar_html', esc_html__( 'Activity', 'realgym' ), realgym_get_meta_value( 'realgymcore_activity' ) ); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row realgym-padding realgym-margin-n40">
						<div class="col-12">
							<?php
							if ( count( $classes ) > 0 ) :
								$classes = implode( ',', $classes );
								?>
								<div class="member-classes-wrapper">
									<h2 class="realgym-display-2 realgym-margin-bottom"><?php echo esc_html__( 'My Classes', 'realgym' ); ?></h2>
									<?php echo do_shortcode( '[realgymcore-vc-post-shortcode post_ids="' . $classes . '" post_type="realgym-class" limit="3" items_per_row="4"]' ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

			<?php wp_reset_postdata(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
