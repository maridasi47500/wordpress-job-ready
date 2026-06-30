	    <?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


<?php
	    if ( have_posts() ) :
	        while ( have_posts() ) :

	            the_post();
	            echo ' post format : ' . get_post_format();
	            // charger le post avant de charger les functions
	            the_title( '<h1>', '</h1>' );
                    echo "contenu de ma page";
	            the_content();
	        endwhile;
	    else :
	        echo '<p>il n\'y a rien a afficher</p>';
get_search_form();
	    endif;
?>
<?php
get_sidebar( 'content' );
get_sidebar( 'front' );

get_sidebar();
get_footer();

