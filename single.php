<?php
/*
 * Default page and post template
 */

get_header();
?>

<div class="block main">
    <div class="row post-title hide-for-small">
        <h1 class="title"><span><?php the_title() ?></span></h1>
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
                    while (have_posts()):
                        the_post();
                        get_template_part('content', get_post_format());
                        comments_template();
                    endwhile;
                ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer() ?>