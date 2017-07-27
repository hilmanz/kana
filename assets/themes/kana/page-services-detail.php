<?php
/**
 * Template Name: Services Detail
 *
 */
get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/flexslider/jquery.flexslider-min.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/flexslider/flexslider.css" type="text/css"  media="all" />
<script type="text/javascript">
$(window).load(function() {
  $('.slideservices').flexslider({
    animation: "slide"
  });
});
</script>
<div id="redPage">
<div id="universal">
    <div id="services-detail">
		<?php
        if(have_posts()) :
            while(have_posts()) :
            the_post();
        ?>
			<?php the_content(); ?>

            <div class="center smallBtn">
                <a href="<?php echo home_url( '/' ); ?>services/" class="buttonarrow">
                    <div class="btnmask btnred" data-hover="SEE MORE SERVICES"><span>SEE MORE SERVICES</span></div>
                    <div class="arrowws btnred">&nbsp;</div>
                </a>
            </div><!-- END .center -->
         <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div><!-- END #universal -->
<?php get_footer(); ?>