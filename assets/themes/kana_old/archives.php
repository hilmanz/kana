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
                                <?php if ( is_day() ) : ?>
                                                <?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
                                <?php elseif ( is_month() ) : ?>
                                                <?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyten' ) ) ); ?>
                                <?php elseif ( is_year() ) : ?>
                                                <?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentyten' ) ) ); ?>
                                <?php else : ?>
                                                <?php _e( 'Blog Archives', 'twentyten' ); ?>
                                <?php endif; ?>
                            </h2>
                        </div>
                    </div><!-- END .wrapper -->
            </div><!-- END .headingblog -->
            <div class="theContent">
        		<div class="wrapper">
           		 <?php include(TEMPLATEPATH.'/content-loop.php'); ?>
    			</div><!-- END .wrapper -->
    		</div><!-- END .theContent -->
</div><!-- END #universal -->
<?php get_footer(); ?>