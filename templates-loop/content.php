<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$archive_column		= (int)wpzaro_theme_setting( 'wpzaro_archive_column', '1' );
$archive_column_m	= (int)wpzaro_theme_setting( 'wpzaro_archive_column_mobile', '1' );
$equalheight 		= (int)wpzaro_theme_setting( 'wpzaro_archive_column_equalheight', '0' );
$clascolumn			= wpzaro_column_classes(['large' => $archive_column, 'small' => $archive_column_m, 'equalheight' => $equalheight]);
$sortcontent		= wpzaro_theme_setting( 'wpzaro_archive_content_sortable', [ 'title', 'thumbnail', 'meta' ,'excerpt','tag'] );
?>

<article <?php post_class($clascolumn.' pb-3'); ?> id="post-<?php the_ID(); ?>">

	<?php foreach( $sortcontent as $key => $value): ?>

		<?php if($value === 'title'): ?>
			<header class="entry-header">
				<?php
				the_title(
					sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>'
				);
				?>
			</header><!-- .entry-header -->
		<?php endif; ?>

		<?php if($value === 'meta'): ?>
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php wpzaro_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		<?php endif; ?>
		
		<?php if($value === 'thumbnail'): ?>
			<?php
			echo wpzaro_ratio_thumbnail([
				'idpost' 	=> $post->ID,
				'ratio' 	=> '16:9',
				'size' 		=> 'medium',
				'linked'	=> true
			]);
			?>
		<?php endif; ?>

		<?php if($value === 'excerpt'): ?>
			<div class="entry-content">

				<?php
				the_excerpt();
				wpzaro_link_pages();
				?>

			</div><!-- .entry-content -->
		<?php endif; ?>

		<?php if($value === 'tag'): ?>
			<div class="entry-tag">

				<?php wpzaro_entry_footer(); ?>

			</div><!-- .post-tag -->
		<?php endif; ?>

	<?php endforeach; ?>


</article><!-- #post-## -->
