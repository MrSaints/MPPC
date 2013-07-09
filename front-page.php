<?php get_header() ?>

<div class="block jumbotron">
    <div class="row">
        <div class="large-6 large-centered columns">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/full_logo.png" 
                alt="<?php echo esc_attr(get_bloginfo('name', 'display')) ?>" />
        </div>
    </div>
    <div class="row">
        <div class="large-6 large-centered columns">
            <h3 class="title">Malaysia Public Policy Competition</h3>
            <h1 class="date">16 - 18th August 2013</h1>
        </div>
    </div>
    <div class="row">
        <div class="large-3 large-offset-3 small-6 columns">
            <a href="<?php echo esc_url(home_url('/about')) ?>" 
                class="button action learn hide-for-small left">Learn More</a>
            <a href="<?php echo esc_url(home_url('/about')) ?>" 
                class="button expand show-for-small secondary">Learn More</a>
        </div>
        <div class="large-3 small-6 columns left">
            <a href="<?php echo esc_url(home_url('/registration')) ?>" 
                class="button action participate hide-for-small right">Participate</a>
            <a href="<?php echo esc_url(home_url('/registration')) ?>" 
                class="button expand show-for-small">Participate</a>
        </div>
    </div>
    <div class="info">
        <div class="row">
            <div class="large-6 columns sponsors">
                <h5>Our partners &amp; sponsors</h5>
                <ul class="large-block-grid-2">
                    <li><a href="#" class="th">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/logos/JCF.png" 
                            alt="Jeffrey Cheah Foundation" />
                    </a></li>
                    <li><a href="#" class="th">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/logos/talentcorp.png" 
                            alt="TalentCorp Malaysia" />
                    </a></li>
                    <li><a href="#" class="th">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/logos/ICAEW.png" 
                            alt="ICAEW Chartered Accountants" />
                    </a></li>
                    <li><a href="#" class="th">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/logos/maybank.jpg" 
                            alt="Maybank" />
                    </a></li>
                </ul>
            </div>
            <div class="large-6 columns tweets">
                    <a class="twitter-timeline" href="https://twitter.com/MPPC2013"
                        data-widget-id="334867661685157889" 
                        data-link-color="#f08f18" 
                        data-chrome="transparent noscrollbar nofooter"
                        data-theme="dark">Tweets by @MPPC2013</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>