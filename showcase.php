<?php
/**
 * Template Name: Showcase Template
 * Description: A Page Template that showcases Sticky Posts, Asides, and Blog Posts
 *
 * The showcase template in Twenty Eleven consists of a featured posts section using sticky posts,
 * another recent posts area (with the latest post shown in full and the rest as a list)
 * and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for the sidebar.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
get_header(); ?>
		<div id="primary" class="showcase">
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post();
					/**
					 * We are using a heading by rendering the_content
					 * If we have content for this page, let's display it.
					 */
					if ( '' != get_the_content() )
						get_template_part( 'content', 'intro' );
				endwhile; ?>
				<section class="recent-posts">
					<h1 class="showcase-heading"><?php _e( 'Recent Posts', 'twentyeleven' ); ?></h1>
					<?php
					$origQuery = $wp_query;
					// Our new query for the Recent Posts section.
					$paged = (get_query_var('page')) ? get_query_var('page') : 1;
					$wp_query = new WP_Query( array( 'post_type' => 'post', 'cat' => '-11,-12,-13,-14', 'posts_per_page' => 3, 'paged' => $paged, 'meta_query' => array(array('key' => 'hide','value' => '','compare' => 'NOT EXISTS')) ));
					twentyeleven_content_nav( 'nav-above' );
					// The first Recent post is displayed normally
					if ( have_posts() && ($paged == 1) ) : the_post();
						// Set $more to 0 in order to only get the first part of the post.
						global $more;
						$more = 0;
						get_template_part( 'content', get_post_format() );
					endif;
					
					// For all other recent posts, just display the title and comment status.
					while ( have_posts() ) : the_post();
						get_template_part( 'content', 'excerpt' );
					endwhile;
					twentyeleven_content_nav( 'nav-below' );
					$wp_query = $origQuery; ?>
				</section><!-- .recent-posts -->
								
				<div class="widget-area" role="complementary">
					<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
						<?php
              the_widget( 'Twenty_Eleven_Ephemera_Widget', '', array( 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );
						?>
					<?php endif; // end sidebar widget area ?>
				</div><!-- .widget-area -->
				
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>