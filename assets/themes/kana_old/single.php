<?php get_header(); ?>
<div id="universal">
	<?php if($post_type == 'clients') :?>
        <?php
        if(have_posts()) :
            while(have_posts()) :
            the_post();
        ?>
		<?php 
              $clients_logo = get_post_meta( $post->ID, '_cmb_clients_logo', true );
              $clients_banner = get_post_meta( $post->ID, '_cmb_clients_banner', true );
         ?>
           <div class="clientPostDetail">   
                <div class="headingblog" style="background-image:url('<?php echo $clients_banner; ?>')">
                    <div class="wrapper">
                        <div class="titleSingle">  
                                <img src="<?php echo $clients_logo; ?>" />
                                <h2><?php the_title(); ?></h2>
                        </div>
                    </div><!-- END .wrapper -->
                </div><!-- END .headingblog -->
                <div class="wrapper">
                    <div class="theContent">
                        <div class="blog-single">
                            <?php the_content(); ?>
                        </div>
                    </div><!-- END .theContent -->
                </div><!-- END .wrapper -->
           </div>
         <?php endwhile; ?>
        <?php endif; ?>
    <?php elseif($post_type == 'clientslogo') : ?>
	<div class="section-grey">
        <?php
        if(have_posts()) :
            while(have_posts()) :
            the_post();
        ?>
		<?php 
              $clients_logo = get_post_meta( $post->ID, '_cmb_clients_logo', true );
              $clients_banner = get_post_meta( $post->ID, '_cmb_clients_banner', true );
         ?>
        <div class="wrapper">
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
        </div><!-- END .wrapper -->
         <?php endwhile; ?>
        <?php endif; ?>
    </div><!-- END .section-grey -->
    <?php else : ?>
		<?php
        if(have_posts()) :
            while(have_posts()) :
            the_post();
        ?>
        <?php if(has_post_thumbnail()) : ?>
                 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fixbanner' ); ?>
                <div class="headingblog" style="background-image:url('<?php echo $image[0]; ?>')">
        <?php else : ?>
                <div class="headingblog" style="background-image:url(<?php bloginfo('template_directory'); ?>/content/bg_section_blog.jpg)">
        <?php endif; ?>
                    <div class="wrapper">
                        <div class="titleSingle">  
                    		<h2><?php the_title(); ?></h2>
                        </div>
                    </div><!-- END .wrapper -->
                </div><!-- END .headingblog -->
                <div class="wrapper">
                    <div class="theContent w700">
                        <div class="blog-single">
                             <p><?php acit_posted_on();?></p>
                            <?php the_content(); ?>
                        </div>
                    </div><!-- END .theContent -->
                </div><!-- END .wrapper -->
         <?php endwhile; ?>
                <div class="wrapper">
                    <div class="theContent w700">
                		<?php comments_template( '', true ); ?>	
                    </div><!-- END .theContent -->
                </div><!-- END .wrapper -->
        <?php endif; ?>
    <?php  endif; ?> 
</div><!-- END #universal -->
<?php if($post_type == 'clients') :?>
<div id="goldPage">
	<?php get_footer(); ?>
<?php else : ?>
	<?php get_footer(); ?>
<?php  endif; ?> 