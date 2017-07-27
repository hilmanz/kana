
<?php $showWidgetm		= eurekaGetOption('mobile_showWidgetm'); ?>
<div id="sidebar" class="<?php echo $showWidgetm; ?>">
      <?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?><?php endif; ?>
</div><!-- END #SIDEBAR -->
