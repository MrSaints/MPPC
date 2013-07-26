<div class="twitter-container">
    <div class="container">
        <div class="row">
            <div class="span1 twitter-logo">
                <i class="icon-twitter"></i>
            </div>
            <div class="span11">
                <div id="tweets"></div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container text--dark-emboss">
        <a href="<?php echo esc_url(home_url('/')) ?>" title="<?php echo get_bloginfo('name') ?> - Home" rel="home">
            <?php echo esc_attr(get_bloginfo('description', 'display')) ?>
        </a>
        <?php echo mppc_navigation('footer', 'footer__navigation unstyled inline pull-right', 1) ?>
    </div>
</footer>

<script> var template_uri = '<?php echo get_template_directory_uri()?>'; </script>

<?php wp_footer(); ?>

</body>
</html>