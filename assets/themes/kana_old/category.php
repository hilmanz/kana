<?php
	global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	get_header(); 
?>
<div id="universal">
        	<div class="headingblog">
                    <div class="wrapper">
                        <div class="titleSingle">  
                			<h2 class="fl"><?php printf( __( '%s' ), '<span>' . single_cat_title( '', false ) . '</span>' );?></h2>
                            <?php
							$subcategories = get_categories('&child_of=1&hide_empty'); // List subcategories of category '4' (even the ones with no posts in them)
							echo '<ul  class="subcat">';
							foreach ($subcategories as $subcategory) {
							  echo sprintf('<li><a href="%s">%s <span class="dash">&mdash;</span> </a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
							}
							echo '</ul>';
							?>
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