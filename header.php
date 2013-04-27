<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->

<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title('|', true, 'right') ?></title>
    <meta name="description" content="The Malaysia Public Policy Competition (MPPC) is a case-based competition aimed at providing Malaysian undergraduate students an opportunity to try their hand in policy making." />
    <meta property="fb:app_id" content="112802385587168" />

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="fixed">
    <div class="menu secondary">
        <ul class="right inline-list">
            <li>
                <a href="<?php echo esc_url(get_blog_url()); ?>" title="Blog - <?php echo esc_attr(get_bloginfo('name', 'display')) ?>">
                    <i class="icon-rss"></i> <div><span>Blog</span></div>
                </a>
            </li>
            <li><a href="<?php echo esc_url(home_url('/archive')) ?>" title="Archive - <?php echo esc_attr(get_bloginfo('name', 'display')) ?>"><i class="icon-briefcase"></i> <div><span>Past Competitions</span></div></a></li>
            <li><a href="https://twitter.com/MPPC2013" title="Twitter - <?php echo esc_attr(get_bloginfo('name', 'display')) ?>"><i class="icon-twitter"></i> <div><span>Twitter</span></div></a></li>
            <li><a href="https://www.facebook.com/ICMSMPPC" title="Facebook - <?php echo esc_attr(get_bloginfo('name', 'display')) ?>"><i class="icon-facebook"></i> <div><span>Facebook</span></div></a></li>
            <li class="has-search">
                <a href="<?php echo get_search_link() ?>" title="Search - <?php echo esc_attr(get_bloginfo('name', 'display')) ?>"><i class="icon-search"></i></a>
                <div class="dropdown-search">
                    <?php get_search_form(); ?>
                </div>
            </li>
        </ul>
    </div>
    <nav class="menu primary top-bar" role="navigation">
        <ul class="title-area">
            <li class="name">
                <h1 class="logo">
                    <a href="<?php echo esc_url(home_url('/')) ?>" title="<?php echo esc_attr(get_bloginfo('description', 'display')) ?>" rel="home">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" class="hide-for-small" alt="<?php echo esc_attr(get_bloginfo('name', 'display')) ?>" />
                        <span class="show-for-small"><?php echo get_bloginfo('name') ?></span>
                    </a>
                </h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">
            <?php echo mppc_navigation('primary') ?>
        </section>
    </nav>
</header>