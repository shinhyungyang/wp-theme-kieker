<?php
/**
 * Template Name: Redirect Page
 * Description: A Page Template to redirect to a different page.
 */
while ( have_posts() ) : the_post();
wp_safe_redirect( get_the_content(), 301 );
endwhile;
?>