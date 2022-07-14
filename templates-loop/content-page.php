<?php
/**
 * Partial template for content in page.php
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php
		the_content();
		wpzaro_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php wpzaro_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
