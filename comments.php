<?php
if (post_password_required() || !comments_open())
    return;
?>

<div id="respond" class="comments-area">
    <div class="fb-comments" data-href="<?php the_permalink() ?>"
        data-num-posts="10"></div>
</div>