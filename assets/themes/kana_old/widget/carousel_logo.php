<?php
	 $screenshotShowm	= eurekaGetOption('mobile_screenshotShowm');
	 $screenshotShow	= eurekaGetOption('screenshot_screenshotShow');
	 $screenshotTitle	= eurekaGetOption('screenshot_screenshotTitle');
	 $screenshotTitleColor	= eurekaGetOption('screenshot_screenshotTitleColor');
?>
<?php if($screenshotShow == 'Yes') :?>
<div id="footer-top" class="<?php echo $screenshotShowm; ?>">
	<div class="wrapper">
		<?php  if(empty($screenshotTitle)) : ?>
			 <?php if(empty($screenshotTitleColor)) :?>
                <div class="titleBar">
                    <div class="line"></div>
                    <h2 style="background:#ac92ec;"><span style="border-right:20px solid #ac92ec;" class="arrowLeft">&nbsp;</span> SCREENSHOT <span style="border-left:20px solid #ac92ec;" class="arrowRight">&nbsp;</span></h2>
                </div><!-- END .titleBar -->
             <?php else : ?>
                <div class="titleBar">
                    <div class="line"></div>
                    <h2 style="background:#<?php echo $screenshotTitleColor ?>;"><span style="border-right:20px solid #<?php echo $screenshotTitleColor ?>;" class="arrowLeft">&nbsp;</span> SCREENSHOT <span style="border-left:20px solid #<?php echo $screenshotTitleColor ?>;" class="arrowRight">&nbsp;</span></h2>
                </div><!-- END .titleBar -->
             <?php  endif; ?> 
        <?php  else : ?>
			 <?php if(empty($testititlecolor)) :?>
                <div class="titleBar">
                    <div class="line"></div>
                    <h2 style="background:#ac92ec;"><span style="border-right:20px solid #ac92ec;" class="arrowLeft">&nbsp;</span> <?php echo $screenshotTitle; ?> <span style="border-left:20px solid #ac92ec;" class="arrowRight">&nbsp;</span></h2>
                </div><!-- END .titleBar -->
             <?php else : ?>
                <div class="titleBar">
                    <div class="line"></div>
                    <h2 style="background:#<?php echo $screenshotTitleColor ?>;"><span style="border-right:20px solid #<?php echo $screenshotTitleColor ?>;" class="arrowLeft">&nbsp;</span> <?php echo $screenshotTitle; ?> <span style="border-left:20px solid #<?php echo $screenshotTitleColor ?>;" class="arrowRight">&nbsp;</span></h2>
                </div><!-- END .titleBar -->
             <?php  endif; ?> 
        <?php endif;  ?> 
        <div id="carouselLogo">
            <div class="carosellogo carousel">
                <ul class="slides">
                    <?php $queryObject = new WP_Query( 'post_type=carousellogo&showposts=1000' );
                    // The Loop!
                    if ($queryObject->have_posts()) { ?>
                        <?php while ($queryObject->have_posts()) { $queryObject->the_post(); ?>
                            <?php $carousellogo_url = get_post_meta( $post->ID, '_cmb_carousellogo_url', true );
                                  $carousellogo_img = get_post_meta( $post->ID, '_cmb_carousellogo_img', true );
                             ?>
                            <li>
                                <div class="boxLogo">
                                    <a href="<?php echo $carousellogo_url; ?>" title="<?php the_title(); ?>">
                                    <img src="<?php echo $carousellogo_img; ?>" alt="<?php the_title(); ?>" /></a>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } else { ?>   
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo1.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo2.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo3.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo4.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo5.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo6.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo1.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo2.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo3.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo4.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo5.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo6.jpg" alt="" /></a>
                        </div>
                    </li>
                    <?php } ?>
                </ul><!-- END .slides -->
            </div><!-- END .carousel -->
        </div><!-- END #carouselLogo -->
    </div>
</div>
<?php  elseif ($screenshotShow == 'No') :?>
<?php else : ?>
<div id="footer-top">
	<div class="wrapper">
        <div class="titleBar">
            <div class="line"></div>
            <h2 style="background:#ac92ec;"><span style="border-right:20px solid #ac92ec;" class="arrowLeft">&nbsp;</span> SCREENSHOT <span style="border-left:20px solid #ac92ec;" class="arrowRight">&nbsp;</span></h2>
        </div><!-- END .titleBar -->
        <div id="carouselLogo">
            <div class="carosellogo carousel">
                <ul class="slides">  
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo1.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo2.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo3.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo4.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo5.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo6.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo1.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo2.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo3.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo4.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo5.jpg" alt="" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="boxLogo">
                            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/logo/logo6.jpg" alt="" /></a>
                        </div>
                    </li>
                </ul><!-- END .slides -->
            </div><!-- END .carousel -->
        </div><!-- END #carouselLogo -->
    </div>
</div>
<?php  endif; ?> 