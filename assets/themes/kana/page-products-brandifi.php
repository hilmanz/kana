	<?php
    /**
     * Template Name: Products Brandifi
     *
     */
    get_header(); ?>
<div id="producPage">
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
                            <h2>The tools <br />
                            you need<br />
                            the most.</h2>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                    <div class="col2">
                        <div class="titleBox">
                            <div class="entry">
                                <p>We've always believed that anything good should be shared, that's how our internal tools become full-blown platforms. </p>
                                <p> Our tools are now available as products to help agencies and brands measure and generate high quality interactions from their social media campaigns.</p>
                            </div>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                </div><!-- END .heading -->
                <div class="theContent w700">
                    <div class="centerbox">
                        <h3 class="blue">SEE OUR TOOLS</h3>
                        <a href="#" class="buttonarrow">
                            <div class="btnmask btnblue" data-hover="SONAR"><span>SONAR</span></div>
                        </a>
                        <a href="#" class="buttonarrow">
                            <div class="btnmask btnblue" data-hover="BRANDIFI"><span>BRANDIFI</span></div>
                        </a>
                        <a href="#" class="buttonarrow">
                            <div class="btnmask btnblue" data-hover="TOUCHBASE"><span>TOUCHBASE</span></div>
                        </a>
                    </div><!-- END .centerbox -->
                </div><!-- END .theContent -->
                <?php the_content(); ?>
             <?php endwhile; ?>
            <?php endif; ?>
        </div><!-- END .wrapper -->
    </div><!-- END #universal -->
    <?php get_footer(); ?>
</div><!-- END #producPage -->