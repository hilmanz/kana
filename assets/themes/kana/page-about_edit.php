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
                                <p>Kana is a digital agency in Indonesia that delivers digital marketing &amp; strategy, creative development, digital platform development, digital community management with measurable and transparent results. In our books, when you blend creativity and technology, you're bound to come up with something innovative.</p>
                                <p>We make sure every campaign is a success story. There is no offline or online - everything should be inline, that's why most of our work and platforms are focused on delivering our clients the best of both worlds</p>

                                <p><strong>"Good campaigns generate interaction, great campaigns generate conversion."</strong></p>
                                    <div class=" smallBtn">
                                        <a href="<?php echo home_url( '/' ); ?>services/" class="buttonarrow">
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
                                    <img src="<?php bloginfo('template_directory'); ?>/content/amien.jpg"/>		
                               </figure>
                           </div><!-- END .thumbBig -->
                           <div class="entry-people">
                           		<h4>"When you constantly blend art and technology, you're always going to come up with something innovative." </h4>
                                <h5 class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Amien Krisna</strong>,<br />
									Managing Director</h5>
                           </div><!-- END .entry-people -->
                        </div><!-- END .col2 -->
                        <div class="col2">
                        	<div class="thumbBig">
                                <figure class="effect-chico">
                                    <img src="<?php bloginfo('template_directory'); ?>/content/sandy.jpg"/>		
                               </figure>
                           </div><!-- END .thumbBig -->
                           <div class="entry-people">
                           		<h4>"Growing old comes with an alternative and it's called being creative. When you breathe ideas into your lung, you stay young." </h4>
                                <h5 class="hpeople"><span class="sline">&nbsp;</span>
                                    <strong>Sandy Reo Sangkala</strong>,<br />
									Creative Director</h5>
                           </div><!-- END .entry-people -->
                        </div><!-- END .col2 -->
                    </div><!-- END .grid -->
                </div><!-- END .wrapper -->
    		</div><!-- END #section-headpeople -->
			<?php the_content(); ?>
            	<div id="section-peoples">                
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