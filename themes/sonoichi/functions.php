<?php

//////////////////////////////////////////////////////////////////////////
// Set up
//////////////////////////////////////////////////////////////////////////
/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) $content_width = 640;

/**
 * Sets up theme defaults and registers the various WordPress features that
 */
function sonoichi_theme_setup() {

	load_theme_textdomain( 'sonoichi', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	register_nav_menu( 'primary','Navigation Menu');

	add_filter( 'use_default_gallery_style', '__return_false' );
	add_image_size( 'sonoichi-gallery-thumbnail', 151, 151, true );

	sonoichi_custom_header_setup();
}
add_action( 'after_setup_theme', 'sonoichi_theme_setup' );

/**
 * Sets up the WordPress core custom header arguments and settings.
 *
 * @see sonoichi_theme_setup()
 */
function sonoichi_custom_header_setup() {
	$args = array(
		'height'		=>	640,
		'width'			=>	1920,
		'uploads'		=>	true,
		'header-text'	=>	true,
		'admin-head-callback' => 'sonoichi_admin_header_style',
		'admin-preview-callback' => 'sonoichi_admin_header_image',
	);
	add_theme_support( 'custom-header', $args );

	register_default_headers( array(
		'wa' => array(
			'url' 			=>	'%s/images/headers/wa.png',
			'thumbnail_url'	=>	'%s/images/headers/wa-thumbnail.png'
		),
		'ka' => array(
			'url' 			=>	'%s/images/headers/ka.png',
			'thumbnail_url'	=>	'%s/images/headers/ka-thumbnail.png'
		),
		'ma' => array(
			'url' 			=>	'%s/images/headers/ma.png',
			'thumbnail_url'	=>	'%s/images/headers/ma-thumbnail.png'
		),
		'tu' => array(
			'url' 			=>	'%s/images/headers/tu.png',
			'thumbnail_url'	=>	'%s/images/headers/tu-thumbnail.png'
		),
		'sa' => array(
			'url' 			=>	'%s/images/headers/sa.png',
			'thumbnail_url'	=>	'%s/images/headers/sa-thumbnail.png'
		),
		'yu' => array(
			'url' 			=>	'%s/images/headers/yu.png',
			'thumbnail_url'	=>	'%s/images/headers/yu-thumbnail.png'
		)
	) );
}

/**
 * Styles the header text displayed on the blog.
 *
 * @see sonoichi_custom_header_setup()
 */
function sonoichi_admin_header_style() {
	$header_image = get_header_image();
?>
<style type="text/css">
	.mod-pageHeader {
		position: relative;
		font-size:12px;
		line-height:18px; 
	}
	.mod-pageHeader.noVisual{
		height:144px;
	}
	.mod-pageHeader .mod-pageHeader-inner {
		position: absolute;
		top:0;
		margin: 0 auto;
		padding: 3.75em 24px;
		max-width: 960px;
	}
	.mod-pageHeader .mod-pageHeader-title {
		font-size: 200%;
		line-height: 1.25;
		margin-bottom: 0.25em;
	}
	.mod-pageHeader .mod-pageHeader-title a {
		text-decoration: none;
		color: #000;
	}
	.mod-pageHeader .mod-pageHeader-title a:link, .mod-pageHeader .mod-pageHeader-title a:visited {
		text-decoration: none;
		color: #000;
	}
	.mod-pageHeader .mod-pageHeader-title a:hover {
		text-decoration: none;
		opacity: 0.5;
	}
	.mod-pageHeader .mod-pageHeader-title a:active {
		color: #000;
	}
	.mod-pageHeader .mod-pageHeader-description {
		font-weight: normal;
		font-size: 100%;
		line-height: 1;
		padding: 0;
	}
	.mod-pageHeader .mod-pageHeader-visual .visual{
		width:100%;
		max-height: 370px;
		max-width: 960px;
	}
</style>
<?php
}

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see sonoichi_custom_header_setup()
 */
function sonoichi_admin_header_image() {
	$header_image = get_header_image();
	if ( ! empty( $header_image ) ) :
?>
	<header id="scalingImage" class="mod-pageHeader" role="banner">
		<div class="mod-pageHeader-visual">
			<img class="visual" src="<?php echo esc_url( $header_image ); ?>" alt="" />
		</div>
<?php else: ?>
	<header class="mod-pageHeader noVisual" role="banner">
<?php endif; ?>
		<div class="mod-pageHeader-inner">
			<h1 class="mod-pageHeader-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="mod-pageHeader-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
	</header>
<?php
}

/**
 * Enqueues scripts and styles for front end.
 */
function sonoichi_scripts_styles() {
	global $wp_styles;

	wp_enqueue_style( 'sonoichi-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'underscore' );

	$header_image = get_header_image();
	if ( ! empty( $header_image ) ) 
	// wp_enqueue_script( 'snscalingimage', get_template_directory_uri() . '/js/jquery.snscalingimage.js', array( 'jquery' ));
	// wp_enqueue_script( 'snforcehorizontal', get_template_directory_uri() . '/js/jquery.snforcehorizontal.js', array( 'jquery' ));
	// wp_enqueue_script( 'snswitchclass', get_template_directory_uri() . '/js/jquery.snswitchclass.js', array( 'jquery' ));
    // wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js');
	// wp_enqueue_script( 'domcontroller', get_template_directory_uri() . '/js/domcontroller.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

}
add_action( 'wp_enqueue_scripts', 'sonoichi_scripts_styles' );

/**
 * Insert scripts for front end.
 */
function sonoichi_add_inline_script() {
	$header_image = get_header_image();
	if ( ! empty( $header_image ) ) :
?>
	<script type="text/javascript">
		(function($){
			$(function(){
				$('#scalingImage').snScalingImage({
					minHeight: 168,
					maxHeight: 320
				});
			})
		})(jQuery);
	</script>
<?php endif; ?>
	<script type="text/template" id="templ-mod-navGlobal-expansion">
		<ul class="mod-navGlobal-expansion">
			<li class="page_item current_page_ancestor current_page_origin parent"><a href="<%= content_url %>"><%= content_title %></a></li>
		</ul>
	</script>
<?php
}
add_action('wp_head', 'sonoichi_add_inline_script');

/**
 * Register widget area.
 */
function sonoichi_widgets_init() {
	register_sidebar( array(
		'name'          => 'Main Widget Area',
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'sonoichi_widgets_init' );

//////////////////////////////////////////////////////////////////////////
// Create & Arrange output
//////////////////////////////////////////////////////////////////////////
/**
 * Prints HTML with meta information for current post/attachment: categories, tags, permalink, author, and date.
 */
function sonoichi_entry_meta() {

	$date = esc_html(date(__('Y年 n月 j日', 'sonoichi'),  strtotime(get_the_time("Y-m-d"))));

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'sonoichi' ), get_the_author() ) ),
		get_the_author()
	);

	if( is_attachment() ) {
		$utility_text = __( 'Published on %1$s<span class="by-author"> by %2$s</span>.', 'sonoichi' );
		printf( $utility_text, $date, $author );
		return;
	}

	$categories_list = get_the_category_list( ', ' );
	$tag_list = get_the_tag_list( '',', ');


	if ( $tag_list ) {
		$utility_text = __( '投稿日: %3$s | カテゴリー: %1$s.', 'sonoichi' );
	} elseif ( $categories_list ) {
		$utility_text = __( '投稿日: %3$s. カテゴリー: %1$s.', 'sonoichi' );
	} else {
		$utility_text = __( '投稿日: %3$s.', 'sonoichi' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}

/**
 * Prints archive title: "Category" or "Tag" or "Author" or "Date" or default.
 */
function sonoichi_archive_title() {
	if( is_category() ) :
		printf( __( '%s', 'sonoichi' ), single_cat_title( '', false ) );
	elseif( is_tag() ) :
		printf( __( '%s', 'sonoichi' ), single_tag_title( '', false ) );
	elseif ( is_author() ) :
		printf( __( '%s', 'sonoichi' ), get_the_author_meta( 'display_name', get_query_var('author') ) );
	elseif ( is_day() ) :
		printf( __( '%s', 'sonoichi' ), get_the_date() );
	elseif ( is_month() ) :
		printf( __( '%s', 'sonoichi' ), get_the_date( __( 'F, Y', 'sonoichi' )) );
	elseif ( is_year() ) :
		printf( __( '%s', 'sonoichi' ), get_the_date( __( 'Y', 'sonoichi' ) ) );
	else :
		_e( 'Archives', 'sonoichi' );
	endif;
}

/**
 * Displays navigation to next/previous set of posts when applicable.
 */
function sonoichi_page_nav() {
	global $wp_query;

	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() || is_page() ) ):
		return;
	elseif( is_attachment() ):
		sonoichi_attachment_nav();
	elseif( is_single() ):
		sonoichi_singlepage_nav();
	else:
		sonoichi_paginate_links();
	endif;
}

