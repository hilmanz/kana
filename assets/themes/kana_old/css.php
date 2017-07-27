
<?php $customStyle		= eurekaGetOption('cssStyle_customStyle'); ?> 
<?php  if(empty($customStyle)) : else : ?>
<style type="text/css">
<?php echo $customStyle ?>
</style>   
<?php endif;  ?>  
<?php			
	$bodycolor				= eurekaGetOption('color_bodycolor');
    $topcolor				= eurekaGetOption('color_topcolor');
    $bannercolor			= eurekaGetOption('color_bannercolor');
    $footercolor			= eurekaGetOption('color_footercolor');
    $fontcolor				= eurekaGetOption('color_fontcolor');
    $linkcolor				= eurekaGetOption('color_linkcolor');
    $linkhovercolor			= eurekaGetOption('color_linkhovercolor');
    $footerfontcolor		= eurekaGetOption('color_footerfontcolor');
    $footerlinkcolor		= eurekaGetOption('color_footerlinkcolor');
    $footerlinkhovercolor	= eurekaGetOption('color_footerlinkhovercolor');
    $menufontsize	= eurekaGetOption('header_menufontsize');
?> 
   
<style>
   body{
	    <?php  if(empty($bodycolor)) : else : ?> 
			background:<?php echo "#$bodycolor" ?> !important; 
		<?php endif;  ?> 
	    <?php  if(empty($fontcolor)) : else : ?>  
			color:<?php echo "#$fontcolor" ?> !important; 
		<?php endif;  ?> 
    }
	#top{
	    <?php  if(empty($topcolor)) : else : ?> 
			background:<?php echo "#$topcolor" ?> !important; 
		<?php endif;  ?> 
	}
	#main-menu a{
	    <?php  if(empty($menufontsize)) : else : ?> 
			font-size:<?php echo "$menufontsize" ?>px !important; 
		<?php endif;  ?>
	}
	#main-menu a:hover{
	    <?php  if(empty($generalcolor)) : else : ?>  
			color:<?php echo "#$linkhovercolor" ?> !important; 
		<?php endif;  ?> 
	}
	a{
	    <?php  if(empty($linkcolor)) : else : ?> 
			color:<?php echo "#$linkcolor" ?> !important; 
		<?php endif;  ?> 
	}
	#section-header{
	    <?php  if(empty($bannercolor)) : else : ?> 
			background:<?php echo "#$bannercolor" ?> !important; 
		<?php endif;  ?> 
	}
	#footer-bottom{
	    <?php  if(empty($footercolor)) : else : ?> 
			background:<?php echo "#$footercolor" ?> !important; 
		<?php endif;  ?> 
	    <?php  if(empty($footerfontcolor)) : else : ?> 
			color:<?php echo "#$footerfontcolor" ?> !important; 
		<?php endif;  ?> 
	}
	#footer-bottom a{
	    <?php  if(empty($footerlinkcolor)) : else : ?> 
			color:<?php echo "#$footerlinkcolor" ?> !important; 
		<?php endif;  ?> 
	}
	#footer-bottom a:hover{
	    <?php  if(empty($footerlinkhovercolor)) : else : ?> 
			color:<?php echo "#$footerlinkhovercolor" ?> !important; 
		<?php endif;  ?> 
	}
</style>