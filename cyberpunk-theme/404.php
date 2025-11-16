<?php
/**
 * 404 Error Page Template
 *
 * @package Cyberpunk_Industries
 */

get_header();
?>

<main id="main-content" role="main" class="site-main">
    <div class="container">
        <div class="error-404-content" style="text-align: center; padding: 4rem 0; min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <div class="error-code" style="font-size: 8rem; font-weight: bold; color: #00ffff; text-shadow: 0 0 20px #00ffff, 0 0 40px #00ffff; line-height: 1; margin-bottom: 1rem;">
                404
            </div>
            <h1 style="font-size: 2rem; color: #00ffff; margin-bottom: 1rem;">
                <?php esc_html_e('Page Not Found', 'cyberpunk-industries'); ?>
            </h1>
            <p style="font-size: 1.125rem; color: #a0a0a0; margin-bottom: 2rem; line-height: 1.6; max-width: 600px;">
                <?php esc_html_e('The page you\'re looking for has vanished into the digital void. It might have been deleted, moved, or never existed in this reality.', 'cyberpunk-industries'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary btn--lg">
                <?php esc_html_e('Return to Home', 'cyberpunk-industries'); ?>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