/**
 * Displays navigation to next/previous set of attachments when applicable.
 *
 * @see sonoichi_page_nav()
 */
function sonoichi_attachment_nav() {
?>
	<nav role="navigation" class="mod-navNeighbor">
		<ul class="mod-navNeighbor-list">
			<?php previous_image_link( false, __( 'Previous', 'sonoichi' ) ); ?>
			<?php next_image_link( false, __( 'Next', 'sonoichi' ) ); ?>
		</ul>
	</nav><!-- .mod-pagination -->
<?php
}

/**
 * If the previous image link is NULL, cancel outputting the associated HTML.
 *
 * @see sonoichi_attachment_nav()
 */
function sonoichi_previous_image_link( $output ) {
	if( is_null( $output ) ){
		$output = '';
	}else{
		$output = '<li class="prev"><span class="wrapper">'.$output.'</span></li>';
	}
	return $output;
}
add_filter( 'previous_image_link', 'sonoichi_previous_image_link', 10, 2 );

/**
 * If the next image link is NULL, cancel outputting the associated HTML
 *
 * @see sonoichi_attachment_nav()
 */
function sonoichi_next_image_link( $output ) {
	if( is_null( $output ) ){
		$output = '';
	}else{
		$output = '<li class="next"><span class="wrapper">'.$output.'</span></li>';
	}
	return $output;
}
add_filter( 'next_image_link', 'sonoichi_next_image_link', 10, 2 );

