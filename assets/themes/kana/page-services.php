<?php
/**
 * Template Name: Services
 *
 */
get_header(); ?>
<div id="redPage">
<div id="universal">
		<?php
        if(have_posts()) :
            while(have_posts()) :
            the_post();
        ?>
            <div class="wrapper">
                <div class="heading">
                    <div class="col2">
                        <div class="titleBox">
                            <h2>Enriching &amp; enhancing<br />digital media<br /></h2>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                    <div class="col2">
                        <div class="titleBox">
                            <div class="entry">
                                <p>We build smart digital branding strategies through careful & comprehensive research, utilizing self-developed tools to make the process even more efficient. With a team of creative and development specialists, we consistently strive to be at the forefront of new media technology.</p>
<p><strong>"With clear and concise strategies backed up by proper implementation, there’s no room for anything besides measurable success. We walk the talk."</strong></p>
                            </div>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                </div><!-- END .heading -->
            </div><!-- END .wrapper -->
            <div id="section-quote">
                <div class="wrapper">
                	<h2>"We take care of your digital campaign."</h2>
                </div><!-- END .wrapper -->
    		</div><!-- END #section-quote -->
            <div id="section-service">
                <div class="wrapper">
                	<div class="servicesbox servicesbox1">
                    	<div class="iconservices iconservices1">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_service1.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentry servicesentry1">
                			<h3>Social Media <br>Management</h3>
                        	<p>Our data-driven and engagement focused social media management services 
enables you to get the most of your owned social media channels.</p>
                            <a href="<?php echo home_url( '/' ); ?>social-media-management/" class="readmores">See how we can manage yours</a>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                	<div class="servicesbox servicesbox2">
                    	<div class="iconservices iconservices2">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_service2.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentry servicesentry2">
                			<h3>Digital <br>Activation</h3>
                        	<p>Take advantage of new technologies and activate your brand with interactive online campaigns, addictive games and engaging new ideas. We have the experience to take your activation to the next level.</p>
                            <a href="<?php echo home_url( '/' ); ?>digital-activation" class="readmores">Engage Your Audience Now</a>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                    <div class="rowplus">
                        <span class="plusicon fl"></span>
                        <span class="plusicon center"></span>
                        <span class="plusicon fr"></span>
                    </div>
                	<div class="servicesbox servicesbox3">
                    	<div class="iconservices iconservices3">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_service3.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentry servicesentry3">
                			<h3>Website <br>Development</h3>
                        	<p>A website is the cornerstone of any digital presence. Make your web presence 
stand-out and yield the results you need, from company profiles to full blown e-commerce
portals. We've done them all.</p>
                            <a href="<?php echo home_url( '/' ); ?>website-development" class="readmores">Build your web presence now</a>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                	<div class="servicesbox servicesbox4">
                    	<div class="iconservices iconservices4">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_service4.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentry servicesentry4">
                			<h3>Mobile <br>Development</h3>
                            <p>Mobile is the new first screen.</p>
                            <a href="<?php echo home_url( '/' ); ?>mobile-development" class="readmores">Build your mobile presence now</a>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                    <div class="rowplus">
                        <span class="plusicon fl"></span>
                        <span class="plusicon center"></span>
                        <span class="plusicon fr"></span>
                    </div>
                    <div class="servicesbox servicesbox5">
                        <div class="iconservices iconservices5">
                            <img src="<?php bloginfo('template_directory'); ?>/images/icon_service5.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentry servicesentry5">
                            <h3>Community <br>Engagement</h3>
                            <p>Communities are just waiting to be engaged, either online or offline. Our community engagement
platform enables company's to get the most out of their engagement quickly and cost-effectively.</p>
                            <a href="<?php echo home_url( '/' ); ?>community-engagement" class="readmores">Here's how we reach your community</a>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                    <div class="rowplus">
                        <span class="plusicon fl"></span>
                        <span class="plusicon fr"></span>
                    </div>

                    <div class="smallBtn">
                        <a href="<?php echo home_url( '/' ); ?>products/" class="buttonarrow">
                            <div class="btnmask btnred" data-hover="SEE OUR PRODUCTS"><span>SEE OUR PRODUCTS</span></div>
                            <div class="arrowws btnred">&nbsp;</div>
                        </a>
                    </div><!-- END .smallBtn -->
                </div><!-- END .wrapper -->
    		</div><!-- END #section-service -->
			<?php the_content(); ?>
         <?php endwhile; ?>
        <?php endif; ?>
</div><!-- END #universal -->
<?php get_footer(); ?>