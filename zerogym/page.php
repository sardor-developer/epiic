<?php
/**
 * Default page file.
 *
 * @author  Balcomsoft
 * @package RealGym
 * @version 1.0.0
 * @since   1.0.0
 */

get_header();

global $realgym_settings;

?>
<main class="page-main">
	<div class="container">
		<div class="realgym-unit-wrap">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
			}
			?>
		</div>
		<?php
		wp_link_pages(
			array(
				'before'      => '<div class="pagination" role="navigation">',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			)
		);

		wp_reset_postdata();

		if ( ( '1' === $realgym_settings['page_comment_enabled'] ) || comments_open() ) :
			?>
			<div class="blog-comments">
				<?php comments_template(); ?>
			</div>
		<?php endif ?>
	</div>
</main>

<?php get_footer(); ?>