/**
 * Displays navigation with numbers to next/previous set of posts when applicable.
 *
 * @see sonoichi_page_nav()
 */
function sonoichi_paginate_links(){
	global $wp_query;
	$big = 999999999; // need an unlikely integer
?>
	<nav role="navigation" class="mod-pagination">
<?php
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'prev_text' => __( 'Previous', 'sonoichi' ),
		'next_text' => __( 'Next', 'sonoichi' ),
		'type' => 'list',
		'total' => $wp_query->max_num_pages
		));
?>
	</nav><!-- .mod-pagination -->
<?php
}

/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @see sonoichi_page_nav()
 */
function sonoichi_singlepage_nav() {
	global $post;

	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next = get_adjacent_post( false, '', false );
	if ( ! $next && ! $previous )
		return;
?>
	<nav role="navigation" class="mod-navNeighbor">
		<ul class="mod-navNeighbor-list">
		<?php  if($previous): ?>
			<li class="prev"><span class="wrapper">
			<?php previous_post_link( '%link', _x( '%title', 'Previous post link', 'sonoichi' ) ); ?>
			</span></li>
		<?php  endif; ?>
		<?php  if($next): ?>
			<li class="next"><span class="wrapper">
			<?php next_post_link( '%link', _x( '%title', 'Next post link', 'sonoichi' ) ); ?>
			</span></li>
		<?php  endif; ?>
		</ul>
	</nav><!-- .mod-pagination -->
<?php
}

