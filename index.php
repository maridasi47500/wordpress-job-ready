	    <?php
	    if ( have_posts() ) :
	        while ( have_posts() ) :
	            the_post();
	            // 显示文章内容
	            the_title( '<h1>', '</h1>' );
	            the_content();
	        endwhile;
	    else :
	        echo '<p>暂无内容。</p>';
	    endif;
?>
