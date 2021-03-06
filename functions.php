<?

remove_filter( 'the_title', 'wptexturize' );
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_excerpt', 'wptexturize' );
remove_filter( 'comment_text', 'wptexturize' );

if ( ! function_exists( 'uw_setup' ) ):  

  function uw_setup() 
  {

      add_theme_support( 'automatic-feed-links' );
      add_theme_support( 'post-thumbnails' );

    add_image_size( 'Thimble', 50, 50, true );
    add_image_size( 'Sidebar', 250, 9999, false );
    add_image_size( 'Body Image', 300, 9999, false );
    add_image_size( 'Full Width', 620, 9999, false );

    add_image_size( 'thumbnail-large', 300, 300, true );

      register_nav_menu( 'primary', __( 'Primary Menu', 'uw' ) );
      register_nav_menu( 'footer', __( 'Footer Menu', 'uw' ) );

    define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyeleven_header_image_width', 1280 ) );
    define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyeleven_header_image_height', 215 ) );
    
    $args = array(
            'width'         => 1170,
            'height'        => 100,
            'default-image' => get_stylesheet_directory_uri() . '/img/itconnect-banner3.png',
            'uploads'       => true,
    );

    add_theme_support( 'custom-header', $args);
  }

endif;

if ( ! function_exists( 'uw_enqueue_default_styles' ) ):
/**
 * This is where all the CSS files are registered
 *
 * bloginfo('template_directory')  gives you the url to the parent theme
 * bloginfo('stylesheet_directory')  gives you the url to the child theme
 */
  function uw_enqueue_default_styles() {
      global $current_blog;
      $is_child_theme = get_bloginfo('template_directory') != get_bloginfo('stylesheet_directory');
      wp_register_style( 'bootstrap',get_bloginfo('stylesheet_directory') . '/css/bootstrap.css', array(), '3.0.0' );
      /*wp_register_style( 'bootstrap-responsive', get_bloginfo('template_directory') . '/css/bootstrap-responsive.css', array('bootstrap'), '2.0.3' );*/
      wp_register_style( 'bootstrap-offcanvas',get_bloginfo('stylesheet_directory') . '/css/bootstrap-offcanvas.css', array(), '1.0.0' );

      wp_register_style( 'google-font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300' );
      wp_register_style( 'itconnect-master', get_bloginfo('stylesheet_directory') . '/style.css', array(), '1.0' );
      wp_enqueue_style( 'bootstrap' );
      wp_enqueue_style( 'bootstrap-offcanvas' );
      /* wp_enqueue_style( 'bootstrap-responsive' ); */
      wp_enqueue_style( 'google-font-open-sans' );
      wp_enqueue_style( 'itconnect-master' );
  }

endif;

