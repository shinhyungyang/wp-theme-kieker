<?php
/* Modified from default */
function twentyeleven_setup() {
	load_theme_textdomain( 'twentyeleven', get_template_directory() . '/languages' );
	add_editor_style();
	require( get_template_directory() . '/inc/theme-options.php' );
	require( get_template_directory() . '/inc/widgets.php' );
	// remove auto feed because of comments feed
	// add_theme_support( 'automatic-feed-links' );
	add_image_size( 'large-feature', apply_filters( 'twentyeleven_header_image_width', 1000 ), apply_filters( 'twentyeleven_header_image_height', 288 ), true );
	add_image_size( 'small-feature', 500, 300 );
}

function kieker_menu_init() {
  register_nav_menus(
    array(
      'top-nav' => __( 'Top Nav' )
    )
  );
}
add_action( 'init', 'kieker_menu_init' );

function kieker_add_googleanalytics() {
echo <<<END
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38105039-1']);
  _gaq.push(['_setDomainName', 'kieker-monitoring.net']);
  _gaq.push(['_gat._anonymizeIp']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
END;
}
add_action('wp_head', 'kieker_add_googleanalytics');

function kieker_remove_footbars(){
  unregister_sidebar( 'sidebar-4' );
  unregister_sidebar( 'sidebar-5' );
}
add_action( 'widgets_init', 'kieker_remove_footbars', 11 );

function custom_upload_mimes ( $existing_mimes=array() ) { 
  // add your ext => mime to the array
  $existing_mimes['bib'] = 'application/x-bibtex';
  $existing_mimes['svg'] = 'image/svg+xml';
  $existing_mimes['emf'] = 'image/x-emf';
  // add as many as you like
  // and return the new full result
  return $existing_mimes;
}
add_filter('upload_mimes', 'custom_upload_mimes');

function kieker_allowed_redirect_hosts($content){
	$content[] = 'trac.kieker-monitoring.net';
	$content[] = 'demo.kieker-monitoring.net';
	$content[] = 'live.kieker-monitoring.net';
	$content[] = 'github.com';
	$content[] = 'www.explorviz.net';
	// wrong: $content[] = 'http://codex.example.com';
	return $content;
}
add_filter('allowed_redirect_hosts','kieker_allowed_redirect_hosts');

?>
