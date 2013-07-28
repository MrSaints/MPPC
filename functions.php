<?php
define ('DISALLOW_FILE_EDIT', true);

/*
 * Init
 */
if (!function_exists('mppc_setup')) {
    function mppc_setup () {
        // Navigation
        register_nav_menus(array(
            'header', __('Header Menu', 'mppc'),
            'footer', __('Footer Menu', 'mppc'),
        ));
        
        // Sidebar
        $sidebar = array(
            'name'          =>  'Main Sidebar',
            'id'            =>  'main-sidebar',
            'before_widget' =>  '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  =>  '</aside>',
            'before_title'  =>  '<h5 class="widget-title">',
            'after_title'   =>  '</h5>',
        );
        register_sidebar($sidebar);

        // Misc
        add_theme_support('infinite-scroll', array('container' => 'content'));
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
    }
}
add_action('after_setup_theme', 'mppc_setup');


/*
 * Load media assets
 */
if (!function_exists('mppc_load_media')) {
    function mppc_load_media () {
        // CSS
        wp_enqueue_style(
            'google-web-fonts',
            'http://fonts.googleapis.com/css?family=Francois+One|Source+Sans+Pro:400,700'
        );
        wp_enqueue_style('mppc-style', get_stylesheet_uri(), array('leaflet'), '2.0');

        /*
         * JS header
         */
        // Modernizr
        wp_enqueue_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js');

        // Front page
        if (is_front_page()) {
            // Leaflet JS (Maps)
            wp_enqueue_style(
                'leaflet',
                '//cdn.leafletjs.com/leaflet-0.6.2/leaflet.css'
            );
            wp_enqueue_script(
                'leaflet',
                '//cdn.leafletjs.com/leaflet-0.6.2/leaflet.js',
                array('jquery'), '0.6.2', true
            );

            // BigVideo
            wp_enqueue_script(
                'video',
                '//vjs.zencdn.net/4.1/video.js',
                array('jquery'), '4.1', true
            );
            wp_enqueue_script(
                'bigvideo',
                get_template_directory_uri() . '/assets/js/vendor/bigvideo.js',
                array('jquery', 'video'), '1', true
            );
        }

        /*
         * JS footer
         */
        // jQuery (Latest)
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', 
                            false, '1.9.1', true);
        // Bootstrap
        wp_enqueue_script(
            'bootstrap',
            get_template_directory_uri() . '/assets/js/vendor/bootstrap.js',
            array('jquery'), '2', true
        );
        // MPPC
        wp_enqueue_script(
            'mppc-plugin',
            get_template_directory_uri() . '/assets/js/plugins.js',
            array('jquery'), '2.0', true
        );
        wp_enqueue_script(
            'mppc-script',
            get_template_directory_uri() . '/assets/js/script.js',
            array('jquery'), '2.0', true
        );

        // Comments
        if (is_singular() && comments_open() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'mppc_load_media');


/*
 * Modify title
 */
if (!function_exists('mppc_wp_title')) {
    function mppc_wp_title ($title, $sep) {
        global $paged, $page;

        if (is_feed()) return $title;

        // Add the site name
        $title .= get_bloginfo('name');

        // Add the site description for the home/front page
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            $title = "{$title} {$sep} {$site_description}";

        // Add a page number if necessary
        if ($paged >= 2 || $page >= 2)
            $title = "{$title} {$sep} " . sprintf(__('Page %s', 'mppc'), max($paged, $page));

        return $title;
    }
}
add_filter('wp_title', 'mppc_wp_title', 10, 2);


/*
 * Change login errors
 */
if (!function_exists('mppc_login_errors')) {
    function mppc_login_errors () {
        return 'The login credentials you have entered is incorrect.';
    }
}
add_filter('login_errors', 'mppc_login_errors');


/*
 * Remove Wordpress version header
 */
if (!function_exists('remove_wp_version')) {
    function remove_wp_version () {
        return '';
    }
}
add_filter('the_generator', 'remove_wp_version');


/*
 * Create navigation
 */
if (!function_exists('mppc_navigation')) {
    require_once('functions/wp_bootstrap_navwalker.php');
    function mppc_navigation ($location = '', $class = 'nav pull-right', 
                              $depth = 2, $fallback = 'wp_page_menu') {
        $options = array(
            'container'         =>  false,
            'depth'             =>  $depth,
            'echo'              =>  false,
            'fallback_cb'       =>  $fallback,
            'menu_class'        =>  $class,
            'theme_location'    =>  $location,
            'walker'            =>  new wp_bootstrap_navwalker()
        );

        return wp_nav_menu($options);
    }
}


/*
 * Returns blog feed URL
 */
if (!function_exists('get_blog_url')) {
    function get_blog_url () {
        if(get_option('show_on_front') == 'page')
            return get_permalink(get_option('page_for_posts'));
        else
            return bloginfo('url');
    }
}


/*
 * Get META
 */
if (!function_exists('mppc_meta')) {
    function mppc_meta () {
        $avatar = get_avatar(get_the_author_meta('user_email'));
        $author = sprintf(
            '<span class="author"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
            esc_url(get_author_posts_url(get_the_author_meta('ID'))), 
            esc_attr(sprintf('View all posts by %s', get_the_author())), 
            get_the_author()
        );
        $date = sprintf(
            '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
            esc_url(get_permalink()),
            esc_attr(get_the_time()),
            esc_attr(get_the_date('c')),
            esc_html(get_the_date())
        );

        $category_list = get_the_category_list(', ') ?: 'Uncategorized';

        $meta = "
                <li><div class=\"author-avatar th\">{$avatar}</div></li>
                <li><i class=\"icon-user\"></i> {$author}</li>
                <li><i class=\"icon-calendar\"></i> {$date}</li>
                <li><i class=\"icon-folder-open\"></i> {$category_list}</i>
        ";

        if ($tag_list = get_the_tag_list('', ' '))
            $meta .= "<li class=\"tagcloud\"><i class=\"icon-tags\"></i> {$tag_list}</li>";

        return $meta;
    }
}


/*
 * Create breadcrumbs
 */
if (!function_exists('mppc_breadcrumbs')) {
    function mppc_breadcrumbs () {
        if(!function_exists('bcn_display'))
            return;
            
        $breadcrumbs = str_replace('current_item', 'current', bcn_display_list(true));
        return '<ul class="breadcrumbs right">' . $breadcrumbs .'</ul>';
    }
}


/*
 * Comment count
 */
if (!function_exists('mppc_comment_count')) {
    function mppc_comment_count () {
        $url = get_permalink();
        $graph = file_get_contents('https://graph.facebook.com/?ids=' . $url);  
        $json = json_decode($graph);  
        $count = !empty($json->$url->comments) ? $json->$url->comments : 0;  
        $wp_count = get_comments_number();
        return ($count + $wp_count);
    }
}


/*
 * Comment count
 */
if (!function_exists('mppc_comment_link')) {
    function mppc_comment_link () {
        $count = mppc_comment_count();
        $message = 'Leave a reply';

        if ($count > 0)
            $message = (mppc_comment_count() === 1 ? $count . ' Reply' : $count . ' Replies');

        return '<a href="'.get_comments_link().'" 
                title="Comment on '.get_the_title().'">' . $message . '</a>';
    }
}