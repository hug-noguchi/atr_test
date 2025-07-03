<?php

function my_setup() {
  //add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'my_setup' );



// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails');
function twpp_setup_theme() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-thumb', 100, 100, true );
  }
  add_action( 'after_setup_theme', 'twpp_setup_theme' );

/* widget */

if(function_exists('register_sidebar')){
	register_sidebar(array(
		'name' => 'search_area',
		'id' => 'search',
		'before_widget' => '<div id="searchwrap">',
		'after_widget' => '</div>'
	));
}

function my_php( $template, $class ){
    if ($class == 'pagination') {
        $template = '
	<nav class="navigation %1$s" role="navigation">
		<ul class="nav-links">%3$s</ul>
	</nav>';
    }

    return $template;
}

add_filter('php', 'my_php', 10, 2);

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
remove_action('wp_head','rest_output_link_wp_head');

add_action( 'wp_enqueue_scripts', 'remove_my_global_styles' );
function remove_my_global_styles() {
	wp_dequeue_style( 'global-styles' );
}

?>

<?php
//wp_headで出力されるtitleタグを削除
//remove_action('wp_head', '_wp_render_title_tag');

/**
 * 各投稿一覧ページにアイキャッチ画像用の列を追加
 */
add_filter( 'manage_posts_columns', 'add_custom_post_columns');    //投稿 & カスタム投稿
add_filter( 'manage_pages_columns', 'add_custom_post_columns' );   //固定ページ
if ( !function_exists( 'add_custom_post_columns' ) ) {
    function add_custom_post_columns( $columns ) {
        global $post_type;
        if( in_array( $post_type, array('post', 'page') ) ) {
            $columns['thumbnail'] = $post_type.'アイキャッチ画像';    //カラム表示名
        }
        return $columns;
    }
}
/**
 * サムネイル画像を表示
 */
add_action( 'manage_posts_custom_column', 'output_custom_post_columns', 10, 2 );  //投稿 & カスタム投稿(階層構造が無効)
add_action( 'manage_pages_custom_column', 'output_custom_post_columns', 10, 2 );  //固定ページ & カスタム投稿(階層構造が有効)
if ( !function_exists( 'output_custom_post_columns' ) ) {
    function output_custom_post_columns( $column_name, $post_id ) {
        if ( 'thumbnail' === $column_name ) {
            $thumb_id  = get_post_thumbnail_id( $post_id );
            if ( $thumb_id ) {
                $thumb_img = wp_get_attachment_image_src( $thumb_id, 'medium' );  //サイズはご自由に
                echo '<img src="',$thumb_img[0],'" width="100px">';
            } else {
                echo 'アイキャッチ画像が設定されていません';
            }
        }
    }
}
?>
