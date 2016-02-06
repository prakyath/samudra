<?php

/* Trope functions and definitions
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 */

if ( ! isset( $content_width ) )

	$content_width = 604;

function trope_setup() {

		/*

	 * This theme styles the visual editor to resemble the theme style,

	 * specifically font, colors, icons, and column width.

	 */

	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', trope_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'html5', array(

		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'

	) );

	// This theme uses wp_nav_menu() in one location.

	register_nav_menu( 'primary', __( 'Navigation Menu', 'trope' ) );

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 604, 280, true );

	// This theme uses its own gallery styles.

	add_filter( 'use_default_gallery_style', '__return_false' );
	
	 /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );
load_theme_textdomain('trope', get_template_directory() . '/languages');
}

add_action( 'after_setup_theme', 'trope_setup' );

/**

 * Return the Google font stylesheet URL, if available.

 */

function trope_fonts_url() {
	$fonts_url = '';
	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */

	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'trope' );

	/* Translators: If there are characters in your language that are not
	 * supported by Lato, translate this to 'off'. Do not translate into your
	 * own language.
	 */

	$lato = _x( 'on', 'Lato font: on or off', 'trope' );

	if ( 'off' !== $source_sans_pro || 'off' !== $lato ) {
		$font_families = array();
		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $lato )
			$font_families[] = 'Lato:400,700,400italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}
	return $fonts_url;
}

/**

 * Enqueue scripts and styles for the front end. */

function trope_scripts_styles() {

	/*

	 * Adds JavaScript to pages with the comment form to support	 */

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )

		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.

	if ( is_active_sidebar( 'sidebar-1' ) )

		wp_enqueue_script( 'jquery-masonry' );

	// Loads JavaScript file with functionality specific to trope.

	wp_enqueue_script( 'trope-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2014-03-18', true );

	// Add Source Sans Pro and Lato fonts, used in the main stylesheet.

	wp_enqueue_style( 'trope-fonts', trope_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );

	// Loads our main stylesheet.

	wp_enqueue_style( 'trope-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.

	wp_enqueue_style( 'trope-ie', get_template_directory_uri() . '/css/ie.css', array( 'trope-style' ), '2013-07-18' );

	wp_style_add_data( 'trope-ie', 'conditional', 'lt IE 9' );
	
	wp_enqueue_style( 'trope-bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'trope-slicknav-css', get_template_directory_uri() . '/css/slicknav.css');
	wp_enqueue_style( 'trope-responsive-css', get_template_directory_uri().'/css/responsive.css');
	wp_enqueue_script( 'trope-jquery-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.js');
	wp_enqueue_script( 'trope-custom-script', get_template_directory_uri() . '/js/scripts.js');
	wp_enqueue_script( 'trope-html5-script', get_template_directory_uri().'/js/html5.js'); 

	}

add_action( 'wp_enqueue_scripts', 'trope_scripts_styles' );

#Changing excerpt more
   function trope_excerpt_more($more) {
   global $post;
   return '... <a class="read-article" href="'. esc_url(get_permalink($post->ID)) . '">' .  __('Read Article', 'trope').' &#8594;' . '</a>';
   }
   add_filter('excerpt_more', 'trope_excerpt_more');

#Excerpt Length
function trope_excerpt_length( $length ) {
	return 70;
}
add_filter( 'excerpt_length', 'trope_excerpt_length', 999 );

/* Filter the page title. */

function trope_wp_title( $title, $sep ) {

	global $paged, $page;



	if ( is_feed() )

		return $title;

	// Add a page number if necessary.

	if ( $paged >= 2 || $page >= 2 )

		$title = "$title $sep " . sprintf( __( 'Page %s', 'trope' ), max( $paged, $page ) );

	return $title;

}

add_filter( 'wp_title', 'trope_wp_title', 10, 2 );

# No Title
function trope_the_title ( $title ) {

	if ( in_the_loop() && ! is_page() ) {
		if ( ! $title )
			$title = __( 'Untitled', 'trope' );
	}
	return $title;

}
add_filter( 'the_title', 'trope_the_title' );

/*  Register two widget areas.  */

function trope_widgets_init() {

	register_sidebar( array(

		'name'          => __( 'Main Widget Area', 'trope' ),

		'id'            => 'sidebar-1',

		'description'   => __( 'Appears in the footer section of the site.', 'trope' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<h3 class="widget-title">',

		'after_title'   => '</h3>',

	) );

	

}

add_action( 'widgets_init', 'trope_widgets_init' );

if ( ! function_exists( 'trope_paging_nav' ) ) :

/**

 * Display navigation to next/previous set of posts when applicable. */

function trope_paging_nav() {

	global $wp_query;

// Don't print empty markup if there's only one page.

	if ( $wp_query->max_num_pages < 2 )

		return;

	?>

	<nav class="navigation paging-navigation" role="navigation">

		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'trope' ); ?></h1>

		<div class="nav-links">



			<?php if ( get_next_posts_link() ) : ?>

			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'trope' ) ); ?></div>

			<?php endif; ?>



			<?php if ( get_previous_posts_link() ) : ?>

			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'trope' ) ); ?></div>

			<?php endif; ?>



		</div><!-- .nav-links -->

	</nav><!-- .navigation -->

	<?php

}

