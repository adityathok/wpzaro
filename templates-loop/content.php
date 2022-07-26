<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$archive_column = (int)get_theme_mod( 'wpzaro_archive_column', '1' );
$equalheight 	= (int)get_theme_mod( 'wpzaro_archive_column_equalheight', '0' );
$clascolumn		= wpzaro_column_classes(['large' => $archive_column, 'equalheight' => $equalheight]);
?>

<article <?php post_class($clascolumn.' pb-3'); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php wpzaro_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php
		the_excerpt();
		wpzaro_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php wpzaro_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
