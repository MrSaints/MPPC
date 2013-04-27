<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 */

get_header();

$parent_id = $post->post_parent;
$title = get_the_title($parent_id);
$subtitle = $parent_id ? get_the_title() : get_bloginfo('name', 'display');
?>

<div class="block main full-width">
    <div class="row post-title hide-for-small">
        <h1 class="title"><span><?php echo $subtitle ?></span></h1>
    </div>
    <div class="heading">
        <div class="row">
            <div class="large-6 columns">
                <a href="<?php echo esc_url(get_permalink($parent_id)); ?>" 
                    title="<?php echo esc_attr($title . ' - ' . get_bloginfo('name', 'display')) ?>">
                    <h1 class="title"><?php echo $title ?></h1>
                </a>
            </div>
            <div class="large-6 columns hide-for-small">
                <?php echo mppc_breadcrumbs() ?>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="row">
            <div id="content" class="large-12 columns content">
                <?php
                    while (have_posts()):
                        the_post();
                        get_template_part('content', 'page');
                        comments_template();
                    endwhile;
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>