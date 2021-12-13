<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
			<?php wpzaro_content_bottom(); ?>

	</div><!-- .page-content we need this extra closing tag here -->

	<?php wpzaro_content_after(); ?>

	<?php 
	wpzaro_footer_before(); 

	wpzaro_footer(); 

	wpzaro_footer_after();
	?>
	
</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

