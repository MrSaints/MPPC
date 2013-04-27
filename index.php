<?php
/*
 * Default blog feed template
 */

get_header();
?>

<div class="block main">
    <div class="row post-title hide-for-small">
        <h1 class="title"><span>News &amp; Updates</span></h1>
    </div>
    <div class="heading">
        <div class="row">
            <div class="large-6 columns">
                <a href="<?php echo esc_url(get_blog_url()); ?>" title="Blog - <?php echo esc_attr(get_bloginfo('name', 'display')) ?>">
                    <h1 class="title">Blog</h1>
                </a>
            </div>
            <div class="large-6 columns hide-for-small">
                <?php echo mppc_breadcrumbs() ?>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="row">
            <div id="content" class="large-9 columns content">
                <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            get_template_part('content', get_post_format());
                        endwhile;
                ?>
                <nav class="pager" role="navigation">
                    <ul class="button-group">
                        <li><?php next_posts_link('&larr; Older posts') ?></li>
                        <li><?php previous_posts_link('Newer posts &rarr;') ?></li>
                    </ul>
                </nav>
                <?php
                    else:
                ?>
                    <article class="article">
                        <div class="row featured">
                            <div class="large-12 columns">
                                <div class="no-posts">&nbsp;</div>
                            </div>
                        </div>
                        <div class="row inner">
                            <div class="large-12 columns">
                                <?php if (current_user_can('edit_posts')): ?>
                                    <h3>No posts to display</h3>
                                    <p>Ready to publish your first post? <a href="<?php echo admin_url('post-new.php') ?>">Get started here</a>.</p>
                                <?php else: ?>
                                    <h3>Nothing found</h3>
                                    <p>Apologies, but no results were found. Perhaps searching will help find a related post.</p>
                                    <?php get_search_form(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer() ?>