	<?php
   
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
                                    <p><img src="<?php bloginfo('template_directory'); ?>/images/logo_sonar.png" />
                                    <h3>Social Media<br />Listening & Analytics.</h3>
                                    <p>Sonar is a social & digital media listening tool that measures buzz and impact of any social media campaign or keyword. It's clear, 
                                    intuitive and straight-forward UI helps you keep track of campaign KPIs and sentiment.</p>
                                    <p>Sonar delivers 100% twitter conversation 
                                    coverage courtesy of our official partnership with Twitter, assuring you know ALL the conversations about your brand.</p>
                                    <div class="smallBtn">
                                        <a href="<?php echo home_url( '/' ); ?>products/tools" class="buttonarrow">
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
                                    <p><img src="<?php bloginfo('template_directory'); ?>/images/logo_touchbase.png" />
                                    <h3>Digital Activation <br />& Data Collection.</h3>
                                    <p>Touchbase is a fully customizable mobile application allowing agencies and brands to collect valuable audience data at brand activation events. Customize data fields and creatives to fit Touchbase seamlessly into your brand's look and feel for a small subscription fee. </p>
<p>Each account comes with a full-featured dashboard to analyze, summarize and export your data. Add-ons such as photo taking, social sharing and others are also available to enhance your audience's experience on ground.</p>
                                    <div class="smallBtn">
                                        <a href="<?php echo home_url( '/' ); ?>products/tools" class="buttonarrow">
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
                                    <p><img src="<?php bloginfo('template_directory'); ?>/images/logo_brandifi.png" />
                                    <h3>Branded <br />Wi-Fi Hotspots.</h3>
                                    <p>Brandifi takes advantage of the overwhelming demand and usage of free hotspots within a venue or during an digital activation event.</p>
                                    <p>Collect crucial information on your audience in exchange for free wi-fi access through social logins. Brandifi empowers wi-fi owners to independently manage landing pages,
                                     sell ad spaces and encourage engagements, breaking the current static paradigm of wifi ad placement.</p>
                                    <div class="smallBtn">
                                        <a href="<?php echo home_url( '/' ); ?>products/tools" class="buttonarrow">
                                            <div class="btnmask btnblue" data-hover="DOWNLOAD PDF"><span>DOWNLOAD PDF</span></div>
                                            <div class="arrowws btnblue">&nbsp;</div>
                                        </a>
                                    </div><!-- END .centerbox -->
                                </div>
                            </li>
                            <li class="thumbs-product"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/content/iphone.png" alt="img01"></a></li>
                        </ul>
                        <nav>
                            <a href="#">SONAR</a>
                            <a href="#">TOUCHBASE</a>
                            <a href="#">BRANDIFI</a>
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