if ( ! function_exists( 'uw_enqueue_default_scripts' ) ):
/**
 * This is where all the JS files are registered
 *
 * bloginfo('template_directory')  gives you the url to the parent theme
 * bloginfo('stylesheet_directory')  gives you the url to the child theme
 */
  function uw_enqueue_default_scripts() {
    wp_deregister_script('jquery'); //we use googles CDN below
    wp_deregister_script('header'); //we use our own below
    wp_register_script( 'jquery','//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', array(), '1.7.2' );
    wp_register_script( 'header', get_bloginfo('stylesheet_directory') . '/js/header.js', array('jquery'), '1.3' );
    wp_register_script( 'jquery.firenze', get_bloginfo('template_directory') . '/js/jquery.firenze.js', array('jquery'), '1.0.1' );
    wp_register_script( 'jquery.weather', get_bloginfo('template_directory') . '/js/jquery.weather.js', array('jquery'), '1.1' );
    wp_register_script( 'jquery.placeholder', get_bloginfo('template_directory') . '/js/jquery.placeholder.js', array('jquery'), '1.0' );
    wp_register_script( 'jquery.imageexpander', get_bloginfo('template_directory') . '/js/jquery.imageexpander.js', array('jquery'), '1.0.5' );
    wp_register_script( 'jquery.waypoints', get_bloginfo('template_directory') . '/js/jquery.waypoints.min.js', array('jquery'), '1.1.7' );
    wp_register_script( 'jquery.imagesloaded', get_bloginfo('template_directory') . '/js/jquery.imagesloaded.min.js', array('jquery'), '2.1.1' );
    wp_register_script( 'jquery.parallax', get_bloginfo('template_directory') . '/js/jquery.parallax.min.js', array('jquery'), '1.0' );
    wp_register_script( 'jquery.404', get_bloginfo('stylesheet_directory') . '/js/404.js', array('jquery'), '1.0' );
    wp_register_script( 'jquery.masonry', get_bloginfo('template_directory') . '/js/jquery.masonry.min.js', array('jquery') );
    wp_register_script( 'offcanvas', get_bloginfo('stylesheet_directory') . '/js/bootstrap-offcanvas.js', array('jquery') );
    wp_register_script( 'jquery.tablesorter', get_bloginfo('stylesheet_directory') . '/js/jquery.tablesorter.js', array('jquery') );
    wp_register_script( 'itconnect', get_bloginfo('stylesheet_directory') . '/js/itconnect.js', array('jquery') );

    wp_register_script( 'widget-youtube-playlist', get_bloginfo('template_directory') . '/js/widget-youtube-playlist.js', array('jquery','swfobject','jquery.imagesloaded') );
    wp_register_script( 'uw-gallery', get_bloginfo('template_directory') . '/js/gallery.js', array('jquery','jquery.imagesloaded'), '1.1' );
    wp_register_script( 'trumba', '//www.trumba.com/scripts/spuds.js' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery.tablesorter' );
    wp_enqueue_script( 'header' );
    wp_enqueue_script( 'jquery.firenze' );
    wp_enqueue_script( 'jquery.placeholder' );
    wp_enqueue_script( 'jquery.imageexpander' );

    wp_enqueue_script( 'offcanvas' );
    wp_enqueue_script( 'itconnect' );

    wp_enqueue_script('uw-gallery');
    wp_enqueue_script( 'trumba' );


    if( is_404() ) {

      wp_enqueue_script( 'jquery.imagesloaded' );
      wp_enqueue_script( 'jquery.parallax' );
      wp_enqueue_script( 'jquery.404' );

    }
  }

endif;

if (! function_exists ( 'it_widgets_init' )):

  function it_widgets_init()
  {
    $args = array(
      'name' => 'News Sidebar',
      'id' => 'news-sidebar',
      'description' => 'Widgets for the left column of the archives page on ITConnect',
      'before_widget' => '<div id="%1$s class="widget %2$s">',
      'after_widget' => '</div>'
    );

    register_sidebar($args);

    $args2 = array(
      'name' => 'Search Sidebar',
      'id' => 'search-sidebar',
      'description' => 'Widgets for the left column of the search page on ITConnect',
      'before_widget' => '<div id="%1$s class="widget %2$s">',
      'after_widget' => '</div>'
    );

    register_sidebar($args2);
  
    $args3 = array(
      'name' => 'HuskyBytes Sidebar',
      'id' => 'huskybytes-sidebar',
      'description' => 'Widgets for the left column of the HuskyBytes page on ITConnect',
      'before_widget' => '<div id="%1$s class="widget %2$s">',
      'after_widget' => '</div>'
    );

    register_sidebar($args3);
  }
endif;

// Tegrity embed code
// [tegrity url='https://tegr.it/y/XXXXX']
if (! function_exists ( 'tegrity_func' )):
  function tegrity_func( $atts ) {
    extract( shortcode_atts( array(
        'url' => '',
    ), $atts ) );

    $tegrity = "<script type='text/javascript' src='{$url}'></script>";

    return $tegrity;
  }
  add_shortcode( 'tegrity', 'tegrity_func' );
endif;

// Trumba spuds
// [spud webname='foo' spudtype='bar']
if (! function_exists ( 'spud_func' )):
  function spud_func( $atts ) {
    extract( shortcode_atts( array(
        'webname' => 'sea_campus',
        'spudtype' => 'main',
    ), $atts ) );

    $spud = "<script type='text/javascript'>\$Trumba.addSpud({webName: '{$webname}', spudType: '{$spudtype}'});</script>";

    return $spud;
  }
  add_shortcode( 'spud', 'spud_func' );
endif;

add_action( 'widgets_init', 'it_widgets_init' );

require('main-image-options.php' );

if ( ! function_exists( 'is_custom_main_image' ) ):  
  function is_custom_main_image()
  {
    $option = get_option('main_image'); 

    if ( ! is_array( $option) )
      return false;

    $main_image = (array) $option['main_image'];
    if ( isset($main_image['custom'] ))  
      return true;

    return false;
  }
endif;

if ( ! function_exists( 'custom_main_image' ) ):  
  function custom_main_image() 
  {
    $option = get_option('main_image');

    if ( ! is_array( $option) )
      return;

    $main_image = (array) $option['main_image'];
    if ( isset($main_image['custom'] )) {
      echo ' style="background:url('.$main_image['custom']['url'].') no-repeat; background-size:cover;" ' ;
    }   
  }
endif;

require('outages_options.php');

if ( ! function_exists( 'outages_active' ) ):
  function outages_active() {
    return (get_option('outages') == 'yes');
  }
endif;

function in_comment_blacklisted_words($string, $array) { 
    foreach($array as $ref) { if(strstr($string, $ref)) { return true; } } 
    return false;
}

function drop_bad_comments() {
    if (!empty($_POST['comment'])) {
        $post_comment_content = $_POST['comment'];
        $lower_case_comment = strtolower($_POST['comment']);
        $comment_blacklist_words = array(
            '<script>'
        );
        if (in_comment_blacklisted_words($lower_case_comment, $comment_blacklist_words)) {
            wp_die( __('JavaScript is not allowed in comments.  Please resubmit comment without embedded JavaScript.') );
        }
    }
}
add_action('init', 'drop_bad_comments');

if ( ! function_exists( 'custom_prev_next_links') ) : 
  function custom_prev_next_links( $nav_id='prev-next' ) { 
    global $query;

    if ( $query->max_num_pages > 1 ) : 

        $big = 999999999; // need an unlikely integer
        $current = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $links = paginate_links( array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format' => '?paged=%#%',
          'type' => 'array',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $query->max_num_pages
        ) );  

      echo '<div class="pagination pagination-centered"><ul>';

      foreach ($links as $index=>$link) :

        $link = str_replace('span', 'a', $link);
        if ( strip_tags($link) == $current ) 
          echo "<li class=\"disabled\"><a href='javascript:void(0);'>$current</a></li>";
        else
          echo "<li>$link</li>";

      endforeach;

      echo '</ul></div>';

   endif;
  }
endif;


$template_dir = get_stylesheet_directory();
require( $template_dir . '/inc/documentation.php' );

?>
