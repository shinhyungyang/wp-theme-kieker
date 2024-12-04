<?php
/**
 * Template Name: Search Page
 * Description: A Page Template to implement a search page.
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Search on this Page', 'twentyeleven' ); ?></h1>
				</header>

				<div class="entry-content">
						<?php get_search_form(); ?>
            <br /><br />
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>