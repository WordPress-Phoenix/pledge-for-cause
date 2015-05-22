<?php

if(! is_user_logged_in() )
{
    wp_redirect( home_url() );
    exit();
} else {
    get_header();
    ?>


    <div class="container">
        <h3 class="campaign-widget-title"><?php the_title(); ?></h3>
        <?php the_content(); ?>
    </div>

    <?php get_footer();
}