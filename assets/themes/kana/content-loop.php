<?php  global $wp_query;
if(have_posts()) :
while(have_posts()) :
the_post();
?>  
<div class="blog-content <?php echo $odd_or_even; $odd_or_even = ('odd'==$odd_or_even) ? 'even' : 'odd'; ?> boxPost">
    <?php if(has_post_thumbnail()) : ?>
        <div class="banner-thumb">
           <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'banner-thumb' ); ?></a>
            <div class="blog-meta">
                <div class="entry-meta">
                    <?php acit_posted_on(); ?>
                      <span class="tag-post">
                        <span class='icons icon-tag'>&nbsp;</span>
                      <?php
						$posttags = get_the_tags();
						if ($posttags) {
						foreach($posttags as $tag) {
						echo $tag->name . ' ';
						}
						}
						?>
                      </span>
                      <span class="total-comments">
                                    <?php
                                        $commcount = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
                                        if (0 < $commcount) $commcount = number_format($commcount);
                                        echo "<span class='icons icon-bubbles'>&nbsp;</span>".$commcount." comments";
                                        ?>
                      </span>
                </div><!-- END .entry-meta -->
            </div><!-- END .blog-meta -->

        </div><!-- END .thumb-img1 -->
    <?php else : ?>
        <div class="banner-thumb">
            <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/content/bg_section_blog.jpg" alt="" class="banner-thumb" /></a>
            <div class="blog-meta">
                <div class="entry-meta">
                    <?php acit_posted_on(); ?>
                      <span class="tag-post">
                        <span class='icons icon-tag'>&nbsp;</span>
                      <?php
						$posttags = get_the_tags();
						if ($posttags) {
						foreach($posttags as $tag) {
						echo $tag->name . ' ' . ',';
						}
						}
						?>
                      </span>
                      <span class="total-comments">
                                    <?php
                                        $commcount = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
                                        if (0 < $commcount) $commcount = number_format($commcount);
                                        echo "<span class='icons icon-bubbles'>&nbsp;</span>".$commcount." comments";
                                        ?>
                      </span>
                </div><!-- END .entry-meta -->
            </div><!-- END .blog-meta -->
  
        </div><!-- END .thumb-img1 -->
    <?php endif; ?>
    <div class="blog-title">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div><!-- END .blog-title -->
    <div class="entry-blog2">
        <div class="summary clearfix">
         <?php if ($post->post_excerpt != "" ) { the_excerpt(); }
            else { the_content_rss('', FALSE, '', 40); } ?>
        </div>
         <p><a href="<?php the_permalink(); ?>" class="readmore">Continue Reading &raquo;</a></p>
    </div><!-- END .entry-blog -->
</div><!-- END .blog-content -->
<?php endwhile; ?>
		<?php  acit_pagination(); ?>
<?php else : ?>
<div class="emptypost">
<h3>Post not yet available</h3>
</div>
<?php endif; ?>