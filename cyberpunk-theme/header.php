<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip to main content for accessibility -->
<a href="#main-content" class="skip-link"><?php esc_html_e('Skip to main content', 'cyberpunk-industries'); ?></a>

<!-- Cookie Consent Banner (GDPR/CCPA Compliant) -->
<aside id="cookie-consent" class="cookie-consent" role="region" aria-labelledby="cookie-consent-title" aria-describedby="cookie-consent-description" aria-live="polite" hidden>
    <div class="cookie-consent__content">
        <h2 id="cookie-consent-title" class="cookie-consent__title"><?php esc_html_e('Your Privacy Matters', 'cyberpunk-industries'); ?></h2>
        <p id="cookie-consent-description" class="cookie-consent__description">
            <?php esc_html_e('We use essential cookies to ensure our website functions properly. With your consent, we may also use analytics cookies to improve your experience. You can manage your preferences at any time.', 'cyberpunk-industries'); ?>
        </p>
        <div class="cookie-consent__buttons">
            <button id="cookie-accept-all" class="btn btn--primary" aria-label="<?php esc_attr_e('Accept all cookies', 'cyberpunk-industries'); ?>">
                <?php esc_html_e('Accept All', 'cyberpunk-industries'); ?>
            </button>
            <button id="cookie-essential" class="btn btn--secondary" aria-label="<?php esc_attr_e('Accept essential cookies only', 'cyberpunk-industries'); ?>">
                <?php esc_html_e('Essential Only', 'cyberpunk-industries'); ?>
            </button>
            <button id="cookie-settings" class="btn btn--tertiary" aria-label="<?php esc_attr_e('Customize cookie settings', 'cyberpunk-industries'); ?>">
                <?php esc_html_e('Customize', 'cyberpunk-industries'); ?>
            </button>
        </div>
        <a href="<?php echo esc_url(get_privacy_policy_url()); ?>" class="cookie-consent__link">
            <?php esc_html_e('View Privacy Policy', 'cyberpunk-industries'); ?>
        </a>
    </div>
</aside>

<!-- Header -->
<header class="header" role="banner">
    <nav class="nav" role="navigation" aria-label="<?php esc_attr_e('Main navigation', 'cyberpunk-industries'); ?>">
        <div class="container">
            <div class="nav__brand">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> <?php esc_attr_e('Home', 'cyberpunk-industries'); ?>">
                        <span class="logo__text" aria-hidden="true">
                            CYBER<span class="logo__accent">PUNK</span>
                        </span>
                    </a>
                <?php endif; ?>
            </div>

            <button class="nav__toggle" aria-label="<?php esc_attr_e('Toggle navigation menu', 'cyberpunk-industries'); ?>" aria-expanded="false" aria-controls="nav-menu">
                <span class="nav__toggle-line"></span>
                <span class="nav__toggle-line"></span>
                <span class="nav__toggle-line"></span>
            </button>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'nav-menu',
                'menu_class'     => 'nav__menu',
                'container'      => false,
                'items_wrap'     => '<ul id="%1$s" class="%2$s" role="list">%3$s</ul>',
                'fallback_cb'    => 'cyberpunk_fallback_menu',
            ));
            ?>
        </div>
    </nav>
</header>
<?php
/**
 * Fallback menu if no menu is set
 */
function cyberpunk_fallback_menu() {
    echo '<ul id="nav-menu" class="nav__menu" role="list">';
    echo '<li class="nav__item"><a href="' . esc_url(home_url('/')) . '" class="nav__link">' . esc_html__('Home', 'cyberpunk-industries') . '</a></li>';
    wp_list_pages(array(
        'title_li' => '',
        'depth'    => 1,
        'number'   => 4,
        'link_before' => '<span class="nav__link">',
        'link_after'  => '</span>',
    ));
    echo '</ul>';
}
?>
