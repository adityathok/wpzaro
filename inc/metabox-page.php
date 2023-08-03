<?php
abstract class WPzaro_Page_Meta_Box
{
    /**
     * Set up and add the meta box.
     */
    public static function add()
    {
        add_meta_box(
            'wpzaro_page_box_id',   // Unique ID
            'WPzaro Settings',      // Box title
            [self::class, 'html'],   // Content callback, must be of type callable
            'page',                 // Post type
            'normal',               // Context
            'high'                 // priority
        );
    }

    /**
     * Save the meta box selections.
     *
     * @param int $post_id  The post ID.
     */
    public static function save(int $post_id)
    {
        if (array_key_exists('wpzaro_navbar_overlay', $_POST)) {
            update_post_meta(
                $post_id,
                'wpzaro_navbar_overlay',
                $_POST['wpzaro_navbar_overlay']
            );
        }
        if (array_key_exists('wpzaro_page_title', $_POST)) {
            update_post_meta(
                $post_id,
                'wpzaro_page_title',
                $_POST['wpzaro_page_title']
            );
        }
    }

    /**
     * Display the meta box HTML to the user.
     *
     * @param WP_Post $post   Post object.
     */
    public static function html($post)
    {
        $value      = get_post_meta($post->ID, 'wpzaro_navbar_overlay', true);
        $value_pt   = get_post_meta($post->ID, 'wpzaro_page_title', true);
?>
        <label for="wpzaro_page_field">Navbar Overlay :</label>
        <select name="wpzaro_navbar_overlay" id="wpzaro_navbar_overlay" class="postbox">
            <option value="">Default</option>
            <option value="enable" <?php selected($value, 'enable'); ?>>Enable</option>
            <option value="disable" <?php selected($value, 'disable'); ?>>Disable</option>
        </select>
        <br>
        <label for="wpzaro_page_field">Page Title :</label>
        <select name="wpzaro_page_title" id="wpzaro_page_title" class="postbox">
            <option value="">Default</option>
            <option value="hide" <?php selected($value_pt, 'hide'); ?>>Hide</option>
        </select>
<?php
    }
}

add_action('add_meta_boxes', ['WPzaro_Page_Meta_Box', 'add']);
add_action('save_post', ['WPzaro_Page_Meta_Box', 'save']);
