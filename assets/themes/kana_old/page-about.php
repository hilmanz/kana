<?php
/**
 * Template Name: About
 *
 */
get_header(); ?>
<div id="greenPage">
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
                            <h2>Over 10 years <br />of experience<br />in digital.</h2>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                    <div class="col2">
                        <div class="titleBox">
                            <div class="entry">
                                <p>Kana is a Jakarta based full service digital innovation agency focused on advancing our clients through cutting edge technologies and out of the box strategies. </p>

<p>We make sure every campaign is a success story, measurable through clear metrics and tangible results. We believe there is no offline or online - everything should be inline, that's why most of our work and platforms are focused on delivering our clients the best of both worlds</p>

<p><strong>"Good campaigns generate interaction, great campaigns generate conversion."</strong></p>
                                    <div class=" smallBtn">
                                        <a href="<?php echo home_url( '/' ); ?>products/" class="buttonarrow">
                                            <div class="btnmask btngreen" data-hover="Find Out What We Do"><span>Find Out What We Do</span></div>
                                            <div class="arrowws btngreen">&nbsp;</div>
                                        </a>
                                    </div><!-- END .smallBtn -->
                            </div>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                </div><!-- END .heading -->
            </div><!-- END .wrapper -->
            <div id="section-people">
                <div class="wrapper">
                	<div class="thepeople">
                    <h3><span class="green">Key People &mdash; </span>"Spearheaded by seasoned industry professionals, Kana strategies are data-driven, innovative and take full advantage of the latest technologies available with a single aim - advancing each and every single one of our clients to the forefront in digital."</h3>
                    </div>
                </div><!-- END .wrapper -->
    		</div><!-- END #section-people -->
            <div id="section-headpeople">
                <div class="wrapper">
                	<div class="grid">
                        <div class="col2">
                        	<div class="thumbBig">
                                <figure class="effect-chico">
                                    <img src="<?php bloginfo('template_directory'); ?>/content/vera.jpg"/>		
                               </figure>
                           </div><!-- END .thumbBig -->
                           <div class="entry-people">
                           		<h4>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." </h4>
                                <h5 class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Vera Shiska</strong>,<br />
                                    Managing Director</h5>
                           </div><!-- END .entry-people -->
                        </div><!-- END .col2 -->
                        <div class="col2">
                        	<div class="thumbBig">
                                <figure class="effect-chico">
                                    <img src="<?php bloginfo('template_directory'); ?>/content/amien.jpg"/>		
                               </figure>
                           </div><!-- END .thumbBig -->
                           <div class="entry-people">
                           		<h4>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." </h4>
                                <h5 class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Amien Krisna</strong>,<br />
									Technical Director</h5>
                           </div><!-- END .entry-people -->
                        </div><!-- END .col2 -->
                        <div class="col2">
                        	<div class="thumbBig">
                                <figure class="effect-chico">
                                    <img src="<?php bloginfo('template_directory'); ?>/content/sandy.jpg"/>		
                               </figure>
                           </div><!-- END .thumbBig -->
                           <div class="entry-people">
                           		<h4>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." </h4>
                                <h5 class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Sandy Reo Sangkala</strong>,<br />
									Creative Director</h5>
                           </div><!-- END .entry-people -->
                        </div><!-- END .col2 -->
                        <div class="col2">
                        	<div class="thumbBig">
                                <figure class="effect-chico">
                                    <img src="<?php bloginfo('template_directory'); ?>/content/angga.jpg"/>		
                               </figure>
                           </div><!-- END .thumbBig -->
                           <div class="entry-people">
                           		<h4>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." </h4>
                                <h5 class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Angga Bangun Subur</strong>,<br />
									Strategy Director</h5>
                           </div><!-- END .entry-people -->
                        </div><!-- END .col2 -->
                    </div><!-- END .grid -->
                </div><!-- END .wrapper -->
    		</div><!-- END #section-headpeople -->
			<?php the_content(); ?>
            <div id="section-peoples">
                <div class="wrapper">
                	<div class="grid">
                    <?php $queryObject = new WP_Query( 'post_type=team' );
                    // The Loop!
                    if ($queryObject->have_posts()) { ?>
                        <?php while ($queryObject->have_posts()) { $queryObject->the_post(); ?>
                            <?php $team_position = get_post_meta( $post->ID, '_cmb_team_position', true );
                                  $team_photo = get_post_meta( $post->ID, '_cmb_team_photo', true );
                             ?>  
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php echo $team_photo; ?>"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong><?php the_title(); ?></strong><br />
									<?php echo $team_position; ?></p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <?php } ?>
                    <?php } else { ?>   
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b1.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b2.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b3.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b4.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b5.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b6.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b7.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b8.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b1.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b2.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b3.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b4.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b5.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b6.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b7.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                        <div class="smallThumb">
                            <figure class="effect-bubba">
                                <img src="<?php bloginfo('template_directory'); ?>/content/b8.jpg"/>	
                                <figcaption>
                                <p class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Yuliana Andi</strong><br />
									Account Director</p>
                                </figcaption>			
                           </figure>
                        </div><!-- END .smallThumb -->
                    <?php } ?>
                    </div><!-- END .grid -->
                </div><!-- END .wrapper -->
                    <div class="joinTeam">
                        <div class="smallBtn btnjoin">
                            <a href="<?php echo home_url( '/' ); ?>careers/" class="buttonarrow">
                                <div class="btnmask btnwhite" data-hover="Join the team"><span>Join the team</span></div>
                                <div class="arrowws btnwhite">&nbsp;</div>
                            </a>
                        </div><!-- END .smallBtn -->
                    </div><!-- END .smallBtn -->
    		</div><!-- END #section-peoples -->
			<?php the_content(); ?>
         <?php endwhile; ?>
        <?php endif; ?>
</div><!-- END #universal -->
<?php get_footer(); ?>