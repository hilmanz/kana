<?php
/**
 * Template Name: ConfirmNewsletter Page
 *
 */
get_header(); ?>
<div id="goldPage">
<div id="universal">
		<?php
        if(have_posts()) :
            while(have_posts()) :
            the_post();
        ?>
        	
                <div class="headingblog" style="background-image:url(<?php bloginfo('template_directory'); ?>/content/bg_section_blog.jpg)">
                    <div class="wrapper">
                        <div class="titleSingle">  
							<h2><?php the_title(); ?></h2>
                        </div>
                    </div><!-- END .wrapper -->
                </div><!-- END .headingblog -->
                <div class="wrapper">
                	<div class="container-single">
                        <div class="theContent">
                            <?php the_content(); ?>
                        </div><!-- END .theContent -->
                    </div>
                </div><!-- END .wrapper -->
         <?php endwhile; ?>
        <?php endif; ?>
</div><!-- END #universal -->
<?php get_footer(); ?>