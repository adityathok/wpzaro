<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php wpzaro_bs_colormode(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php wpzaro_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>

	<div class="site" id="page">

		<?php
		wpzaro_header_before();

		/** 
		* do_action( 'wpzaro_header_open' )
		*
		* wpzaro_header_layout_open()
		* wpzaro_header_navigation_open()
		*/
		wpzaro_header_open();
		
		/** 
		* do_action( 'wpzaro_header' )
		*
		* wpzaro_header_navbar()
		*/
		wpzaro_header();

		/** 
		* do_action( 'wpzaro_header_close' )
		*
		* wpzaro_header_layout_close()
		* wpzaro_header_navigation_close()
		*/
		wpzaro_header_close();

		wpzaro_header_after();
		?>

		<?php wpzaro_content_before(); ?>

		<div class="site-content" id="page-content">

			<?php wpzaro_content_top(); ?>