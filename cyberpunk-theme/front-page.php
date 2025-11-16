<?php
/**
 * Front Page Template
 *
 * @package Cyberpunk_Industries
 */

get_header();
?>

<main id="main-content" role="main">
    <!-- Hero Section -->
    <section id="home" class="hero" aria-labelledby="hero-title">
        <div class="container">
            <div class="hero__content">
                <h1 id="hero-title" class="hero__title">
                    <?php esc_html_e('Welcome to the', 'cyberpunk-industries'); ?>
                    <span class="glitch-wrapper">
                        <span class="glitch" data-text="<?php esc_attr_e('Digital Frontier', 'cyberpunk-industries'); ?>" aria-hidden="true">
                            <?php esc_html_e('Digital Frontier', 'cyberpunk-industries'); ?>
                        </span>
                        <span class="sr-only"><?php esc_html_e('Digital Frontier', 'cyberpunk-industries'); ?></span>
                    </span>
                </h1>
                <p class="hero__subtitle">
                    <?php
                    $tagline = get_bloginfo('description', 'display');
                    if ($tagline) :
                        echo esc_html($tagline);
                    else :
                        esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'cyberpunk-industries');
                    endif;
                    ?>
                </p>
                <div class="hero__cta">
                    <a href="#contact" class="btn btn--primary btn--lg"><?php esc_html_e('Get Started', 'cyberpunk-industries'); ?></a>
                    <a href="#about" class="btn btn--outline btn--lg"><?php esc_html_e('Learn More', 'cyberpunk-industries'); ?></a>
                </div>
            </div>
            <div class="hero__visual" aria-hidden="true">
                <div class="neon-grid"></div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section section--about" aria-labelledby="about-title">
        <div class="container">
            <h2 id="about-title" class="section__title"><?php esc_html_e('About', 'cyberpunk-industries'); ?> <span class="accent"><?php esc_html_e('Our Vision', 'cyberpunk-industries'); ?></span></h2>
            <div class="section__content">
                <div class="feature-grid">
                    <article class="feature-card" data-aos="fade-up">
                        <div class="feature-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M12 6v6l4 2"/>
                            </svg>
                        </div>
                        <h3 class="feature-card__title"><?php esc_html_e('Real-Time Processing', 'cyberpunk-industries'); ?></h3>
                        <p class="feature-card__description">
                            <?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'cyberpunk-industries'); ?>
                        </p>
                    </article>

                    <article class="feature-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <h3 class="feature-card__title"><?php esc_html_e('Neural Architecture', 'cyberpunk-industries'); ?></h3>
                        <p class="feature-card__description">
                            <?php esc_html_e('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint.', 'cyberpunk-industries'); ?>
                        </p>
                    </article>

                    <article class="feature-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                <path d="M7 11V7a5 5 0 0110 0v4"/>
                            </svg>
                        </div>
                        <h3 class="feature-card__title"><?php esc_html_e('Quantum Security', 'cyberpunk-industries'); ?></h3>
                        <p class="feature-card__description">
                            <?php esc_html_e('Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'cyberpunk-industries'); ?>
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section section--services" aria-labelledby="services-title">
        <div class="container">
            <h2 id="services-title" class="section__title"><?php esc_html_e('Our', 'cyberpunk-industries'); ?> <span class="accent"><?php esc_html_e('Services', 'cyberpunk-industries'); ?></span></h2>
            <div class="section__content">
                <div class="services-grid">
                    <?php
                    $services = array(
                        array('title' => __('Cybernetic Integration', 'cyberpunk-industries'), 'desc' => __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis.', 'cyberpunk-industries')),
                        array('title' => __('Data Fortress Solutions', 'cyberpunk-industries'), 'desc' => __('Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'cyberpunk-industries')),
                        array('title' => __('Neural Network Design', 'cyberpunk-industries'), 'desc' => __('Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.', 'cyberpunk-industries')),
                        array('title' => __('Quantum Computing', 'cyberpunk-industries'), 'desc' => __('Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.', 'cyberpunk-industries')),
                    );
                    $counter = 0;
                    foreach ($services as $service) :
                        $counter++;
                        $delay = ($counter - 1) * 100;
                    ?>
                        <div class="service-item" data-aos="slide-right" data-aos-delay="<?php echo esc_attr($delay); ?>">
                            <span class="service-item__number" aria-hidden="true"><?php echo esc_html(str_pad($counter, 2, '0', STR_PAD_LEFT)); ?></span>
                            <h3 class="service-item__title"><?php echo esc_html($service['title']); ?></h3>
                            <p class="service-item__description"><?php echo esc_html($service['desc']); ?></p>
                            <a href="#contact" class="service-item__link"><?php esc_html_e('Explore More →', 'cyberpunk-industries'); ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section section--contact" aria-labelledby="contact-title">
        <div class="container">
            <h2 id="contact-title" class="section__title"><?php esc_html_e('Get In', 'cyberpunk-industries'); ?> <span class="accent"><?php esc_html_e('Touch', 'cyberpunk-industries'); ?></span></h2>
            <div class="section__content">
                <form class="contact-form" id="contact-form" aria-label="<?php esc_attr_e('Contact form', 'cyberpunk-industries'); ?>">
                    <?php wp_nonce_field('cyberpunk_contact_form', 'contact_nonce'); ?>

                    <div class="form-group">
                        <label for="name" class="form-label"><?php esc_html_e('Name *', 'cyberpunk-industries'); ?></label>
                        <input type="text" id="name" name="name" class="form-input" required aria-required="true" autocomplete="name">
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label"><?php esc_html_e('Email *', 'cyberpunk-industries'); ?></label>
                        <input type="email" id="email" name="email" class="form-input" required aria-required="true" autocomplete="email">
                    </div>

                    <div class="form-group">
                        <label for="subject" class="form-label"><?php esc_html_e('Subject', 'cyberpunk-industries'); ?></label>
                        <input type="text" id="subject" name="subject" class="form-input" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label"><?php esc_html_e('Message *', 'cyberpunk-industries'); ?></label>
                        <textarea id="message" name="message" class="form-input form-textarea" rows="5" required aria-required="true"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn--primary btn--lg"><?php esc_html_e('Send Message', 'cyberpunk-industries'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
