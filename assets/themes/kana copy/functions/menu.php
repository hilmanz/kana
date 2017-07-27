<?php
  function eurekaHeaderMenu()
  {
      $args = array(
          'menu_class'  => 'top-menu',
          'show_home'   => true
      );

             wp_page_menu($args);
             ?>
      <script type="text/javascript" >
          jQuery('.top-menu > ul').addClass('menu');
      </script>
      <?php
  }
     function eurekaFooterMenu()
  {
      ?>
      <ul class="menu">
          <li><a href="<?php bloginfo('url'); ?>" title="Homepage">Home</a></li>
      </ul>
      <?php
  }
?>