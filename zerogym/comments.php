<?php
/**
 * Comments output.
 *
 * @author  Balcomsoft
 * @package RealGym
 * @version 1.0.0
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
}

if ( post_password_required() ) {
	?>
	<p class="nocomments">
		<?php
		esc_html_e(
			'This post is password protected. Enter the password to view comments.',
			'realgym'
		);
		?>
	</p>
	<?php
	return false;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) { ?>
		<h2 class="comments-title realgym-display-2">
			<?php
			echo sprintf(
				/* translators: number of comments */
				esc_html__( 'Comments (%s)', 'realgym' ),
				esc_html( get_comments_number() )
			);
			?>
		</h2>

		<ul class="comment-list list-unstyled">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 75,
					'callback'    => 'realgym_comment',
				)
			);
			?>
		</ul>

		<?php
		if ( get_comment_pages_count() > 1
			&& get_option( 'page_comments' )
		) {
			?>
			<nav class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text">
					<?php
					esc_html_e(
						'Comment navigation',
						'realgym'
					);
					?>
				</h2>
				<div class="nav-links">
					<?php
					$prev_link = get_previous_comments_link(
						__(
							'Older Comments',
							'realgym'
						)
					);
					if ( $prev_link ) {
						printf(
							'<div class="nav-previous">%s</div>',
							wp_kses_post( $prev_link )
						);
					}
					$next_link = get_next_comments_link(
						__(
							'Newer Comments',
							'realgym'
						)
					);
					if ( $next_link ) {
						printf(
							'<div class="nav-next">%s</div>',
							wp_kses_post( $next_link )
						);
					}
					?>
				</div>
			</nav>
		<?php } ?>

	<?php } ?>

	<?php
	if ( ! comments_open() ) {
		?>
		<p class="no-comments mt-5">
			<?php esc_html_e( 'Comments are closed.', 'realgym' ); ?>
		</p>
		<?php
	}

	comment_form(
		array(
			'title_reply'          => esc_html__( 'Leave a Comment', 'realgym' ),
			'title_reply_before'   => '<h2 id="reply-title" class="realgym-display-2 text-uppercase comment-reply-title">',
			'title_reply_after'    => '</h2>',
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
		)
	);
	?>

</div>
