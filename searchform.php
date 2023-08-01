<?php

/**
 * The template for displaying search forms
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$uid = wp_unique_id('s-'); // The search form specific unique ID for the input.

$aria_label = '';
if (isset($args['aria_label']) && !empty($args['aria_label'])) {
	$aria_label = 'aria-label="' . esc_attr($args['aria_label']) . '"';
}
?>

<form role="search" class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>" <?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. 
																									?>>
	<label class="screen-reader-text" for="<?php echo $uid; ?>"><?php echo esc_html_x('Search for:', 'label', 'wpzaro'); ?></label>
	<div class="input-group">
		<input type="search" class="field search-field form-control" id="<?php echo $uid; ?>" name="s" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'wpzaro'); ?>">
		<?php if (isset($args['aria_label']) && !empty($args['aria_label']) && $args['aria_label'] == 'icon') : ?>
			<button class="btn btn-dark" type="submit">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
					<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
				</svg>
			</button>
		<?php else : ?>
			<input type="submit" class="submit search-submit btn btn-dark" name="submit" value="<?php echo esc_attr_x('Search', 'submit button', 'wpzaro'); ?>">
		<?php endif; ?>
	</div>

</form>
<?php
