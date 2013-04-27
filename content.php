<?php
/*
 * Default page and post content template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
    <?php if (has_post_thumbnail()): ?>
    <div class="row featured">
        <div class="large-12 columns">
            <?php the_post_thumbnail(); ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="row inner">
        <div class="large-3 columns info">
            <ul class="entry-meta">
                <?php echo mppc_meta() ?>
                <li>
                    <?php if (comments_open()): ?>
                        <i class="icon-comments-alt"></i> 
                        <?php echo mppc_comment_link(); ?>
                    <?php endif; ?>
                </li>
                <?php edit_post_link('Edit', '<li class="edit-link"><i class="icon-pencil"></i> ', '</li>' ); ?>
            </ul>
        </div>
        <div class="large-9 columns">
            <h2 class="title">
                <?php
                    if (is_single()):
                        the_title();
                    else:
                ?>
                <a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute() ?>" rel="bookmark">
                    <?php the_title(); ?>
                </a>
                <?php endif; ?>
            </h2>

            <?php if (is_search()): ?>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div>
            <?php else: ?>
                <div class="entry-content">
                    <?php the_content('Read More &rarr;'); ?>
                </div>
            <?php endif; ?>

            <?php
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

<?php if (is_singular()): ?>
<div class="share">
    <a href="https://twitter.com/share" class="twitter-share-button" data-via="MrSaints" data-hashtags="mppc2013">Tweet</a>
    <div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
</div>
<?php endif; ?>