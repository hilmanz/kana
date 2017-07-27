<?php
	
	get_header(); 
	$term = get_queried_object();
?>
<div id="universal">
            <div class="wrapper">
                <div class="heading" style="padding:50px 0 0 0;">
                    <div class="col2">
                        <div class="titleBox">
                            <h2>Game,<br /><?php echo $term->name; ?> Portfolio.<br />
<br />
</h2>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                    <div class="col2">
                        <div class="titleBox">
                            <div class="entry">
                                <p></p>
                            </div>
                        </div><!-- END .titleBox -->
                    </div><!-- END .col2 -->
                </div><!-- END .heading -->
            </div><!-- END .wrapper -->
            <div id="section-clients">
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
                	<div class="grid">
                    <?php 
					    $catname = $term->name;
						$args = array(
							'post_type' => 'game',
							'game_cat' => $term->slug
						);
						$query = new WP_Query( $args );
					?>
                    <?php 
					if ($query->have_posts()) {
						// Start the Loop
						while ( $query->have_posts() ) : $query->the_post(); ?>
 
						<?php $game_summary = get_post_meta( $post->ID, '_cmb_game_summary', true );
                              $game_url = get_post_meta( $post->ID, '_cmb_game_url', true );
                              $game_thumbnail = get_post_meta( $post->ID, '_cmb_game_thumbnail', true );
             				 $type_file = get_post_meta( $post->ID, '_cmb_type_file', true );
                         ?>
                        <div class="smallThumb2">
                            <a class="effectGame" href="<?php the_permalink(); ?>">
                            	<img src="<?php echo $game_thumbnail; ?>" alt="<?php the_title(); ?>" />
                                <div class="gameCaption">
                               		<h3 class="gameTitle"><?php the_title(); ?></h3>
                                </div>		
								<?php if($type_file == 'video') :?>
                                	<div class="vjs-big-play-button">&nbsp;</div>
                                <?php endif; ?>	
                           </a>
                        </div><!-- END .smallThumb2 -->
         
								<?php endwhile;
                                 
                        } // end of check for query having posts
                             
                        // use reset postdata to restore orginal query
                        wp_reset_postdata();
						 
						?>
                    </div><!-- END .grid -->
                </div><!-- END .wrapper -->
    		</div><!-- END #section-peoples -->
</div><!-- END #universal -->


<?php get_footer(); ?>