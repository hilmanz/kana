<?php
	global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	get_header(); 
?>
<div id="universal" class="pageGame">
            <div class="wrapper">
                <div class="heading">
                    <div class="col2">
                        <div class="titleBox">
                            <h2>Kana,<br />Game Portfolio.<br />
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
                                      'orderby' => 'name',
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
                	<div class="grid">
                    <?php $queryObject = new WP_Query( 'post_type=game&showposts=1000' );
                    // The Loop!
                    if ($queryObject->have_posts()) { ?>
                        <?php while ($queryObject->have_posts()) { $queryObject->the_post(); ?>
                            <?php $game_summary = get_post_meta( $post->ID, '_cmb_game_summary', true );
                                  $game_url = get_post_meta( $post->ID, '_cmb_game_url', true );
                                  $game_thumbnail = get_post_meta( $post->ID, '_cmb_game_thumbnail', true );
                             ?>
                        <div class="smallThumb2">
                            <a class="effectGame" href="<?php the_permalink(); ?>">
                            	<img src="<?php echo $game_thumbnail; ?>" alt="<?php the_title(); ?>" />
                                <div class="gameCaption">
                               		<h3 class="gameTitle"><?php the_title(); ?></h3>
                                </div>			
                           </a>
                        </div><!-- END .smallThumb2 -->
                        <?php } ?>
                    <?php } else { ?>   
                    <?php } ?>
                    </div><!-- END .grid -->
                    </div>
                </div><!-- END .wrapper -->
    		</div><!-- END #section-peoples -->
</div><!-- END #universal -->
<?php get_footer(); ?>