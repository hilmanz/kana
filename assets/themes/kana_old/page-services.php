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
                	<h2>"We provide a full service innovation."</h2>
                </div><!-- END .wrapper -->
                <div id="servicesline"></div>
                <a href="#section-solution" class="btnServices">&nbsp;</a>
    		</div><!-- END #section-quote -->
            <div id="section-service">
                <div class="wrapper">
                	<div class="servicesbox servicesbox1">
                    	<div class="iconservices iconservices1">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_services1.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentry servicesentry1">
                			<h3>Digital Marketing</h3>
                        	<ul class="col2">
                            	<li>Digital campaign & strategy</li>
                            	<li>Research & analysis</li>
                            </ul>
                        	<ul class="col2">
                            	<li>SEO & SEM strategy</li>
                            	<li>Media planning & buying</li>
                            </ul>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                	<div class="servicesbox servicesbox2">
                    	<div class="iconservices iconservices2">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_services2.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentry servicesentry2">
                			<h3>Creative Development</h3>
                        	<ul class="col2">
                            	<li>User experience design</li>
                            	<li>User interface design
                                	<ul>
                                        <li>Website design</li>
                                        <li>Mobile app design</li>
                                        <li>Game design</li>
                                    </ul>
                                </li>
                            </ul>
                        	<ul class="col2">
                            	<li>Interaction design
                                	<ul>
                                        <li>Flash</li>
                                        <li>HTML5</li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                	<div class="servicesbox servicesbox3">
                    	<div class="iconservices iconservices3">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_services3.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentry servicesentry3">
                			<h3>Digital Platform Development</h3>
                        	<ul class="col2">
                            	<li>Website & mobile app production</li>
                            	<li>Multimedia & game production</li>
                            </ul>
                        	<ul class="col2">
                            	<li>E-commerce solutions</li>
                            	<li>Content management system</li>
                            </ul>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                	<div class="servicesbox servicesbox4">
                    	<div class="iconservices iconservices4">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_services4.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentry servicesentry4">
                			<h3>Digital Community Management</h3>
                        	<ul class="col2">
                            	<li>Social media strategy</li>
                            	<li>Conversation & community engagement</li>
                            </ul>
                        	<ul class="col2">
                            	<li>Content calendar development</li>
								<li>Copywriting & graphic design</li>
                            </ul>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                </div><!-- END .wrapper -->
    		</div><!-- END #section-service -->
            <div id="section-solution">
                <div class="wrapper">
                	<h2>Digital Solutions.</h2>
                	<div class="servicesbox servicesbox5">
                    	<div class="iconservices iconservices5">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_services1s.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentries servicesentry5">
                			<h4><strong>1.</strong><span>Digital<br />Marketing</span></h4>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                	<div class="servicesbox servicesbox6">
                    	<div class="iconservices iconservices6">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_services2s.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentries servicesentry6">
                			<h4><strong>2.</strong><span>Creative<br />Development</span></h4>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                	<div class="servicesbox servicesbox7">
                    	<div class="iconservices iconservices7">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_services3s.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentries servicesentry7">
                			<h4><strong>3.</strong><span>Digital Platform Development</span></h4>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                	<div class="servicesbox servicesbox8">
                    	<div class="iconservices iconservices8">
                        	<img src="<?php bloginfo('template_directory'); ?>/images/icon_services4s.png" />
                        </div><!-- END .iconservices -->
                        <div class="servicesentries servicesentry8">
                			<h4><strong>4.</strong><span>Digital Community Management</span></h4>
                        </div><!-- END .servicesentry -->
                    </div><!-- END .servicesbox -->
                    <div class="smallBtn buttoninfo">
                        <a href="<?php echo home_url( '/' ); ?>products/" class="buttonarrow">
                            <div class="btnmask btnblue" data-hover="SEE OUR PRODUCTS"><span>SEE OUR PRODUCTS</span></div>
                            <div class="arrowws btnblue">&nbsp;</div>
                        </a>
                    </div><!-- END .smallBtn -->
                </div><!-- END .wrapper -->
    		</div><!-- END #section-solution -->
			<?php the_content(); ?>
         <?php endwhile; ?>
        <?php endif; ?>
</div><!-- END #universal -->
<?php get_footer(); ?>