<?php
/**
 * Template part for displaying posts
 *
 * @package Cyberpunk_Industries
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>

        <div class="entry-meta">
            <?php
            printf(
                '<span class="posted-on">' . esc_html__('Posted on %s', 'cyberpunk-industries') . '</span>',
                '<time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>'
            );
            ?>
        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('large'); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();
        else :
            the_excerpt();
            ?>
            <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more">
                <?php esc_html_e('Read More →', 'cyberpunk-industries'); ?>
            </a>
            <?php
        endif;
        ?>
    </div>
</article>
