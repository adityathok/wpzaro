<?php

/**
 * Post rendering content according to caller of get_template_part
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>

<article <?php post_class('col-12 pb-3'); ?> id="post-<?php the_ID(); ?>">

	<div class="border-bottom pb-2">

		<?php
		echo wpzaro_ratio_thumbnail([
			'idpost' 	=> $post->ID,
			'ratio' 	=> '16:9',
			'size' 		=> 'medium',
			'linked'	=> true
		]);
		?>

		<header class="entry-header">
			<?php
			the_title(
				sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
				'</a></h2>'
			);
			?>
		</header><!-- .entry-header -->

		<?php if ('post' === get_post_type()) : ?>
			<div class="entry-meta">
				<?php wpzaro_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>


		<div class="entry-content">

			<?php
			the_excerpt();
			wpzaro_link_pages();
			?>

		</div><!-- .entry-content -->

		<a class="link-primary wpzaro-read-more-link" href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
			Read More...
			<span class="screen-reader-text"> from <?php echo get_the_title(get_the_ID()); ?></span>
		</a><!-- .post-more-link -->


		<div class="entry-tag pt-2">

			<?php wpzaro_entry_footer(); ?>

		</div><!-- .post-tag -->

	</div>

</article><!-- #post-## -->