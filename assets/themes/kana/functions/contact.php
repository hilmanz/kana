<?php
/*
Plugin Name: Contact Us
Author: Acit Jazz
Version: 1.0
Author URI: http://www.eurekathemes.com
*/

function eu_contact($atts, $content=null){  ?>
		<?php
	
	 $cformtype		= eurekaGetOption('contact_cformtype');
	 $cformtitle	= eurekaGetOption('contact_cformtitle');
	 $cformtitlecolor	= eurekaGetOption('contact_cformtitlecolor');
	 $cformdesc		= eurekaGetOption('contact_cformdesc');
	 $ctitle		= eurekaGetOption('contact_ctitle');
	 $ctext			= eurekaGetOption('contact_ctext');
	 $cshow			= eurekaGetOption('contact_cshow');
	 $cform			= eurekaGetOption('contact_cform');
	 $cformcode		= eurekaGetOption('contact_cformcode');
	 $cfield1		= eurekaGetOption('contact_cfield1');
	 $cfield2		= eurekaGetOption('contact_cfield2');
	 $cfield3		= eurekaGetOption('contact_cfield3');
	 $cfield4		= eurekaGetOption('contact_cfield4');
	 $cfield5		= eurekaGetOption('contact_cfield5');
	 $cname1		= eurekaGetOption('contact_cname1');
	 $cname2		= eurekaGetOption('contact_cname2');
	 $cname3		= eurekaGetOption('contact_cname3');
	 $cname4		= eurekaGetOption('contact_cname4');
	 $cname5		= eurekaGetOption('contact_cname5');
	 $ctype1		= eurekaGetOption('contact_ctype1');
	 $ctype2		= eurekaGetOption('contact_ctype2');
	 $ctype3		= eurekaGetOption('contact_ctype3');
	 $ctype4		= eurekaGetOption('contact_ctype4');
	 $ctype5		= eurekaGetOption('contact_ctype5');
	 $csukses		= eurekaGetOption('contact_csukses');
	 $cerror		= eurekaGetOption('contact_cerror');
	 $showContactm	= eurekaGetOption('mobile_showContactm');
	 $showGmapm		= eurekaGetOption('mobile_showGmapm');
	 $mapshow		= eurekaGetOption('featuredPost_mapshow');
	 $mapframe		= eurekaGetOption('featuredPost_mapframe');
	 $optionboxShow		= eurekaGetOption('featuredPost_optionboxShow');
	 $optionboxType		= eurekaGetOption('featuredPost_optionboxType');
	 $youtubeId		= eurekaGetOption('featuredPost_youtubeId');
	 $youtubeHeight		= eurekaGetOption('featuredPost_youtubeHeight');
	 $videoHeight		= eurekaGetOption('featuredPost_videoHeight');
	 $videomp4		= eurekaGetOption('featuredPost_videomp4');
	 $videowebm		= eurekaGetOption('featuredPost_videowebm');
	 $videoogv		= eurekaGetOption('featuredPost_videoogv');
	 $videocover		= eurekaGetOption('featuredPost_videocover');
	 $bannerimages		= eurekaGetOption('featuredPost_bannerimages');
	 $cbtncolor		= eurekaGetOption('contact_cbtncolor');
	 $cbtnshadow		= eurekaGetOption('contact_cbtnshadow');
?>
<?php  if(empty($cformtitle)) : ?>
	 <?php if(empty($cformtitlecolor)) :?>
			<div class="titleBar">
				<div class="line"></div>
<h2 style="background:#ffce55;"><span style="border-right:20px solid #ffce55;" class="arrowLeft">&nbsp;</span> CONTACT <span style="border-left:20px solid #ffce55;" class="arrowRight">&nbsp;</span></h2>
			</div><!-- END .titleBar -->
	 <?php else : ?>
		<div class="titleBar">
			<div class="line"></div>
			<h2 style="background:#<?php echo $cformtitlecolor ?>;"><span style="border-right:20px solid #<?php echo $cformtitlecolor ?>;" class="arrowLeft">&nbsp;</span> CONTACT <span style="border-left:20px solid #<?php echo $cformtitlecolor ?>;" class="arrowRight">&nbsp;</span></h2>
		</div><!-- END .titleBar -->
	 <?php  endif; ?> 
<?php  else : ?>
	 <?php if(empty($cformtitlecolor)) :?>
		<div class="titleBar">
			<div class="line"></div>
<h2 style="background:#ffce55;"><span style="border-right:20px solid #ffce55;" class="arrowLeft">&nbsp;</span> <?php echo $cformtitle; ?> <span style="border-left:20px solid #ffce55;" class="arrowRight">&nbsp;</span></h2>
		</div><!-- END .titleBar -->
	 <?php else : ?>
		<div class="titleBar">
			<div class="line"></div>
			<h2 style="background:#<?php echo $cformtitlecolor ?>;"><span style="border-right:20px solid #<?php echo $cformtitlecolor ?>;" class="arrowLeft">&nbsp;</span> <?php echo $cformtitle; ?> <span style="border-left:20px solid #<?php echo $cformtitlecolor ?>;" class="arrowRight">&nbsp;</span></h2>
		</div><!-- END .titleBar -->
	 <?php  endif; ?> 
<?php endif;  ?> 
<script type='text/javascript'>
    $(document).ready(function(){
		$("#reload").click(function(){
			$("img","#imgcaptchabox").remove();
			$("#imgcaptchabox").html('<img src="<?php bloginfo('template_directory'); ?>/captcha/captcha.php" id="imgcaptcha" />');
			return false;
		});
        $('#submitButton').click(function(e){
            e.preventDefault();
            var error = false;
            var cname1 = $('#cname1').val();
            var cname2 = $('#cname2').val();
            var cname3 = $('#cname3').val();
            var cname4 = $('#cname4').val();
            var cname5 = $('#cname5').val();
			<?php if($cfield1 == 'Yes') :?>
				if(cname1.length == 0){
					var error = true;
					$('#cname1').addClass("error");
				}else{
					$('#cname1').removeClass("error");
				}
			<?php  endif; ?> 
			<?php if($cfield2 == 'Yes') :?>
				if(cname2.length == 0){
					var error = true;
					$('#cname2').addClass("error");
				}else{
					$('#cname2').removeClass("error");
				}
			<?php  endif; ?> 
			<?php if($cfield3 == 'Yes') :?>  
				if(cname3.length == 0){
					var error = true;
					$('#cname3').addClass("error");
				}else{
					$('#cname3').removeClass("error");
				}
			<?php  endif; ?> 
			<?php if($cfield4 == 'Yes') :?>
				if(cname4.length == 0){
					var error = true;
					$('#cname4').addClass("error");
				}else{
					$('#cname4').removeClass("error");
				}
			<?php  endif; ?> 
			<?php if($cfield5 == 'Yes') :?>
				if(cname5.length == 0){
					var error = true;
					$('#cname5').addClass("error");
				}else{
					$('#cname5').removeClass("error");
				}
			<?php  endif; ?>   
            
            //now when the validation is done we check if the error variable is false (no errors)
            if(error == false){
                //disable the submit button to avoid spamming
                //and change the button text to Sending...
                $('#submitButton').attr({'disabled' : 'true', 'value' : 'Sending...' });
                
                /* using the jquery's post(ajax) function and a lifesaver
                function serialize() which gets all the data from the form
                we submit it to send_email.php */
                $.post("<?php bloginfo('template_directory'); ?>/send.php", $("#contactForm").serialize(),function(result){
                    //and after the ajax request ends we check the text returned
					var result = parseInt(result,10) ;
                    if(result == 1){
                        //and show the mail success div with fadeIn
                        $('#mail_success').fadeIn(500);
                        $('#contactForm').fadeOut(500);
                    }else if (result == 2){
                        //show the mail failed div
						
						$("img","#imgcaptchabox").remove();
						$("#imgcaptchabox").html('<img src="<?php bloginfo('template_directory'); ?>/captcha/captcha.php" id="imgcaptcha" />');
                        $('#spambot').fadeIn(500);
                        //reenable the submit button by removing attribute disabled and change the text back to Send The Message
                        $('#submitButton').removeAttr('disabled').attr('value', 'Send The Message');
						return false;
                    }else{
                        //show the mail failed div
                        $('#mail_fail').fadeIn(500);
                        //reenable the submit button by removing attribute disabled and change the text back to Send The Message
                        $('#submitButton').removeAttr('disabled').attr('value', 'Send The Message');
                    }
                });
            }
        });    
    });
</script>
<div id="formwidget" class="form-widget <?php echo $showContactm; ?>">
<div id="form-content" class="form-content  clearfix">
<h2><?php echo $ctitle; ?> </h2>
<div id='mail_success' class='success' style="display:none;">
	<?php  if(empty($csukses)) : ?>
	<div class="successmail">
		<p><strong>Email Successfully Sent!</strong></p>
		<p>Thank you for using our contact form <strong><?php echo $name;?></strong>! Your email was successfully sent and we 'll be in touch with you soon.</p>
	</div>
	<?php  else : ?>
	<div class="successmail">
		<p><?php echo $csukses; ?></p>
	</div>
	<?php endif;  ?>
</div>
<div id='mail_fail' class='error' style="display:none;"> 
	<?php  if(empty($cerror)) : ?>
	<div class="fail">Please check if you've filled all the fields with valid information and try again. Thank you.</div>
	<?php  else : ?>
	<div class="fail"><?php echo $cerror; ?></div>
	<?php endif;  ?>
</div>
<form method="post" action="<?php echo home_url( '/' ); ?>" id="contactForm" class="formWidget contactForm">
    <div class="rows">
    	<div class="col2">
    <?php if($cfield1 == 'Yes') :?>
		<label><?php echo $cname1; ?></label>
        <?php if($ctype1 == 'Text') :?>
        <input type="text" name="cname1" id="cname1" value="" class="required" role="input" aria-required="true" />
        <?php  elseif ($ctype1 == 'Message') :?>
        <textarea name="cname1" id="cname1" class="required" role="textbox" aria-required="true"></textarea>
        <?php  endif; ?> 
	<?php  elseif($cfield1 == 'No') : ?>
	<?php  else : ?>
        <input type="text" name="cname1" id="cname1" value="Your Name" class="required" role="input" aria-required="true" />
	<?php endif;  ?>
    	</div>
    	<div class="col2">
		<?php if($cfield2 == 'Yes') :?>
            <label><?php echo $cname2; ?></label>
            <?php if($ctype2 == 'Text') :?>
            <input type="text" name="cname2" id="cname2" value="" class="required" role="input" aria-required="true" />
            <?php  elseif ($ctype2 == 'Message') :?>
            <textarea name="cname2" id="cname2" class="required" role="textbox" aria-required="true"></textarea>
            <?php  endif; ?> 
        <?php  elseif($cfield2 == 'No') : ?>
        <?php  else : ?>
            <input type="text" name="cname2" id="cname2" value="Email" class="required" role="input" aria-required="true" />
        <?php endif;  ?>
    	</div>
    </div>
    <div class="rows">
    <?php if($cfield3 == 'Yes') :?>
    	<div class="col2">
		<label><?php echo $cname3; ?></label>
        <?php if($ctype3 == 'Text') :?>
        <input type="text" name="cname3" id="cname3" value="" class="required" role="input" aria-required="true" />
        <?php  elseif ($ctype3 == 'Message') :?>
        <textarea name="cname3" id="cname3" class="required" role="textbox" aria-required="true"></textarea>
        <?php  endif; ?> 
    	</div>
	<?php  elseif($cfield3 == 'No') : ?>
	<?php  else : ?>
    	<div class="col2">
        <input type="text" name="cname3" id="cname3" value="Phone" class="required" role="input" aria-required="true" />
    	</div>
	<?php endif;  ?>
    <?php if($cfield4 == 'Yes') :?>
    	<div class="col2">
		<label><?php echo $cname4; ?></label>
        <?php if($ctype4 == 'Text') :?>
        <input type="text" name="cname4" id="cname4" value="" class="required" role="input" aria-required="true" />
        <?php  elseif ($ctype4 == 'Message') :?>
        <textarea name="cname4" id="cname4" class="required" role="textbox" aria-required="true"></textarea>
        <?php  endif; ?>
    </div>
	<?php  elseif($cfield4 == 'No') : ?>
	<?php  else : ?>
    	<div class="col2">
        <input type="text" name="cname4" id="cname4" value="Address" class="required" role="input" aria-required="true" />
    	</div>
	<?php endif;  ?>
    </div>
    <?php if($cfield5 == 'Yes') :?>
    <div class="rows">
    	<div class="col1">
		<label><?php echo $cname5; ?></label>
        <?php if($ctype5 == 'Text') :?>
        <input type="text" name="cname5" id="cname5" value="" class="required" role="input" aria-required="true" />
        <?php  elseif ($ctype5 == 'Message') :?>
        <textarea name="cname5" id="cname5" class="required" role="textbox" aria-required="true"></textarea>
        <?php  endif; ?> 
    	</div>
    </div>   
	<?php  elseif($cfield5 == 'No') : ?>
	<?php  else : ?>
    <div class="rows">
    	<div class="col1">
        <textarea name="cname5" id="cname5" class="required" role="textbox" aria-required="true">Comments</textarea>
    	</div>
    </div>
	<?php endif;  ?> 
    <div class="rows row-captcha">
        <div class="col1">
            <div id="captchabox">
                <div id="imgcaptchabox"><img src="<?php bloginfo('template_directory'); ?>/captcha/captcha.php" id="imgcaptcha" /> </div>
                <a href="#" id="reload"><span class="icon-loop2">&nbsp;</span></a>
                <input type="text" name="answer" id="captcha-answer"  />
            </div>
            <span id="spambot" style="display:none; color:#F00;">Sorry, captcha not solved !</span> 
			<input type="submit" value="SEND" name="submit" id="submitButton" class="button3" style="background:#<?php echo $cbtncolor ?>;box-shadow:0px 3px 0 0px #<?php echo $cbtnshadow ?>;"  />
    	</div>
    </div>      
</form>
</div><!-- END .form-content -->
</div><!-- END #formwidget -->
<?php   
  }  
  add_shortcode('contact', 'eu_contact'); 
?>
