<?php get_header() ?>

<div class="jumbotron fix-nav">
    <div class="container masthead">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/logos/logo.png" 
                alt="<?php echo get_bloginfo('name') ?>" class="masthead-logo">
        <div class="masthead-heading text--dark-emboss">
            <h1 class="masthead-heading__date">16 &dash; 18th August 2013</h1>
            <h2 class="masthead-heading__title">
                <?php echo esc_attr(get_bloginfo('description', 'display')) ?>
            </h2>
        </div>
        <div class="masthead-action">
            <div class="row-fluid">
                <div class="span6">
                    <a class="btn btn-large btn--flat btn-block btn-info">Learn More</a>
                </div>
                <div class="span6">
                    <a class="btn btn-large btn--flat btn-block btn-success">Participate</a>
                </div>
            </div>
        </div>
    </div>
    <div class="social-media">
        <a href="#" target="_social"><i class="icon-twitter"></i></a>
        <a href="#" target="_social"><i class="icon-facebook"></i></a>
    </div>
</div>

<div id="navigation" class="navbar navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="#"><b><?php echo get_bloginfo('name') ?></b></a>

            <!-- Everything you want hidden at 940px or less, place within here -->
            <div class="nav-collapse collapse">
                <?php echo mppc_navigation('header') ?>
            </div>
        </div>
    </div>
</div>

<div class="container main">
    <ul class="thumbnails">
        <li class="span3">
            <div class="thumbnail">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/thumbs/icms.jpg" alt="">
                <div class="caption">
                    <h3>Organisers</h3>
                    <p>
                        Guided by the national interest, the International 
                        Council of Malaysian Scholars and Associates (ICMS) 
                        strives to promote <b>leadership development, intellectual 
                        discourse and career opportunities</b> through the consolidation 
                        of international networks
                    </p>
                    <p>
                        <a href="#" class="btn btn-block btn-info">Learn More</a>
                    </p>
                </div>
            </div>
        </li>
        <li class="span3">
            <div class="thumbnail">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/thumbs/mppc.jpg" alt="">
                <div class="caption">
                    <h3>Competition</h3>
                    <p>
                        The Malaysia Public Policy Competition (MPPC) is an annual
                        <b>case-based competition</b>, set against the backdrop of <b>Malaysia
                        public policy making</b>. It is aimed towards creating awareness 
                        among participants regarding how public policies are made, 
                        from conception to implementation
                    </p>
                    <p>
                        <a href="#" class="btn btn-block btn-info">Learn More</a>
                    </p>
                </div>
            </div>
        </li>
        <li class="span3">
            <div class="thumbnail">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/thumbs/prizes.jpg" alt="">
                <div class="caption">
                    <h3>Prizes</h3>
                    <p>
                        All participants shortlisted for the three-day MPPC 
                        Residential Challenge are guaranteed participation awards 
                        (a certificate and <b>RM 300 per team</b>). 
                        The top four teams are also awarded for their achievement with 
                        a <b>grand prize of RM 5,000 (including a certificate of achievement)</b>
                    </p>
                    <p>
                        <a href="#" class="btn btn-block btn-info">Learn More</a>
                    </p>
                </div>
            </div>
        </li>
            <li class="span3">
                <div class="thumbnail">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/thumbs/sponsors.jpg" alt="">
                    <div class="caption">
                        <h3><a href="#">Partners</a></h3>
                        <p>
                            <ul>
                                <li><a href="#">TalentCorp Malaysia</a></li>
                                <li><a href="#">Jeffrey Cheah Foundation</a></li>
                                <li><a href="#">The Institute of Chartered Accountants (ICAEW)</a></li>
                            </ul>
                        </p>
                        <h3><a href="#">Sponsors</a></h3>
                        <p>
                            <ul>
                                <li><a href="#">Maybank Group</a></li>
                                <li><a href="#">PricewaterhouseCoopers</a></li>
                            </ul>
                        </p>
                    </div>
                </div>
            </li>
    </ul>
</div>

<div class="map-container"><div id="map"></div></div>

<?php get_footer() ?>