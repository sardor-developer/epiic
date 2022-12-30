<?php
/**
 * Default single file.
 *
 * @author  Balcomsoft
 * @package RealGym
 * @version 1.0.0
 * @since   1.0.0
 */

get_header();
$socials   = bmst_get_active_social_links();
$post_tags = get_the_tag_list();
?>
	<main class="page-main">
		<?php
		if ( have_posts() ) :
			?>
			<?php
			while ( have_posts() ) :
				the_post();
				$post_cats = wp_get_post_categories( get_the_ID() );
				?>
				<section class="section-content">
					<div class="container">
						<div class="row">
							<?php get_template_part( 'partials/blog/sidebar' ); ?>
							<div class="col-lg-8 col-12">
								<div class="blog-content">
									<div class="realgym-single-featured-image">
									<?php
									if ( has_post_thumbnail( get_the_ID() ) ) {
										the_post_thumbnail( 'realgym-blog-single' );
									}
									?>
									</div>
									<div class="realgym-single-post-meta">
										<div class="single-date-category">
											<div class="single-post-metas">
												<span><?php echo get_the_date(); ?></span>
												<?php
												if ( ! empty( $post_cats ) && ! is_wp_error( $post_cats ) ) :
													foreach ( $post_cats as $category_id ) :
														?>
														<span>
															<a href="<?php echo esc_url( get_category_link( $category_id ) ); ?>">
																<?php echo esc_html( get_cat_name( $category_id ) ); ?>
															</a>
														</span>
														<?php
													endforeach;
												endif;
												?>
											</div>
										</div>
										<div class="single-socials">
											<?php
											if ( ! empty( $socials ) ) {
												foreach ( $socials as $social ) {
													?>
													<a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" title="<?php echo esc_attr( $social['title'] ); ?>">
														<i class="fi fi-brands-<?php echo esc_attr( strtolower( $social['title'] ) ); ?>"></i>
													</a>
													<?php
												}
											}
											?>
										</div>
									</div>
									<h2 class="realgym-single-post-title realgym-display-2">
										<?php the_title(); ?>
									</h2>
									<div class="realgym-unit-wrap">
										<?php the_content(); ?>
									</div>
									<?php
									wp_link_pages(
										array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'realgym' ),
											'after'  => '</div>',
										)
									);

									if ( ! is_wp_error( $post_tags ) && ! empty( $post_tags ) ) :
										?>
										<div class="realgym-post-tags">
											<?php echo wp_kses_post( $post_tags ); ?>
										</div>
									<?php endif; ?>

									<div class="realgym-single-page-links">
										<div class="realgym-post-prev"><?php previous_post_link( '%link', '<span title="%title"><i class="fi fi-ss-angle-small-left"></i> ' . esc_attr__( 'Previous Post', 'realgym' ) . '</span>' ); ?></div>
										<div class="realgym-post-next"> <?php next_post_link( '%link', '<span title="%title">' . esc_attr__( 'Next Post', 'realgym' ) . ' <i class="fi fi-ss-angle-small-right"></i></span>' ); ?></div>
									</div>
								</div>

								<div class="blog-comments">
									<?php
									comments_template();
									?>
								</div>
							</div>
						</div>
					</div>
				</section>

				<?php
				wp_reset_postdata();
				?>
			<?php endwhile; ?>
		<?php endif; ?>
	</main>
<?php get_footer(); ?>
