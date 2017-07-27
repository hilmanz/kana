<div id="headingbox" class="landing1">
    <div class="headingbox">	
        <a href="javascript:void(0)" id="trigger" class="boxbtn btnmenu"><span class="btnmenu"></span></a>
		<a href="<?php echo home_url( '/' ); ?>" class="boxbtn logo"><span class="logo boxbtn">&nbsp;</span></a>
    </div><!-- END .headingbox -->
    <div class="overlay overlay-hugeinc">
        <div class="wrapper">
            <nav>
                <button type="button" class="overlay-close">Close</button>
				<?php if ( has_nav_menu( 'main-menu' ) ) { ?>
                    <div id="nav">
                <?php    $args	= array(
                        'theme_location'	=> 'main-menu',
                        'container'			=> false,
                        'menu_class'		=> 'sf-menu',
                        'fallback_cb'		=> 'eurekaMainMenu',
                        'menu_id' => 'main-menu',  
                    );
                    wp_nav_menu($args);
                ?>
        
                    </div>
                <?php }else { ?>
                    <div id="nav">
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">Clients</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                <?php } ?> 
            </nav>
        </div><!-- END .wrapper -->
    </div>
</div><!-- END #headingbox -->
<div id="footer">
    <div class="wrapper">
        <div class="col4">
        	<div class="footerbox">
               <h3>Headquarters</h3>
               <p>Jl. Kemang Timur Raya No. 100E<br />
                Jakarta 12730 <br />
                Indonesia</p>
               <p> Maps: <a href="https://www.google.com/maps/dir/-6.274164,%20106.820994" target="_blank">-6.274164, 106.820994</a><br />
                Phone: +62 21 7179 1949<br />
                Email: info@kana.co.id</p>
                <div class="socialmed">
                    <a href="https://www.facebook.com/kanadigital" target="_blank"><span class="icon-facebook2"></span></a>
                    <a href="https://twitter.com/kanadigital" target="_blank"><span class="icon-twitter2"></span></a>
                    <a href="https://twitter.com/kanadigital" target="_blank"><span class="icon-linkedins">in</span></a>
                </div><!-- END .socialmed -->
            </div><!-- END .footerbox -->
        </div><!-- END .col4 -->
        <div class="col4 trustedby">
        	<div class="footerbox">
               <h3><a href="<?php echo home_url( '/' ); ?>clients/">Trusted by</a></h3>
               <ul>
               	<li><a href="<?php echo home_url( '/' ); ?>clients/">Heineken</a></li>
               	<li><a href="<?php echo home_url( '/' ); ?>clients/">Bintang</a></li>
               	<li><a href="<?php echo home_url( '/' ); ?>clients/">Marlboro</a></li>
               </ul>
               <a href="<?php echo home_url( '/' ); ?>clients/" class="arrowwide">&nbsp;</a>
            </div><!-- END .footerbox -->
        </div><!-- END .col4 -->
        <div class="col2">
        	<div class="footerbox">
               <h3><a href="<?php echo home_url( '/' ); ?>category/blog/">From the Blog</a></h3>
               <div class="latestPost">
					<?php $queryObject = new WP_Query( 'showposts=1' );
                    if ($queryObject->have_posts()) { ?>
                        <?php while ($queryObject->have_posts()) { $queryObject->the_post(); ?>
                                <div class="post-content" id="post-<?php the_ID(); ?>">
                                    <div class="bigthumb">
                                        <?php if(has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'bigthumb' ); ?></a>
                                        <?php else : ?>
                                        <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/content/default-thumb.jpg" alt="" class="bigthumb" /></a>
                                        <?php endif; ?>
                              
                                    </div><!-- END .bigthumb -->
                                    <div class="blog-entry">
                                        <div class="blog-title">
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        </div><!-- END .blog-title -->
                                        <div class="summary clearfix">
                                            
                                             <p><?php acit_posted_on(); ?> &mdash; <?php if ($post->post_excerpt != "" ) {
                                                    the_excerpt();
                                                    }
                                                    else {
                                                    the_content_rss('', FALSE, '', 20);
                                                    }
                                             ?></p>
                                        	<a href="<?php the_permalink(); ?>" class="readmore">READ MORE &raquo;</a>
                                        </div>
                                    </div><!-- END .blog-entry -->
                                </div><!-- END .post-content -->
                        <?php } ?>
                    <?php } ?>
            	</div><!-- END .latestPost -->
            </div><!-- END .footerbox -->
        </div><!-- END .col2 -->
    </div><!-- END .wrapper -->
</div><!-- END #footer -->
<p class="copylt">Kana is Digital Innovation Agency</p>
<p class="copylb">&copy; 2014 kana digital</p>
<?php
if ( is_home() ) { ?>
	<a href="#" id="contactbtn" class="contactbtn"><span class="tcontact">Contact Us</span> <span class="icon-arrowrights">&nbsp;</span></a>
<?php } else { ?>
	<a href="#footer" id="contactbtn2" class="contactbtn"><span class="tcontact">Contact Us</span> <span class="icon-arrowrights">&nbsp;</span></a>
<?php } ?>
<?php wp_footer(); ?>
</div><!-- END #color-Page -->

</body>
</html>