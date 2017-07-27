 <?php
	global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	get_header(); 
?>
<div id="universal">
        	<div class="headingblog">
                    <div class="wrapper">
                        <div class="titleSingle">  
                            <h2 class="the-title">
								<?php if ( have_posts() ) : ?>
                                <h2 class="the-title"><?php printf( __( 'Search Results for : %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                                <?php else : ?>
                                <h2 class="the-title">Sorry, but nothing matched your search criteria. Please try again with some different keywords.</h2>
                                <?php endif; ?>
                            </h2>
                        </div>
                    </div><!-- END .wrapper -->
            </div><!-- END .headingblog -->
            <div class="theContent">
        		<div class="wrapper">
					<?php if ( have_posts() ) : ?>
                    <h2 class="the-title"><?php printf( __( 'Search Results for : %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                    <?php include(TEMPLATEPATH.'/content-loop.php'); ?>
                    <?php else : ?>
                            <div id="not-found">
								<div><?php get_search_form(); ?>  </div>     
                            </div>
                    <?php endif; ?>
    			</div><!-- END .wrapper -->
    		</div><!-- END .theContent -->
</div><!-- END #universal -->
<?php get_footer(); ?>