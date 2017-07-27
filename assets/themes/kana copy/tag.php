<?php
	global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	get_header(); 
?>
<div class="wrapper">
    <ul class="columns-content page-content clearfix">
        <li class="col-main">
			<div class="the-content clearfix">
            <h2 class="the-title">
				<?php  printf( __( 'Tag Archives: %s', 'twentyten' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
            </h2>
            <?php include(TEMPLATEPATH.'/content-loop.php'); ?>
			</div><!-- END .the-content -->
        </li><!-- END .col-main -->
        <li class="col-sidebar">
      		 <?php get_sidebar(); ?>
        </li><!-- END .col-sidebar -->
    </ul>
</div><!-- END .wrapper -->
<?php get_footer(); ?>