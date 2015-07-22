<?php
/**
 * Odin admin functions.
 */

/**
 * Custom admin scripts.
 */
function odin_admin_scripts() {
	wp_enqueue_style( 'odin-inc-admin', get_template_directory_uri() . '/inc/assets/css/custom-admin.css' );
}

add_action( 'admin_enqueue_scripts', 'odin_admin_scripts' );
add_action( 'login_enqueue_scripts', 'odin_admin_scripts' );

/**
 * Remove logo from admin bar.
 */
function odin_admin_adminbar_remove_logo() {
	global $wp_admin_bar;

	$wp_admin_bar->remove_menu( 'wp-logo' );
}

add_action( 'wp_before_admin_bar_render', 'odin_admin_adminbar_remove_logo' );

/**
 * Custom Footer.
 */
function odin_admin_footer() {
	echo date( 'Y' ) . ' - ' . get_bloginfo( 'name' );
}

add_filter( 'admin_footer_text', 'odin_admin_footer' );

/**
 * Custom logo URL.
 */
function odin_admin_logo_url() {
	return home_url();
}

add_filter( 'login_headerurl', 'odin_admin_logo_url' );

/**
 * Custom logo title.
 */
function odin_admin_logo_title() {
	return get_bloginfo( 'name' );
}

add_filter( 'login_headertitle', 'odin_admin_logo_title' );

/**
 * Remove widgets dashboard.
 */
function odin_admin_remove_dashboard_widgets() {
	// remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	// remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );

	// Yoast's SEO Plugin Widget
	remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );
}

add_action( 'wp_dashboard_setup', 'odin_admin_remove_dashboard_widgets' );

/**
 * Remove Welcome Panel.
 */
remove_action( 'welcome_panel', 'wp_welcome_panel' );


// KIRKI
include_once get_template_directory() . '/inc/kirki/kirki.php';
/**
 * Configuration sample for the Kirki Customizer
 */
function brasa_kirki_config() {

	/**
	 * If you need to include Kirki in your theme,
	 * then you may want to consider adding the translations here
	 * using your textdomain.
	 *
	 * If you're using Kirki as a plugin then you can remove these.
	 */

	$strings = array(
		'background-color' => __( 'Cor do background', 'odin' ),
		'background-image' => __( 'Imagem de background', 'odin' ),
		'no-repeat' => __( 'Não repetir', 'odin' ),
		'repeat-all' => __( 'Repetir X e Y', 'odin' ),
		'repeat-x' => __( 'Repetir Horizontal', 'odin' ),
		'repeat-y' => __( 'Repeat Vertically', 'odin' ),
		'inherit' => __( 'Inherit', 'odin' ),
		'background-repeat' => __( 'Repetição do background', 'odin' ),
		'cover' => __( 'Cobrir', 'odin' ),
		'contain' => __( 'Conter', 'odin' ),
		'background-size' => __( 'Tamanho do background', 'odin' ),
		'fixed' => __( 'Fixo', 'odin' ),
		'scroll' => __( 'Scroll', 'odin' ),
		'background-attachment' => __( 'Background Attachment', 'odin' ),
		'left-top' => __( 'Left Top', 'odin' ),
		'left-center' => __( 'Left Center', 'odin' ),
		'left-bottom' => __( 'Left Bottom', 'odin' ),
		'right-top' => __( 'Right Top', 'odin' ),
		'right-center' => __( 'Right Center', 'odin' ),
		'right-bottom' => __( 'Right Bottom', 'odin' ),
		'center-top' => __( 'Center Top', 'odin' ),
		'center-center' => __( 'Center Center', 'odin' ),
		'center-bottom' => __( 'Center Bottom', 'odin' ),
		'background-position' => __( 'Background Position', 'odin' ),
		'background-opacity' => __( 'Background Opacity', 'odin' ),
		'ON' => __( 'ON', 'odin' ),
		'OFF' => __( 'OFF', 'odin' ),
		'all' => __( 'All', 'odin' ),
		'cyrillic' => __( 'Cyrillic', 'odin' ),
		'cyrillic-ext' => __( 'Cyrillic Extended', 'odin' ),
		'devanagari' => __( 'Devanagari', 'odin' ),
		'greek' => __( 'Greek', 'odin' ),
		'greek-ext' => __( 'Greek Extended', 'odin' ),
		'khmer' => __( 'Khmer', 'odin' ),
		'latin' => __( 'Latin', 'odin' ),
		'latin-ext' => __( 'Latin Extended', 'odin' ),
		'vietnamese' => __( 'Vietnamese', 'odin' ),
		'serif' => _x( 'Serif', 'font style', 'odin' ),
		'sans-serif' => _x( 'Sans Serif', 'font style', 'odin' ),
		'monospace' => _x( 'Monospace', 'font style', 'odin' ),
	);

	$args = array(
		'description'  => '',
		//'color_accent' => '#496849',
		'color_back'   => '#FFF',
		'textdomain'   => 'kirki',
		'i18n'         => $strings,
		'url_path'     => get_template_directory_uri() . '/inc/kirki'
	);

	return $args;

}
add_filter( 'kirki/config', 'brasa_kirki_config' );

