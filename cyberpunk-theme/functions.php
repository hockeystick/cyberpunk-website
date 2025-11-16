<?php
/**
 * Cyberpunk Industries Theme Functions
 *
 * @package Cyberpunk_Industries
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function cyberpunk_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'cyberpunk-industries'),
        'footer' => esc_html__('Footer Menu', 'cyberpunk-industries'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'cyberpunk_theme_setup');

/**
 * Set Content Width
 */
function cyberpunk_content_width() {
    $GLOBALS['content_width'] = apply_filters('cyberpunk_content_width', 1200);
}
add_action('after_setup_theme', 'cyberpunk_content_width', 0);

/**
 * Enqueue Styles and Scripts
 */
function cyberpunk_enqueue_scripts() {
    $theme_version = wp_get_theme()->get('Version');

    // Main stylesheet
    wp_enqueue_style(
        'cyberpunk-main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        $theme_version
    );

    // Main JavaScript
    wp_enqueue_script(
        'cyberpunk-main-script',
        get_template_directory_uri() . '/assets/js/app.js',
        array(),
        $theme_version,
        true // Load in footer
    );

    // Add async/defer attributes to scripts for better performance
    add_filter('script_loader_tag', 'cyberpunk_add_async_defer_attribute', 10, 2);

    // Pass data to JavaScript
    wp_localize_script('cyberpunk-main-script', 'cyberpunkData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('cyberpunk_nonce'),
        'themeUrl' => get_template_directory_uri(),
    ));

    // Comment reply script for threaded comments
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cyberpunk_enqueue_scripts');

/**
 * Add async/defer attributes to scripts
 */
function cyberpunk_add_async_defer_attribute($tag, $handle) {
    $async_scripts = array('cyberpunk-main-script');

    if (in_array($handle, $async_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }

    return $tag;
}

/**
 * Register Widget Areas
 */
function cyberpunk_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'cyberpunk-industries'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'cyberpunk-industries'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Footer widget areas
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Footer %d', 'cyberpunk-industries'), $i),
            'id'            => 'footer-' . $i,
            'description'   => sprintf(esc_html__('Footer widget area %d', 'cyberpunk-industries'), $i),
            'before_widget' => '<div class="footer__section">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer__title">',
            'after_title'   => '</h3>',
        ));
    }
}
add_action('widgets_init', 'cyberpunk_widgets_init');

/**
 * Add meta tags to head
 */
function cyberpunk_add_meta_tags() {
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0a0e27">
    <meta name="color-scheme" content="dark">
    <?php
}
add_action('wp_head', 'cyberpunk_add_meta_tags', 1);

/**
 * Add critical inline CSS for performance
 */
function cyberpunk_critical_css() {
    ?>
    <style>
        /* Critical above-the-fold styles */
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,Cantarell,sans-serif;background:#0a0e27;color:#e0e0e0;line-height:1.6;overflow-x:hidden}
        .skip-link{position:absolute;top:-40px;left:0;background:#00ffff;color:#000;padding:8px;z-index:100;text-decoration:none}
        .skip-link:focus{top:0}
    </style>
    <?php
}
add_action('wp_head', 'cyberpunk_critical_css', 2);

/**
 * Add PWA Manifest
 */
function cyberpunk_add_manifest() {
    ?>
    <link rel="manifest" href="<?php echo esc_url(get_template_directory_uri() . '/manifest.json'); ?>">
    <?php
}
add_action('wp_head', 'cyberpunk_add_manifest', 3);

/**
 * Remove WordPress version meta tag
 */
remove_action('wp_head', 'wp_generator');

/**
 * Security: Remove WordPress version from scripts and styles
 */
function cyberpunk_remove_wp_version_strings($src) {
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if (!empty($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('script_loader_src', 'cyberpunk_remove_wp_version_strings');
add_filter('style_loader_src', 'cyberpunk_remove_wp_version_strings');

/**
 * Add security headers
 */
function cyberpunk_add_security_headers() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}
add_action('send_headers', 'cyberpunk_add_security_headers');

/**
 * AJAX Handler for Contact Form
 */
function cyberpunk_handle_contact_form() {
    // Verify nonce
    check_ajax_referer('cyberpunk_nonce', 'nonce');

    // Sanitize inputs
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $subject = sanitize_text_field($_POST['subject'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    // Validate
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array('message' => 'Please fill in all required fields.'));
    }

    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Please enter a valid email address.'));
    }

    // Send email (configure your email settings)
    $to = get_option('admin_email');
    $email_subject = 'Contact Form: ' . $subject;
    $email_message = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = array('From: ' . $name . ' <' . $email . '>');

    $sent = wp_mail($to, $email_subject, $email_message, $headers);

    if ($sent) {
        wp_send_json_success(array('message' => 'Thank you! Your message has been sent successfully.'));
    } else {
        wp_send_json_error(array('message' => 'Sorry, there was an error sending your message. Please try again.'));
    }
}
add_action('wp_ajax_cyberpunk_contact_form', 'cyberpunk_handle_contact_form');
add_action('wp_ajax_nopriv_cyberpunk_contact_form', 'cyberpunk_handle_contact_form');

/**
 * Custom excerpt length
 */
function cyberpunk_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'cyberpunk_excerpt_length');

/**
 * Custom excerpt more
 */
function cyberpunk_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'cyberpunk_excerpt_more');

/**
 * Add body classes
 */
function cyberpunk_body_classes($classes) {
    // Add class if front page
    if (is_front_page()) {
        $classes[] = 'front-page';
    }

    // Add class if has sidebar
    if (is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'cyberpunk_body_classes');

/**
 * Disable WordPress emojis for performance
 */
function cyberpunk_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'cyberpunk_disable_emojis');
