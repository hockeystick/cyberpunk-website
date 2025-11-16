<?php
/**
 * Page Template
 *
 * @package Cyberpunk_Industries
 */

get_header();
?>

<main id="main-content" role="main" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
                <header class="page-header">
                    <?php the_title('<h1 class="page-title">', '</h1>'); ?>
                </header>

                <div class="page-body">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'cyberpunk-industries'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </article>
        <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
