<?php
function mychildtheme_enqueue_stylesa() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri() ); 
}
//add_action( 'wp_enqueue_scripts', 'mychildtheme_enqueue_stylesa');
//function my_theme_setup() {
//    // 注册导航菜单
//    register_nav_menus( array(
//        'primary' => __( 'Mon Premier Theme Perso de Wordpress', 'my-first-theme' ),
//    ) );
// 
//// 为文章和页面启用特色图像
//    add_theme_support( 'post-thumbnails' );
//}
//add_action( 'after_setup_theme', 'my_theme_setup' );
//function my_theme_setup() {
//    // 让主题支持文章和页面的特色图像
//    add_theme_support( 'post-thumbnails' );
//    // 注册一个主菜单
//    register_nav_menus( array(
//        'primary' => __( 'Primary Menu', 'my-first-theme' ),
//    ) );
//    // 加载主题文本域，用于翻译
//    //load_theme_textdomain( 'my-first-theme', get_template_directory() . '/languages' );
//
//}
//add_action( 'after_setup_theme', 'my_theme_setup' );
function my_theme_scripts() {
    // 引入主题的主样式表
    wp_enqueue_style( 'my-theme-style', get_stylesheet_uri() );
    // 引入一个自定义的 JavaScript 文件
    //wp_enqueue_script( 'my-theme-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );
    wp_enqueue_style( 'my-theme-style', get_template_directory_uri() . '/css/custom.css' );
}
//add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );
function crea_register_chapitre_cpt() {
    $labels = array(
        'name' => 'Chapitres',
        'singular_name' => 'Chapitre',
        'add_new' => 'Ajouter un nouveau',
        'add_new_item' => 'Ajouter un nouveau chapitre',
        'edit_item' => 'Modifier le chapitre',
        'new_item' => 'Nouveau chapitre',
        'view_item' => 'Voir le chapitre',
        'search_items' => 'Rechercher un chapitre',
        'not_found' => 'Aucun chapitre trouvé',
        'menu_name' => 'Chapitres'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'rewrite' => array('slug' => 'chapitres'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments')
    );

    register_post_type('chapitre', $args);
}
//add_action('init', 'crea_register_chapitre_cpt');
function crea_include_chapitres_in_home($query) {
    if ($query->is_home() && $query->is_main_query()) {
        $query->set('post_type', array('post', 'chapitre'));
    }
}

//add_action('pre_get_posts', 'crea_include_chapitres_in_home');

//function yourJS() {
//    wp_enqueue_script(
//        'custom_script',
//        plugins_url( '/js/your-script.js', __FILE__ ),
//        array( 'jquery' )
//    );
//}
//add_action( 'wp_enqueue_scripts',  'yourJS' );
//
//
//function prefix_add_my_stylesheet() {
//   wp_register_style( 'prefix-style', plugins_url( '/css/your-stylesheet.css', __FILE__ ) );
//   wp_enqueue_style( 'prefix-style' );
//}
//add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );
function mychildtheme_enqueue_styles(){
$parent_style = 'parent-style';
   wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style )); 
   wp_enqueue_style( 'extra-style', get_stylesheet_directory_uri() . '/style-extra.css', array( $parent_style ));
   wp_enqueue_style('mychildtheme_googlefonts', 'https://fonts.googleapis.com/css?family=Pacifico');
}
//add_action( 'wp_enqueue_scripts', 'mychildtheme_enqueue_styles' );
define( 'WP_DEBUG', true );
