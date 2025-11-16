<!-- Footer -->
<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="footer__content">
            <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
                <?php for ($i = 1; $i <= 4; $i++) : ?>
                    <?php if (is_active_sidebar('footer-' . $i)) : ?>
                        <?php dynamic_sidebar('footer-' . $i); ?>
                    <?php endif; ?>
                <?php endfor; ?>
            <?php else : ?>
                <!-- Default footer content -->
                <div class="footer__section">
                    <h3 class="footer__title"><?php bloginfo('name'); ?></h3>
                    <p class="footer__text">
                        <?php
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) :
                            echo esc_html($description);
                        else :
                            esc_html_e('Explore the neon-lit digital frontier with cutting-edge cyberpunk aesthetics.', 'cyberpunk-industries');
                        endif;
                        ?>
                    </p>
                </div>

                <div class="footer__section">
                    <h3 class="footer__title"><?php esc_html_e('Quick Links', 'cyberpunk-industries'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer__links',
                        'container'      => false,
                        'depth'          => 1,
                        'fallback_cb'    => 'cyberpunk_footer_fallback_menu',
                    ));
                    ?>
                </div>

                <div class="footer__section">
                    <h3 class="footer__title"><?php esc_html_e('Legal', 'cyberpunk-industries'); ?></h3>
                    <ul class="footer__links" role="list">
                        <?php if (get_privacy_policy_url()) : ?>
                            <li><a href="<?php echo esc_url(get_privacy_policy_url()); ?>" class="footer__link"><?php esc_html_e('Privacy Policy', 'cyberpunk-industries'); ?></a></li>
                        <?php endif; ?>
                        <li><a href="#" id="cookie-preferences" class="footer__link"><?php esc_html_e('Cookie Preferences', 'cyberpunk-industries'); ?></a></li>
                    </ul>
                </div>

                <div class="footer__section">
                    <h3 class="footer__title"><?php esc_html_e('Connect', 'cyberpunk-industries'); ?></h3>
                    <div class="social-links" role="list">
                        <!-- Add social media links via WordPress customizer or widgets -->
                        <a href="#" class="social-link" aria-label="<?php esc_attr_e('Twitter', 'cyberpunk-industries'); ?>">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="<?php esc_attr_e('GitHub', 'cyberpunk-industries'); ?>">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="<?php esc_attr_e('LinkedIn', 'cyberpunk-industries'); ?>">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                                <circle cx="4" cy="4" r="2"/>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer__bottom">
            <p class="footer__copyright">
                &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'cyberpunk-industries'); ?>
            </p>
            <p class="footer__compliance">
                <small><?php esc_html_e('This site is GDPR & CCPA compliant. Built with accessibility in mind (WCAG 2.1 Level AA).', 'cyberpunk-industries'); ?></small>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<!-- Service Worker for PWA (Progressive Web App) -->
<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('<?php echo esc_url(get_template_directory_uri() . '/sw.js'); ?>').catch(() => {});
        });
    }
</script>

</body>
</html>
<?php
/**
 * Fallback footer menu if no menu is set
 */
function cyberpunk_footer_fallback_menu() {
    echo '<ul class="footer__links" role="list">';
    wp_list_pages(array(
        'title_li' => '',
        'depth'    => 1,
        'number'   => 4,
    ));
    echo '</ul>';
}
?>
