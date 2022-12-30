<?php
/**
 * Video taxonomy archive file.
 *
 * @author  Balcomsoft
 * @package RealGym
 * @version 1.0.0
 * @since   1.0.0
 */

get_header();
?>
	<main class="video-category-main">
		<?php
		if ( have_posts() ) {
			get_template_part( 'templates/content/loop-video' );
		} else {
			get_template_part( 'templates/content/error' );
		}
		?>
	</main>
<?php
get_footer();
