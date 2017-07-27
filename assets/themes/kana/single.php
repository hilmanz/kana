<?php
	global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	get_header(); 
?>
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
                            <div class="navigation"><p class="prevPost"><?php previous_post(); ?></p>    <p class="nextPost"><?php next_post(); ?></p></div>
                        </div>
                    </div><!-- END .theContent -->
                </div><!-- END .wrapper -->
           </div>
         <?php endwhile; ?>
    	<?php endif; ?>
    <?php elseif($post_type == 'game') : ?>
        <?php
        if(have_posts()) :
            while(have_posts()) :
            the_post();
        ?>
		<?php 
              $game_swf = get_post_meta( $post->ID, '_cmb_game_swf', true );
			  $game_summary = get_post_meta( $post->ID, '_cmb_game_summary', true );
              $type_file = get_post_meta( $post->ID, '_cmb_type_file', true );
              $game_video = get_post_meta( $post->ID, '_cmb_game_video', true );
              $game_swf = get_post_meta( $post->ID, '_cmb_game_swf', true );
              $swf_width = get_post_meta( $post->ID, '_cmb_swf_width', true );
              $swf_height = get_post_meta( $post->ID, '_cmb_swf_height', true );
              $game_images1 = get_post_meta( $post->ID, '_cmb_game_images1', true );
              $game_images2 = get_post_meta( $post->ID, '_cmb_game_images2', true );
              $game_images3 = get_post_meta( $post->ID, '_cmb_game_images3', true );
              $game_images4 = get_post_meta( $post->ID, '_cmb_game_images4', true );
              $game_images5 = get_post_meta( $post->ID, '_cmb_game_images5', true );
              $game_iframe  = get_post_meta( $post->ID, '_cmb_game_iframe', true );
			  
         ?>
           <div class="gamePostDetails">   
                <div class="wrapper">
                    <div class="heading" style="padding:50px 0 0 0;">
                        <div class="col2">
                            <div class="titleBox">
                                <h2><?php the_title(); ?>.<br />
    <br />
    </h2>
                            </div><!-- END .titleBox -->
                        </div><!-- END .col2 -->
                        <div class="col2">
                            <div class="titleBox">
                                <div class="entry">
                                    <p><?php // echo $game_summary; ?></p>
                                </div>
                            </div><!-- END .titleBox -->
                        </div><!-- END .col2 -->
                    </div><!-- END .heading -->
                </div><!-- END .wrapper -->
                <div class="wrapper">
                    <div class="col1">
                        <div class="navgame">
                            <?php 
                            $customPostTaxonomies = get_object_taxonomies('game');
        
                            if(count($customPostTaxonomies) > 0)
                            {
                                 foreach($customPostTaxonomies as $tax)
                                 {
                                     $args = array(
                                          'orderby' => 'id',
                                          'show_count' => 0,
                                          'pad_counts' => 0,
                                          'hierarchical' => 1,
                                          'taxonomy' => $tax,
                                          'title_li' => ''
                                        );
                            
                                     wp_list_categories( $args );
                                 }
                            }
                            ?>
                        </div>
                    </div>
                            <h2 class="gameTitle">&nbsp;</h2>
                </div><!-- END .wrapper -->
                <div class="wrapper">
                    <div class="theContents">
                                 <p class="prevPost"><a href="<?php echo home_url( '/' ); ?>fun-stuff/">Back</a></p>
                        <div class="blog-single" style="padding:0 0 40px 0;">
							<?php
                                $post_id = get_the_ID();
                                if ($post_id != "512") { ?>
									<?php if($type_file == 'swf') :?>
                                        <div style="margin:0 auto 40px auto; width:<?php echo $swf_width; ?>px; height:<?php echo $swf_height; ?>px;">
                                      <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo $swf_width; ?>" height="<?php echo $swf_height; ?>">
                                        <param name="movie" value="<?php echo $game_swf; ?>">
                                        <param name="quality" value="high">
                                        <param name="wmode" value="opaque">
                                        <param name="swfversion" value="6.0.65.0">
                                        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                                        <param name="expressinstall" value="<?php bloginfo('template_directory'); ?>/Scripts/expressInstall.swf">
                                        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                                        <!--[if !IE]>-->
                                        <object type="application/x-shockwave-flash" data="<?php echo $game_swf; ?>" width="<?php echo $swf_width; ?>" height="<?php echo $swf_height; ?>">
                                          <!--<![endif]-->
                                          <param name="quality" value="high">
                                          <param name="wmode" value="opaque">
                                          <param name="swfversion" value="6.0.65.0">
                                          <param name="expressinstall" value="<?php bloginfo('template_directory'); ?>/Scripts/Scripts/expressInstall.swf">
                                          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                                          <div>
                                            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                                            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                                          </div>
                                          <!--[if !IE]>-->
                                        </object>
                                        <!--<![endif]-->
                                      </object>
                                        <script type="text/javascript">
                                            <!--
                                            swfobject.registerObject("FlashID");
                                            //-->
                                        </script>
                                     </div>
                                <?php elseif($type_file == 'video') : ?>
                                    <div style="margin:0 auto 40px auto; width:640px;">
                                    <video id="example_video_1" class="video-js vjs-default-skin"
                                      controls preload="auto" width="640px" height="480"
                                      data-setup='{"example_option":true}'>
                                     <source src="<?php echo $game_video; ?>" type='video/mp4' />
                                     <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                    </video>
                                     </div>
                                <?php elseif($type_file == 'images') : ?>
									<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.flexslider.js"></script>
									<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/flexslider.css" type="text/css"  media="all" />
                                    <script>
										$(window).load(function() {
										  $('.flexslider').flexslider({
											animation: "slide"
										  });
										});
									</script>
                                    <div id="gameSlider">
                                    	<div class="flexslider">
                                              <ul class="slides">
												<?php  if(!empty($game_images1)) :  ?>
                                                <li>
                                                  <img src="<?php echo $game_images1; ?>" />
                                                </li>
                                                <?php endif;  ?>
												<?php  if(!empty($game_images2)) :  ?>
                                                <li>
                                                  <img src="<?php echo $game_images2; ?>" />
                                                </li>
                                                <?php endif;  ?>
												<?php  if(!empty($game_images3)) :  ?>
                                                <li>
                                                  <img src="<?php echo $game_images3; ?>" />
                                                </li>
                                                <?php endif;  ?>
												<?php  if(!empty($game_images4)) :  ?>
                                                <li>
                                                  <img src="<?php echo $game_images4; ?>" />
                                                </li>
                                                <?php endif;  ?>
												<?php  if(!empty($game_images5)) :  ?>
                                                <li>
                                                  <img src="<?php echo $game_images5; ?>" />
                                                </li>
                                                <?php endif;  ?>
                                              </ul>
                                         </div>
                                     </div>
                                <?php elseif($type_file == 'iframe') : ?>
                              	<iframe src=" <?php echo $game_iframe; ?>" width="1024" height="768" frameborder="0"></iframe>
                                <?php endif; ?>
                              <?php  }else{ ?>
                              	<iframe src="http://preview.kanadigital.com/kanagame/game/cupid/" width="1100" height="900" frameborder="0"></iframe>
							 <?php }?>
                          
                            <div class="navigation"> <p class="prevPost"><?php previous_post(); ?></p>    <p class="nextPost"><?php next_post(); ?></p></div>
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
                			<h2 class="fl"><?php printf( __( '%s' ), '<span>' . single_cat_title( '', false ) . '</span>' );?></h2>
                            <?php
							$subcategories = get_categories('&child_of=1&hide_empty'); // List subcategories of category '4' (even the ones with no posts in them)
							echo '<ul  class="subcat">';
							foreach ($subcategories as $subcategory) {
							  echo sprintf('<li><a href="%s">%s <span class="dash">&mdash;</span> </a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
							}
							echo '</ul>';
							?>
                        </div>
                    </div><!-- END .wrapper -->
                </div><!-- END .headingblog -->
                <div class="wrapper">
                	<div class="container-single">
                        <div class="col-content">
                            <div class="titleSingles">  
                                <h2><?php the_title(); ?></h2>
                            </div>
                            <div class="blog-single">
                                 <p><?php acit_posted_on();?></p>
                                <?php the_content(); ?>
                                 <div class="navigation"><p class="prevPost"><?php previous_post(); ?></p>    <p class="nextPost"><?php next_post(); ?></p></div>
                            </div>
                            <div class="theContent">
                                <?php comments_template( '', true ); ?>	
                            </div><!-- END .theContent -->
                        </div><!-- END .col-content -->
                        <div class="col-sidebar">
                            <div class="RecenPost">
                             <?php
								//for use in the loop, list 5 post titles related to first tag on current post
								$tags = wp_get_post_tags($post->ID);
								if ($tags) {
								echo '<h3>Related Articles</h3>';
								$first_tag = $tags[0]->term_id;
								$args=array(
								'tag__in' => array($first_tag),
								'post__not_in' => array($post->ID),
								'posts_per_page'=>5,
								'caller_get_posts'=>1
								);
								$my_query = new WP_Query($args);
								if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                	<div class="row-post">
										<span class="catname"><?php the_category('&nbsp;'); ?></span>
                                        <div class="smallThumbPost">
                                            <?php if(has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'bigthumb' ); ?></a>
                                            <?php else : ?>
                                            <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/content/default-thumb.jpg" alt="" class="bigthumb" /></a>
                                            <?php endif; ?>
                                  
                                        </div><!-- END .smallThumbPost -->
                                        <div class="blog-entry">
                                            <div class="blog-title">
                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                					<span class="date"><?php acit_posted_on(); ?></span>
                                            </div><!-- END .blog-title -->
                                        </div><!-- END .blog-entry -->
                                    </div>
								<?php
								endwhile;
								}
								wp_reset_query();
								}
								?>
                            </div>
                            <div id="sidebar" class="<?php echo $showWidgetm; ?>">
                                  <?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?><?php endif; ?>
                            </div><!-- END #SIDEBAR -->
                        </div><!-- END .col-sidebar -->
                   </div>
                </div><!-- END .wrapper -->
         <?php endwhile; ?>
        <?php endif; ?>
    <?php  endif; ?> 
</div><!-- END #universal -->
<?php if($post_type == 'clients') :?>
<div id="goldPage">
	<?php get_footer(); ?>
<?php else : ?>
	<?php get_footer(); ?>
<?php  endif; ?> 