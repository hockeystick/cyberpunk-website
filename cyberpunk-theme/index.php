<?php
/**
 * Index Template (Fallback)
 *
 * @package Cyberpunk_Industries
 */

get_header();
?>

<main id="main-content" role="main" class="site-main">
    <div class="container">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', get_post_type());
            endwhile;

            the_posts_navigation();
        else :
            ?>
            <p><?php esc_html_e('No content found.', 'cyberpunk-industries'); ?></p>
            <?php
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
