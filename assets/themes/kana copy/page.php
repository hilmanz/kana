<?php get_header(); ?>
<div class="wrapper">
    <ul class="columns-content page-content clearfix">
        <li class="col-main">
            <div class="the-contents">
                <?php
                if(have_posts()) :
                    while(have_posts()) :
                    the_post();
                ?>
                    <div <?php post_class(); ?>>
                        <div class="blog-title-single clearfix">
                                 <h2><?php the_title(); ?></h2>
                        </div><!-- END .blog-title-single -->
                        <div class="blog-single clearfix">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div><!-- END .the-content -->
        </li><!-- END .col-main -->
        <li class="col-sidebar">
        	<?php get_sidebar(); ?>
        </li><!-- END .col-sidebar -->
    </ul>
</div><!-- END .wrapper -->
<?php get_footer(); ?>