/**
 * If the title is empty, display '(untitled)' instead.
 */
function sonoichi_the_title( $title ) {
    if ($title == '') {
        return __('(Untitled)', 'sonoichi' );
    } else {
        return $title;
    }
}
add_filter('the_title', 'sonoichi_the_title', 10, 2 );

/**
 * Creates a title element text for output in head of document, based on current view.
 */
function sonoichi_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	return $title;
}
add_filter( 'wp_title', 'sonoichi_wp_title', 10, 2 );

/**
 * Arrange 'default calendar widget' output
 * Change the markup.
 */
function sonoichi_calendar_output($calendar_output) {
	$fromPrev = '&laquo;';
	$toPrev = '';
	$fromNext = '&raquo;';
	$toNext = '';

	$calendar_output = str_replace($fromPrev, $toPrev,$calendar_output );
	$calendar_output = str_replace($fromNext, $toNext,$calendar_output );
	echo $calendar_output;
}
add_filter('get_calendar', 'sonoichi_calendar_output');

/**
 * Arrange 'comment list' output
 * Change the markup.
 */
function sonoichi_list_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<article id="comment-<?php comment_ID() ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment,$size='56' ); ?>
					<?php printf(__('<span class="fn">%s</span>'), get_comment_author_link()) ?>
					<br />
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
						<time datetime="<?php printf(__('%1$s at %2$s', 'sonoichi'), get_comment_date(),  get_comment_time('G:i')) ?>">
							<?php printf(__('%1$s at %2$s', 'sonoichi'), get_comment_date(),  get_comment_time('G:i')) ?>
						</time>
					</a><?php edit_comment_link(__('(Edit)', 'sonoichi'),'  ','') ?>
				</div>
	<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.', 'sonoichi') ?></em>
				<br />
	<?php endif; ?>
			</footer>
			<div class="comment-content">
				<?php comment_text() ?>
			</div>
		</article>
<?php
}

/**
 * Arrange 'default gallery' output
 * Change the markup.
 */
function sonoichi_gallery_output($output,$attr){
	global $post, $wp_locale;
	static $instance = 0;
		$instance++;

	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'tr',
		'icontag'    => 'td',
		'captiontag' => 'span',
		'columns'    => 4,
		'size'       => 'sonoichi-gallery-thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;

	$selector = "gallery-{$instance}";

	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = $gallery_div;

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {

		if (++$i % $columns == 1 ) $output .= '<ul>';
		
		$output .= "<li>";

		if ( ! empty( $attr['link'] ) && 'file' === $attr['link'] ){
			$output .= "<a href='".wp_get_attachment_url( $id )."' title='".get_the_title($id)."'>";
		}elseif ( ! empty( $attr['link'] ) && 'none' === $attr['link'] ){
			//no link, no action
		}else{
			$output .= "<a href='".get_permalink($id)."' title='".get_the_title($id)."'>";
		}

		$output .= "<span class='gallery-icon'>".wp_get_attachment_image($id)."</span>";
		
		if (trim($attachment->post_excerpt) ) {
			$output .= "
				<span class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</span>";
		}
		
		if ( ! empty( $attr['link'] ) && 'none' === $attr['link'] ){
			//no link, no action
		}else{
			$output .= "</a>";
		}

		$output .= "</{$icontag}></li>";
		
		if ( $columns > 0 && $i % $columns == 0 ) $output .= '</ul>';

	}

	$output .= "</div>\n";

	return $output;
}
add_filter( 'post_gallery', 'sonoichi_gallery_output' , 10, 2);
add_post_type_support( 'page', 'excerpt' );