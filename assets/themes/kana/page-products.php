	<?php
    /**
     * Template Name: Products
     *
     */
    get_header(); ?>
<div id="bluePage">
    <div id="universal">
        <div class="wrapper">
            <?php
            if(have_posts()) :
                while(have_posts()) :
                the_post();
            ?>
                <div class="heading">
                    <div class="col2">
                        <div class="titleBox">
                            <h2>Tools to measure<br /> your success.<br /><br /></h2>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                    <div class="col2">
                        <div class="titleBox">
                            <div class="entry">
                                <p>We've always believed that anything good should be shared, that's how our internal tools become full-blown platforms.</p>
								<p>Our tools are now available as products to help agencies and brands measure and generate high quality interactions from their social media campaigns.</p>
                                <div class="smallBtn">
                                    <a href="#productList" class="buttonarrow productList">
                                        <div class="btnmask btnblue" data-hover="SEE OUR TOOLS"><span>SEE OUR TOOLS</span></div>
                                        <div class="arrowws btnblue">&nbsp;</div>
                                    </a>
                                </div><!-- END .smallBtn -->
                            </div>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                </div><!-- END .heading -->
                <?php the_content(); ?>
             <?php endwhile; ?>
            <?php endif; ?>
        </div><!-- END .wrapper -->
    </div><!-- END #universal -->
	<div class="section-grey">
        <div class="wrapper">
            <?php
            if(have_posts()) :
                while(have_posts()) :
                the_post();
            ?>
                <div id="productList" class="theContent">
                    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/modernizr.slider.js"></script>
                    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/mt-slider.css" type="text/css"  media="all" />
                    <div id="mi-slider" class="mi-slider">
                        <ul>
                            <li class="content-product">
                                <div class="entry-product">
                                    <p><img src="<?php bloginfo('template_directory'); ?>/images/logo_sonar.png" /></p>
                                    <h3>Social & Online Media Analytics<br />and Research</h3>
                                    <p>We live, eat and breathe social data. Sonar delivers the metrics brands and agencies need to track KPIs through a pleasant and easy UI - You don't have to be an analytics expert to get the most out of Sonar.</p><p>Partnering with offical social data providers, we guarantee the capability to capture ALL of the social posts of your brand on our supported channels.</p>
                                    <div class="smallBtn">
                                        <a href="http://www.sonarplatform.com/" target="_blank" class="buttonarrow">
                                            <div class="btnmask btnblue" data-hover="GO TO WEBSITE"><span>GO TO WEBSITE</span></div>
                                            <div class="arrowws btnblue">&nbsp;</div>
                                        </a>
                                    </div><!-- END .smallBtn -->
                                </div>
                            </li>
                            <li class="thumbs-product"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/mac.png" alt="img01"></a></li>
                        </ul>
                        <ul>
                            <li class="content-product">
                                <div class="entry-product">
                                    <p><img src="<?php bloginfo('template_directory'); ?>/images/logo_brandifi.png" /></p>
                                    <h3>Branded <br />Wi-Fi Hotspots.</h3>
                                    <p>Brandifi takes advantage of the overwhelming demand and usage of free hotspots within a venue or during an digital activation event.</p>
                                    <p>Collect crucial information on your audience in exchange for free wi-fi access through social logins. Brandifi empowers wi-fi owners to independently manage landing pages,
                                     sell ad spaces and encourage engagements, breaking the current static paradigm of wifi ad placement.</p>
                                    <div class="smallBtn">
                                        <a href="<?php echo home_url( '/' ); ?>upload/Brandifi-KANA.pdf" target="_blank" class="buttonarrow">
                                            <div class="btnmask btnblue" data-hover="DOWNLOAD PDF"><span>DOWNLOAD PDF</span></div>
                                            <div class="arrowws btnblue">&nbsp;</div>
                                        </a>
                                    </div><!-- END .centerbox -->
                                </div>
                            </li>
                            <li class="thumbs-product"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/iphone.png" alt="img01"></a></li>
                        </ul>
                        <ul>
                            <li class="content-product">
                                <div class="entry-product">
                                    <p><img src="<?php bloginfo('template_directory'); ?>/images/logo_touchbase.png" /></p>
                                    <h3>Digitize Your Database Collecting & Consumer Interaction</h3>
                                    <p>The Touchbase mobile application is an end-to-end data collection framework that allows you to manage your on-ground database collection, track front liner performance and integrated third-party interaction tools. Choose from up to 20 customizable data fields for each of your events in Touchbase. Change the color scheme, background images, text colors and a whole lot more to make Touchbase more suitable for your brand or event.</p>
                                    <a href="https://itunes.apple.com/us/app/touchbase-connect/id898193404?ls=1&mt=8" target="_blank" class="downloadApp"><img src="<?php bloginfo('template_directory'); ?>/images/app-store.png" /></a>
                                    <a href="https://play.google.com/store/apps/details?id=id.kana.touchbase" target="_blank" class="downloadApp"><img src="<?php bloginfo('template_directory'); ?>/images/googlePlay.png" /></a>
                                    <div class="smallBtn">
                                        <a href="http://touchbaseconnect.com/" target="_blank" class="buttonarrow">
                                            <div class="btnmask btnblue" data-hover="GO TO WEBSITE"><span>GO TO WEBSITE</span></div>
                                            <div class="arrowws btnblue">&nbsp;</div>
                                        </a>
                                    </div><!-- END .centerbox -->
                                </div>
                            </li>
                            <li class="thumbs-product"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/ipad.png" alt="img01"></a></li>
                        </ul>
                        <ul>
                            <li class="content-product">
                                <div class="entry-product">
                                    <p><img src="<?php bloginfo('template_directory'); ?>/images/logo_momentogram.png" /></p>
                                    <h3>Take a Part of the Event Home with You</h3>
                                    <p>Create a social media buzz and enhance the reach of your events with Momentogram. We make your events more interactive and exciting than ever. Instantly print any image from Instagram or Twitter during your events. Manage hashtags, analytics and print templates with the included management system.  White label options available.</p>
                                </div>
                            </li>
                            <li class="thumbs-product"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/momentogram.png" alt="img01"></a></li>
                        </ul>
                        <ul>
                            <li class="content-product">
                                <div class="entry-product">
                                    <p><img src="<?php bloginfo('template_directory'); ?>/images/logo_kbeacon.png" /></p>
                                    <h3>Unlock Limitless Interaction Possibilities</h3>
                                    <p>Change the way your audience interacts with your brand with cutting-edge iBeacon technology.  Integrate the popular micro-location framework into your existing or newly developed mobile app and unlock countless interaction possibilities with your audience. Despite the "i" in the name, the technology works both on iOS and Android. Contact us today to discover what we can develop for you.</p>
                                </div>
                            </li>
                            <li class="thumbs-product"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/iphone2.png" alt="img01"></a></li>
                        </ul>
                        <nav>
                            <a href="#">SONAR</a>
                            <a href="#">BRANDIFI</a>
                            <a href="#">TOUCHBASE</a>
                            <a href="#">MOMENTOGRAM</a>
                            <a href="#">KBEACON</a> 
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
    </div><!-- END .section-grey -->
    <?php get_footer(); ?>