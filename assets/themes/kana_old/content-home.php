<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.fullPage.css" type="text/css"  media="all" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.fullPage.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
	   if ($(window).width() < 640){
			$('#fullpage').fullpage({
				anchors: ['landing'],
					autoScrolling: false,
			});
		}else{
			$('#fullpage').fullpage({
				anchors: ['landing'],
			});
		}
    });
</script>
<div id="fullpage">
	<div class="section" id="section0">
	    <div class="slide" id="landing1">
        	<div class="wrapper">
                <a href="landing2" class="toSlide goSlide goSlideNext" data-index="2">&nbsp;</a>
                <div class="box-content">
                    <h2>We'll get you going. <br />Digitally.</h2>
                    <a href="<?php echo home_url( '/' ); ?>about/" class="buttonarrow">
                        <div class="btnmask" data-hover="SEE HOW"><span>SEE HOW</span></div>
                        <div class="arrowws">&nbsp;</div>
                    </a>
                </div><!-- END .box-content -->
            </div><!-- END .wrapper -->
		</div><!-- END .slide -->
	    <div class="slide" id="landing2">
        	<div class="wrapper">
                <a href="landing1" class="toSlide goSlide goSlidePrev" data-index="1">&nbsp;</a>
                <a href="landing3" class="toSlide goSlide goSlideNext"  data-index="3">&nbsp;</a>
                <div class="box-content">
                    <h2>Turning digital strategies<br />into results.</h2>
                    <a href="<?php echo home_url( '/' ); ?>services/" class="buttonarrow">
                        <div class="btnmask" data-hover="SEE HOW"><span>SEE HOW</span></div>
                        <div class="arrowws">&nbsp;</div>
                    </a>
                </div><!-- END .box-content -->
            </div><!-- END .wrapper -->
		</div><!-- END .slide -->
	    <div class="slide" id="landing3">
        	<div class="wrapper">
                <a href="landing2" class="toSlide goSlide goSlidePrev" data-index="2">&nbsp;</a>
                <div class="box-content">
                    <h2>We develop technologies<br />that drive success stories.</h2>
                    <a href="<?php echo home_url( '/' ); ?>clients/" class="buttonarrow">
                        <div class="btnmask" data-hover="SEE HOW"><span>SEE HOW</span></div>
                        <div class="arrowws">&nbsp;</div>
                    </a>
                </div><!-- END .box-content -->
            </div><!-- END .wrapper -->
		</div><!-- END .slide -->
	</div>
</div>