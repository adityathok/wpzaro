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

			</div><!-- #page-content we need this extra closing tag here -->

		<?php wpzaro_content_after(); ?>

	<?php 
	wpzaro_footer_before(); 

	/** 
	* do_action( 'wpzaro_footer_open' )
	*
	* wpzaro_footer_layout_open()
	*/
	wpzaro_footer_open();

	/** 
	* do_action( 'wpzaro_footer' )
	*
	* wpzaro_footer_content()
	* wpzaro_footer_floatwhatsapp()
	* wpzaro_footer_scrolltotop()
	*/
	wpzaro_footer(); 

	/** 
	* do_action( 'wpzaro_footer_close' )
	*
	* wpzaro_footer_layout_close()
	*/
	wpzaro_footer_close();

	/** 
	* do_action( 'wpzaro_footer_after' )
	*
	* wpzaro_footer_scrolltotop()
	* wpzaro_footer_floatwhatsapp()
	*/
	wpzaro_footer_after();
	?>
	
</div><!-- #page .site closing div -->

<?php wp_footer(); ?>

</body>

</html>

