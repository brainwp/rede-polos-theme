<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
// require_once get_template_directory() . '/core/classes/class-post-type.php';
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since  2.2.0
	 *
	 * @return void
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Bootstrap.
	wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );

	// General scripts.
	// FitVids.
	wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

	// Main jQuery.
	wp_enqueue_script( 'odin-main', $template_url . '/assets/js/main.js', array(), null, true );

	// Grunt main file with Bootstrap, FitVids and others libs.
	// wp_enqueue_script( 'odin-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );

	// Grunt watch livereload in the browser.
	// wp_enqueue_script( 'odin-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/plugins-support.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/////////////CPT polos
add_action( 'init', 'polos_cpt' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function polos_cpt() {
	$labels = array(                        
		'name'               => 'Polos',
		'singular_name'      => 'Polo',
		'menu_name'          => 'Polos',
		'name_admin_bar'     => 'Polos',
		'add_new'            => 'Adicionar Novo',
		'add_new_item'       => 'Adicionar Novo Polo',
		'new_item'           => 'Novo Polo' ,
		'edit_item'          => 'Editar Polo',
		'view_item'          => 'Ver todos' ,
		'all_items'          => 'Todos' ,
		'search_items'       => 'Buscar',
		'parent_item_colon'  => 'Pai' ,
		'not_found'          => 'Nenhum encontrado' ,
		'not_found_in_trash' => 'Nenhum encontrado na lixeira' ,
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'polo' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' => 'dashicons-shield',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);

	register_post_type( 'polos', $args );
}
/////////////////////////////////////////


	///////////////////////////////////////////////////////////////
	////////////////Custom Field videos////////////////
	////////////////////////////////////////////////////////////////


	function my_register_fields()
		{
		    include_once( get_stylesheet_directory().'/assets/php/acf-video.php');
		}
		add_action('acf/register_fields', 'my_register_fields');
	
		///////////////////////////////////////////////////////////////
		/////////////Custom Field videos////
		////////////////////////////////////////////////////////////////
		
		////////////custom fields////////////////////////////////
		if(function_exists("register_field_group"))
		{
			register_field_group(array (
				'id' => 'acf_portfolio',
				'title' => 'Portfolio',
				'fields' => array (
					array (
						'key' => 'field_54e8ed92c680e',
						'label' => 'Mídia',
						'name' => 'midia',
						'type' => 'select',
						'instructions' => 'Escolha o típo de Mídia',
						'required' => 1,
						'choices' => array (
							'video' => 'Vídeo',
							'imagem' => 'Imagem',
						),
						'default_value' => '',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_54e8ecf1ffdc1',
						'label' => 'Vídeo',
						'name' => 'video',
						'type' => 'video',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_54e8ed92c680e',
									'operator' => '==',
									'value' => 'video',
								),
							),
							'allorany' => 'all',
						),
						'preview_type' => 'embed',
						'return_value' => 'url',
					),
					array (
						'key' => 'field_54e8edbefc853',
						'label' => 'Galeria de Imagens',
						'name' => 'galeria_de_imagens',
						'type' => 'wysiwyg',
						'instructions' => 'Insira a galeria com as imagens.',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_54e8ed92c680e',
									'operator' => '==',
									'value' => 'imagem',
								),
							),
							'allorany' => 'all',
						),
						'default_value' => '',
						'toolbar' => 'basic',
						'media_upload' => 'yes',
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'portfolio',
							'order_no' => 0,
							'group_no' => 0,
						),
					),
				),
				'options' => array (
					'position' => 'normal',
					'layout' => 'no_box',
					'hide_on_screen' => array (
					),
				),
				'menu_order' => 0,
			));
		}
		
		
		
		
	
	add_action('admin_head', 'my_custom_fonts');

	function my_custom_fonts() {
	  echo '<style>
	    #acf-galeria_de_imagens .mce-toolbar-grp{
			display:none
	    } 
	  </style>';
	}
	////////////////////////////////////////////////////////////////////////////////
	
	////////////////////////// ////////////////////////////////////////
	////////////////////////// tamanho thumbs////////////////////////////////////////
	add_action( 'after_setup_theme', 'tamanho_thumb' );
	function tamanho_thumb() {
	  add_image_size( 'port-thumb', 1146, 670, true  ); 
	  add_image_size( 'servico-thumb', 900, 700, true  ); 
	  add_image_size( 'port-int-thumb', 1000, 700, true  ); 
	
	
	}//////////////////////////slider tamanho////////////////////////////////////////
	//////////////////////////slider tamanho////////////////////////////////////////
	
	function isacustom_excerpt_length($length) {
	    global $post;
	    if ($post->post_type == 'post')
	    return 32;
	    else if ($post->post_type == 'portfolio')
	    return 10;
	    else
	    return 30;
	    }
	    add_filter('excerpt_length', 'isacustom_excerpt_length');
		function new_excerpt_more( $more ) {
			return '...';
		}
		add_filter('excerpt_more', 'new_excerpt_more');
	
	
function navegacao_bolas() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li id="ante"> %s</li>' . "\n", get_previous_posts_link('<') );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li id="prox">%s</li>' . "\n", get_next_posts_link('>') );

	echo '</ul></div>' . "\n";

}

/////tamanho galeria

function amethyst_gallery_atts( $out, $pairs, $atts ) {
    
	$atts = shortcode_atts( array(
	
      'columns' => '1',
      'size' => 'full',
    ), $atts );
 	$pairs['link']='none';
    $out['columns'] = $atts['columns'];
    $out['size'] = $atts['size'];
 
    return $out;
 
}
add_filter( 'shortcode_atts_gallery', 'amethyst_gallery_atts', 10, 3 );

/**
 * Replaces the URL for an attachment link.
 *
 * @param  string $markup     Original link markup
 * @param  int    $id         Post id
 * @param  mixed  $size       Image size, array or string
 * @param  string $permalink  URL
 * @param  bool   $icon       Use an icon?
 * @param  bool   $text       Use text?
 * @return string             New markup
 */
function modify_attachment_link( $markup, $id, $size, $permalink, $icon, $text )
{
    // We need just thumbnails.
    if ( 'full' !== $size )
    {   // Return the original string untouched.
        return $markup;
    };

    // We have stored the new URL in a post meta field.
    // See http://wordpress.stackexchange.com/q/3097 for an example.
   
    // Recreate the missing information.
    $link_text = wp_get_attachment_image( $id, $size, $icon );
   

    return $link_text;
}

add_filter( 'wp_get_attachment_link', 'modify_attachment_link', 10, 6 );
