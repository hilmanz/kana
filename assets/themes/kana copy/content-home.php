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
                    <h1>We'll get you going. <br />Digitally.</h1>
                    <a href="<?php echo home_url( '/' ); ?>services/" class="buttonarrow">
                        <div class="btnmask" data-hover="SEE HOW"><span>SEE HOW</span></div>
                        <div class="arrowws">&nbsp;</div>
                    </a>
                    <div style="display:none">
                    <p>Kana is a Jakarta based full <strong>service digital innovation agency</strong> focused on advancing our clients through cutting edge <strong>technologies</strong> and out of the box strategies.</p>

<p>We make sure every campaign is a success story, measurable through clear metrics and tangible results. We believe there is no offline or online - everything should be inline, that's why most of our work and platforms are focused on delivering our clients the best of both worlds</p>

<p><strong>"Good campaigns generate interaction, great campaigns generate conversion."</strong></p>
					</div>
                </div><!-- END .box-content -->
            </div><!-- END .wrapper -->
		</div><!-- END .slide -->
	</div>
</div>