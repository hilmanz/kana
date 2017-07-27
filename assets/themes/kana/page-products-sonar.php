	<?php
    /**
     * Template Name: Products Sonar
     *
     */
    get_header(); ?>
<div id="producPage">
	<div class="section-grey">
        <div id="universal">
            <div class="wrapper">
                <?php
                if(have_posts()) :
                    while(have_posts()) :
                    the_post();
                ?>
                    <div class="theContent">
                        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/modernizr.slider.js"></script>
                        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/mt-slider.css" type="text/css"  media="all" />
                        <div id="mi-slider" class="mi-slider">
                            <ul>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                            </ul>
                            <ul>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                            </ul>
                            <ul>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                                <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/1.jpg" alt="img01"><h4>Boots</h4></a></li>
                            </ul>
                            <nav>
                                <a href="#">SONAR</a>
                                <a href="#">BRANDIFI</a>
                                <a href="#">TOUCHBASE</a>
                            </nav>
                        </div>
                        <script src="<?php bloginfo('template_directory'); ?>/js/jquery.catslider.js"></script>
                        <script>
                            $(function() {
                
                                $( '#mi-slider' ).catslider();
                
                            });
                        </script>
                    </div><!-- END .theContent -->
                    <?php the_content(); ?>
                 <?php endwhile; ?>
                <?php endif; ?>
            </div><!-- END .wrapper -->
        </div><!-- END #universal -->
    </div><!-- END .section-grey -->
    <?php get_footer(); ?>
</div><!-- END #producPage -->