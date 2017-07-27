<?php
/**
 * Template Name: Clients
 *
 */
get_header(); ?>
<div id="goldPage">
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
                            <h2>Numbers<br />never lie.<br />
<br />
</h2>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                    <div class="col2">
                        <div class="titleBox">
                            <div class="entry">
                                <p>We believe trust comes from measurable results. Here's some examples on how brands have successfully made it.</p>
                            </div>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                </div><!-- END .heading -->
            </div><!-- END .wrapper -->
            <div id="section-client">
                <div class="wrapper">
                	<div class="grid">
                    <?php $queryObject = new WP_Query( 'post_type=clients&showposts=3' );
                    // The Loop!
                    if ($queryObject->have_posts()) { ?>
                        <?php while ($queryObject->have_posts()) { $queryObject->the_post(); ?>
                            <?php $clients_summary = get_post_meta( $post->ID, '_cmb_clients_summary', true );
                                  $clients_logo = get_post_meta( $post->ID, '_cmb_clients_logo', true );
                                  $clients_thumbnail = get_post_meta( $post->ID, '_cmb_clients_thumbnail', true );
                             ?>
                        <div class="col3">
                        	<div class="thumbBig2">
                                <figure class="effect-bubba">
                                    <img src="<?php echo $clients_thumbnail; ?>"/>	
                                    <figcaption>
                                        <p><?php echo $clients_summary; ?><br />
                                        <span class="arrowwide2">&nbsp;</span>
                                        </p>
                                        <a href="<?php the_permalink(); ?>"></a>
                                    </figcaption>		
                               </figure>
                           </div><!-- END .thumbBig2 -->
                        </div><!-- END .col3 -->
                        <?php } ?>
                    <?php } else { ?>   
                        <div class="col3">
                        	<div class="thumbBig2">
                                <figure class="effect-bubba">
                                    <img src="<?php bloginfo('template_directory'); ?>/content/c1.jpg"/>	
                                    <figcaption>
                                        <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."<br />
                                        <span class="arrowwide2">&nbsp;</span>
                                        </p>
                                        <a href="#"></a>
                                    </figcaption>		
                               </figure>
                           </div><!-- END .thumbBig2 -->
                        </div><!-- END .col3 -->
                        <div class="col3">
                        	<div class="thumbBig2">
                                <figure class="effect-bubba">
                                    <img src="<?php bloginfo('template_directory'); ?>/content/c2.jpg"/>	
                                    <figcaption>
                                        <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."<br />
                                        <span class="arrowwide2">&nbsp;</span>
                                        </p>
                                        <a href="#"></a>
                                    </figcaption>		
                               </figure>
                           </div><!-- END .thumbBig2 -->
                        </div><!-- END .col3 -->
                        <div class="col3">
                        	<div class="thumbBig2">
                                <figure class="effect-bubba">
                                    <img src="<?php bloginfo('template_directory'); ?>/content/c1.jpg"/>
                                    <figcaption>
                                        <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."<br />
                                        <span class="arrowwide2">&nbsp;</span>
                                        </p>
                                        <a href="#"></a>
                                    </figcaption>			
                               </figure>
                           </div><!-- END .thumbBig2 -->
                        </div><!-- END .col3 -->
                    <?php } ?>
                    </div><!-- END .grid -->
                </div><!-- END .wrapper -->
    		</div><!-- END #section-client -->
            <div id="section-clients">
                <div class="wrapper">
                	<div class="grid">
                    <?php $queryObject = new WP_Query( 'post_type=clientslogo&showposts=1000' );
                    // The Loop!
                    if ($queryObject->have_posts()) { ?>
                        <?php while ($queryObject->have_posts()) { $queryObject->the_post(); ?>
                            <?php $clientslogo_desc = get_post_meta( $post->ID, '_cmb_clientslogo_desc', true );
                                  $clientslogo_logo = get_post_meta( $post->ID, '_cmb_clientslogo_logo', true );
                                  $clientslogo_thumbnail = get_post_meta( $post->ID, '_cmb_clientslogo_thumbnail', true );
                             ?>
                        <div class="smallThumb2">
                            <figure class="effect-bubba">
                            	<img src="<?php echo $clientslogo_thumbnail; ?>" alt="<?php the_title(); ?>" />
                                <figcaption>
                               		 <p class="hpeople">
                                    <img src="<?php echo $clientslogo_logo; ?>" alt="<?php the_title(); ?>" class="logoclient" /> <span class="desc"><?php echo $clientslogo_desc; ?></span></p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb2 -->
                        <?php } ?>
                    <?php } else { ?>   
                        <div class="smallThumb2">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/c3.jpg"/>	
                                <figcaption>
                               		 <p class="hpeople">
                                    <strong>Soursally</strong><br />
                                    <span class="arrowwide2">&nbsp;</span></p>
                                    <a href="#"></a>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb2 -->
                        <div class="smallThumb2">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/c4.jpg"/>	
                                <figcaption>
                               		 <p class="hpeople">
                                    <strong>Soursally</strong><br />
                                    <span class="arrowwide2">&nbsp;</span></p>
                                    <a href="#"></a>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb2 -->
                        <div class="smallThumb2">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/c5.jpg"/>	
                                <figcaption>
                                <p class="hpeople">
                               		 <p class="hpeople">
                                    <strong>Soursally</strong><br />
                                    <span class="arrowwide2">&nbsp;</span></p>
                                    <a href="#"></a>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb2 -->
                    <?php } ?>
                    </div><!-- END .grid -->
                </div><!-- END .wrapper -->
    		</div><!-- END #section-peoples -->
			<?php the_content(); ?>
         <?php endwhile; ?>
        <?php endif; ?>
</div><!-- END #universal -->
<?php get_footer(); ?>