endif;

if ( ! function_exists( 'trope_post_nav' ) ) :

/**

 * Display navigation to next/previous post when applicable. */

function trope_post_nav() {

	global $post;

	// Don't print empty markup if there's nowhere to navigate.

	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );

	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )

		return;

	?>

	<nav class="navigation post-navigation" role="navigation">

		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'trope' ); ?></h3>

		<div class="nav-links">
			<p class="prev">
            	<?php previous_post_link( '%link', _x( '<span class="meta-nav prev"> PREVIOUS POST: <br/></span> %title', 'Previous post link', 'trope' ) ); ?>
            </p>
            <p class="next">
				<?php next_post_link( '%link', _x( '<span class="meta-nav next"> NEXT POST: <br/></span> %title', 'Next post link', 'trope' ) ); ?>
            </p>
		</div><!-- .nav-links -->

	</nav><!-- .navigation -->

	<?php

}
endif;

if ( ! function_exists( 'trope_entry_meta' ) ) :

/* Print HTML with meta information for current post: categories, tags, permalink, author, and date. */

function trope_entry_meta() {

	if ( is_sticky() && is_home() && ! is_paged() )

		echo '<span class="featured-post">' . __( 'Sticky', 'trope' ) . '</span>';



	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )

		trope_entry_date();



	// Translators: used between list items, there is a space after the comma.

	$categories_list = get_the_category_list( __( ', ', 'trope' ) );

	if ( $categories_list ) {

		echo '<span class="categories-links">' . $categories_list . '</span>';

	}



	// Translators: used between list items, there is a space after the comma.

	$tag_list = get_the_tag_list( '', __( ', ', 'trope' ) );

	if ( $tag_list ) {

		echo '<span class="tags-links">' . $tag_list . '</span>';

	}



	// Post author

	if ( 'post' == get_post_type() ) {

		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',

			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),

			esc_attr( sprintf( __( 'View all posts by %s', 'trope' ), get_the_author() ) ),

			get_the_author()

		);

	}

}

endif;


if ( ! function_exists( 'trope_entry_date' ) ) :

/**

 * Print HTML with date information for current post.

 */

function trope_entry_date( $echo = true ) {

	if ( has_post_format( array( 'chat', 'status' ) ) )

		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'trope' );

	else

		$format_prefix = '%2$s';



	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',

		esc_url( get_permalink() ),

		esc_attr( sprintf( __( 'Permalink to %s', 'trope' ), the_title_attribute( 'echo=0' ) ) ),

		esc_attr( get_the_date( 'c' ) ),

		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )

	);



	if ( $echo )

		echo $date;



	return $date;

}

endif;



if ( ! function_exists( 'trope_the_attached_image' ) ) :

/**

 * Print the attached image with a link to the next attached image */

function trope_the_attached_image() {

	/**

	 * Filter the image attachment size to use.	*/

	$attachment_size     = apply_filters( 'trope_attachment_size', array( 724, 724 ) );

	$next_attachment_url = wp_get_attachment_url();

	$post                = get_post();



	/* Grab the IDs of all the image attachments in a gallery so we can get the URL	 */

	$attachment_ids = get_posts( array(

		'post_parent'    => $post->post_parent,

		'fields'         => 'ids',

		'numberposts'    => -1,

		'post_status'    => 'inherit',

		'post_type'      => 'attachment',

		'post_mime_type' => 'image',

		'order'          => 'ASC',

		'orderby'        => 'menu_order ID'

	) );


	// If there is more than 1 attachment in a gallery...

	if ( count( $attachment_ids ) > 1 ) {

		foreach ( $attachment_ids as $attachment_id ) {

			if ( $attachment_id == $post->ID ) {

				$next_id = current( $attachment_ids );

				break;

			}

		}

		// get the URL of the next image attachment...

		if ( $next_id )

			$next_attachment_url = get_attachment_link( $next_id );



		// or get the URL of the first image attachment.

		else

			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );

	}



	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',

		esc_url( $next_attachment_url ),

		the_title_attribute( array( 'echo' => false ) ),

		wp_get_attachment_image( $post->ID, $attachment_size )

	);

}

endif;

/* Return the post URL. */

function trope_get_link_url() {

	$content = get_the_content();

	$has_url = get_url_in_content( $content );



	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );

}


function trope_body_class( $classes ) {

	if ( ! is_multi_author() )

		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )

		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )

		$classes[] = 'no-avatars';

	return $classes;
}

add_filter( 'body_class', 'trope_body_class' );

/* Adjust content_width value for video post formats and attachment templates. */

function trope_content_width() {

	global $content_width;

	if ( is_attachment() )

		$content_width = 724;

	elseif ( has_post_format( 'audio' ) )

		$content_width = 484;

}

add_action( 'template_redirect', 'trope_content_width' );

/* Theme customizer */
include (get_template_directory() . '/admin/settings.php'); 
?>