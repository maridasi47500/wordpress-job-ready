# bienvenue dans Job Ready Wordpress
- j'ai ajouté un functions.php, header.php, footer.php, sidebar.php, index.php, single.php, style.css
- vitre site est il un blog personnel, la site officiel d'une entreprise ? ou un portfolio?
un magasin en ligne a besoin des fonctionnalités pour la présentation de produits, un panier d'achat et une integration avec un systeme de paiement
- un blog : l'expérience de lecture des articles , partagesur les reseaux sociaux
- le theme peut prendre en charge la traduction (traduire le contenu) (.pot) 
- le systeme doit prendre en charge la gestion des fichiers necessaire à la traduction, et compatibilite des plugin multilingue (wpml polylang)
- le theme prend en charge des plugins comme WooCommerce, bbPress ou plugins populaire pour formulaire de contact
(regardez la documentation du theme et sa derniere mise à jour)
- meillleure pratique SEO : balise H1, h2, attribut alt images, et url simple et significatif
- le theme doit etre responsive et s'adapter aux telephones, tablettes et ordinateurs de bureau de tailles variees et fonctionner avec navigateurs populaires (chrome, firefox , safari, edge), utiliser les media queries
- modifier le code HTML, css, php ou utiliser des outils de construction de pages visuels (elementer , WPBakery) pour les utilisateurs nons technique
- objectif du site : exposition d'entreprise, e-commerce, blog de contenu, 
- creer une carte du site claire (achitecture informationnelle est l'ossature du site web) avec fig ou sketch
- avec node js et express, python et django, et php et laravel creer des model, vue et controlleur
- url simple : domain.com/service/design superieur a domain.com/page?id=123
- ajouter une description a l'image dans alt
- creer une carte du site en XML en generant sitemap.xml
- algorithmes gzip/brotli et outils de compression minify (compression et minimisation ressources) pour css et javascript
- google pagespeed insight ou lighthouse pour evaluer la vitesse de chargement
- voir les injection sql, et attaques par script inter-sites xss
- deploiement automise jenkins, github actions
- google analytics 4 pour suivre le trafic et comportement utilisateurs
- pour le contenu php (wordpress) ou python(django)
- pour applications à une seule page (SPA) nodejs
- une nouveau site web a besoin de 3 à 6 mois pour le referencement SEO
- utilisateur de constructeurs de sites web saas wixou shopify
- creer single-post-php.php, single.php, singular.php, index.php
- hook d'actions : permettent d'injecter votre code source à des moment precis, par exemple wp_enqueue_scripts
- modifier la longueur par defau des resume d'article
(function customexcertpt {return 20;} add_filter('excerpt_length',customexcerpt)- en header utilisé dans wp_head()
- en footer.php utilisé dans wp_footer()
- utilisé dans get header et get-footer
- prendre en compte le support de l'internationalisation traduction. __()
et _e()
- créer un sous theme (sub-theme) un fichier du meme nom dans le repertoire de la sous-theme et effectuez les modifications necessaires
- dans le manuel de wordpress, vous trouverez une liste complete et detaillée de tous les hooks d'action et du filtre de noyau, y compris le moment deleur execution.
- le javascript et les API Rest de wordpress vous permettra de rendre mes themes plus puissant et moderne





If you look into the loaded php.ini file for your wamp server. You can find this info by logging on to your [localhost] and then click on 'PHP Info'. you will see the list of parameters for your PHP. That should also show you where the php.ini configuration file is loaded from.
within that file, please locate the following:
short_open_tag = Off

If short_open_tag is set to "off", tags like "<?" will not be recognised as the start tag for a PHP script. In such a case, to begin a PHP script, you will need to code your script with an opening tag like "<?php".
Créer un répertoire de thèmes et les fichiers principaux.

Tout d’abord,/wp-content/themes/Créez un nouveau dossier dans le répertoire, par exemple…my-first-themeVoici le répertoire de vos thèmes. Ensuite, créez deux fichiers les plus basiques :style.cssetindex.phpParmi ceux-ci,style.cssNon seulement il contient des styles, mais ce qui est plus important, c’est le bloc de commentaires en haut, qui sert à…WordPressDéclarez les informations relatives au sujet.

````
	/*
	Theme Name: My First Theme
	Theme URI: https://example.com/my-first-theme
	Author: Your Name
	Author URI: https://example.com
	Description: 一个用于学习的简单WordPress主题。
	Version: 1.0
	License: GPL v2 or later
	Text Domain: my-first-theme
	*/
````
- index.php
````
	    <?php
	    if ( have_posts() ) :
	        while ( have_posts() ) :
	            the_post();
	            // 显示文章内容
	            the_title( &#039;<h1>', '</h1>' );
	            the_content();
	        endwhile;
	    else :
	        echo '<p>暂无内容。</p>';
	    endif;
	    ?>
````
- functions.php
````
<?php
function my_theme_setup() {
    // 注册导航菜单
    register_nav_menus( array(
        'primary' => __( 'Mon Premier Theme Perso de Wordpress', 'my-first-theme' ),
    ) );

// 为文章和页面启用特色图像
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );

````
-voici à quoi ressemble un article 
````
<article>
        <h2></h2>
        <div></div>
    </article>

    <p></p>
````

- functions.php
````
	function my_theme_setup() {
	    // 让主题支持文章和页面的特色图像
	    add_theme_support( 'post-thumbnails' );
	    // 注册一个主菜单
	    register_nav_menus( array(
	        'primary' => __( 'Primary Menu', 'my-first-theme' ),
	    ) );
	    // 加载主题文本域，用于翻译
	    load_theme_textdomain( 'my-first-theme', get_template_directory() . '/languages' );
	}
	add_action( 'after_setup_theme', 'my_theme_setup' );
````
- css & javascript

````
	function my_theme_scripts() {
	    // 引入主题的主样式表
	    wp_enqueue_style( 'my-theme-style', get_stylesheet_uri() );
	    // 引入一个自定义的 JavaScript 文件
	    wp_enqueue_script( 'my-theme-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );
````
-integrer sur la page daccueil
````
function crea_include_chapitres_in_home($query) {
    if ($query->is_home() && $query->is_main_query()) {
        $query->set('post_type', array('post', 'chapitre'));
    }
}
add_action('pre_get_posts', 'crea_include_chapitres_in_home');
````
- apres j'ai fait wget github/WordPress/WordPress/ .. /wp-content/themes/twentyfourteen/content-page.php
# wordpress-job-ready