/**
 * Create the customizer panels and sections
 */
function brasa_kirki_add_panel( $wp_customize ) {

	/**
	 * Add sections
	 */

	$wp_customize->add_section( 'box_home', array(
		'title'       => __( 'Destaques na home', 'odin' ),
		'priority'    => 10,
	) );
	$wp_customize->add_section( 'participe', array(
		'title'       => __( 'Seção Participe', 'odin' ),
		'priority'    => 10,
	) );
}
add_action( 'customize_register', 'brasa_kirki_add_panel' );
/**
 * Create the setting
 */
function brasa_kirki_fields( $fields ) {
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'image_text',
		'label'    => __( 'Frase na Placa', 'odin' ),
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'color',
		'setting'  => 'box1_color',
		'label'    => __( 'Cor do box 1', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'box1_title',
		'label'    => __( 'Titulo do box 1', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'box1_text',
		'label'    => __( 'Texto do box 1', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'box1_btn',
		'label'    => __( 'Titulo do botão no box 1', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'box1_btn_url',
		'label'    => __( 'Link do botão no box 1', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'color',
		'setting'  => 'box2_color',
		'label'    => __( 'Cor do box 2', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'box2_title',
		'label'    => __( 'Titulo do box 2', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'box2_text',
		'label'    => __( 'Texto do box 2', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);

	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'box2_btn',
		'label'    => __( 'Titulo do botão no box 2', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'box2_btn_url',
		'label'    => __( 'Link do botão no box 2', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);

	$fields[] = array(
		'type'     => 'color',
		'setting'  => 'box3_color',
		'label'    => __( 'Cor do box 3', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'box3_title',
		'label'    => __( 'Titulo do box 3', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'box3_text',
		'label'    => __( 'Texto do box 3', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'box3_btn',
		'label'    => __( 'Titulo do botão no box 3', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'box3_btn_url',
		'label'    => __( 'Link do botão no box 3', 'odin' ),
		'section'  => 'box_home',
		'default'  => '',
		'priority' => 1,
	);

	$fields[] = array(
		'type'     => 'image',
		'setting'  => 'participe_bg',
		'label'    => __( 'Imagem de background', 'odin' ),
		'description' => __( 'Deixe vazio para usar a imagem padrão', 'odin' ), 
		'section'  => 'participe',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'participe_title',
		'label'    => __( 'Titulo da seção', 'odin' ),
		'section'  => 'participe',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'participe_text',
		'label'    => __( 'Descrição da seção', 'odin' ),
		'section'  => 'participe',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'participe_btn_url',
		'label'    => __( 'URL do Link no botão', 'odin' ),
		'section'  => 'participe',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'participe_btn',
		'label'    => __( 'Titulo no botão', 'odin' ),
		'section'  => 'participe',
		'default'  => '',
		'priority' => 1,
	);
	return $fields;
}
add_filter( 'kirki/fields', 'brasa_kirki_fields' );
