<?php
/*
 * Default page content template
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(array('article', 'full-width')); ?>>
    <?php if (has_post_thumbnail()): ?>
    <div class="row featured">
        <div class="large-12 columns">
            <?php the_post_thumbnail(); ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="row inner">
        <div class="large-12 columns">
            <?php
                the_content();
                wp_link_pages(array(
                    'before'        => '<div class="page-links">',
                    'after'         => '</div>',
                    'link_before'   => '<span>',
                    'link_after'    => '</span>',
                    'pagelink'      => 'Page %'
                ));
            ?>
        </div>
    </div>
</article>

<div class="share">
    <a href="https://twitter.com/share" class="twitter-share-button" data-via="MrSaints" data-hashtags="mppc2013">Tweet</a>
    <div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
</div>