<?php
/**
 * Content output.
 *
 * @author  Balcomsoft
 * @package RealGym
 * @version 1.0.0
 * @since   1.0.0
 */

$no_title = empty( get_the_title() );
global $realgym_settings;
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'card blog-item' ); ?>>
	<div class="card-img">
		<?php
		if ( has_post_thumbnail( get_the_ID() ) ) {
			the_post_thumbnail( 'realgym-post-thumbnail' );
		}
		?>
	</div>

	<div class="content">
		<div class="date realgym-text-2">
			<?php if ( $no_title ) : ?>
				<a href="<?php the_permalink(); ?>">
			<?php endif; ?>
			<?php echo get_the_date(); ?>
			<?php if ( $no_title ) : ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="mb-5">
			<h3 class="realgym-archive-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<?php
			if ( empty( $realgym_settings ) || '1' === $realgym_settings['blog_archive_show_excerpt'] ) {
				the_excerpt();
			}
			?>
		</div>
	</div>
</div>
