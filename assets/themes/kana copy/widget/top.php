<div id="main-menu-wrapper" class="clearfix">
    <div id="site-title">
     <a href="<?php echo home_url( '/' ); ?>">
     </a>
    </div><!-- END #site-title -->
    <div id="theNavigation">
        <?php if ( has_nav_menu( 'main-menu' ) ) { ?>
            <div id="nav">
        <?php    $args	= array(
                'theme_location'	=> 'main-menu',
                'container'			=> false,
                'menu_class'		=> 'sf-menu',
                'fallback_cb'		=> 'eurekaMainMenu',
                'menu_id' => 'main-menu',  
            );
            wp_nav_menu($args);
        ?>

            </div>
        <?php }else { ?>
            <div id="nav">
                    <ul class="sf-menu" id="main-menu">
                      <li><a href="<?php echo home_url( '/' ); ?>">Home</a></li>
                      <li><a href="<?php echo home_url( '/' ); ?>">Services</a>
                            <ul>
                                <li><a href="#">Web Design</a></li>
                                <li><a href="#">Internet Marketing</a></li>
                            </ul>
                      </li>
                      <li><a href="<?php echo home_url( '/' ); ?>">About Us</a></li>
                      <li><a href="<?php echo home_url( '/' ); ?>">Blog</a></li>
                      <li><a href="<?php echo home_url( '/' ); ?>">Contact us</a></li>
                    </ul>  
            </div>
        <?php } ?> 
    </div><!-- END #theNavigation -->
</div><!-- END .main-menu-wrapper -->