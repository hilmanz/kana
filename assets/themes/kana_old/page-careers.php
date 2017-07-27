<?php
/**
 * Template Name: Careers
 *
 */
get_header(); ?>
<div class="send">
<?php
if (isset($_POST['sendCV'])=="sendCV") {
	// $email_to = "ferra@kana.co.id,jobs@kana.co.id";
	$email_to = "suryani@kana.co.id";
	//$email_to = "deddy@kana.co.id,dedysumarna@gmail.com";
	$subject = $_POST['yourname'];
	
	$file = $_FILES['txtImage']['tmp_name'];
	$type = explode('/',$_FILES['txtImage']['type']);
	
	if ($type[1]=="vnd.ms-excel") {
		$type[1]= "xls";
	} elseif ($type[1]=="vnd.openxmlformats-officedocument.wordprocessingml.document") {
		$type[1] = "docx";
	} elseif ($type[1]=="msword") {
		$type[1] = "doc";
	}elseif ($type[1]=="vnd.ms-powerpoint") {
		$type[1] = "ppt";
	}	
	
	$filename = md5($_FILES['txtImage']['name'].rand(1000,9999)).".".$type[1];
	$filename = $_POST['youremail']."_".$filename;
	$path = bloginfo('template_directory')."upload/$filename";
	
	if (move_uploaded_file($file,$path)) {
		$message = "
		<h1>EMAIL CAREER KANA DIGITAL</h1>
		<table width='400' border='0' cellspacing='0' cellpadding='0'>
		  <tr>
			<td width='100' valign='top'>Name</td>
			<td width='10' valign='top'>:</td>
			<td width='92' valign='top'>".$_POST['yourname']."</td>
		  </tr>
		  <tr>
			<td valign='top'>Email</td>
			<td valign='top'>:</td>
			<td valign='top'>".$_POST['youremail']."</td>
		  </tr>
		  <tr>
			<td valign='top'>Phone</td>
			<td valign='top'>:</td>
			<td valign='top'>".$_POST['phonenumber']."</td>
		  </tr>
		  <tr>
			<td valign='top'>Expected Job Profile</td>
			<td valign='top'>:</td>
			<td valign='top'>".$_POST['lookforjob']."</td>
		  </tr>
		  <tr>
			<td valign='top' colspan='3'><a target='_blank' href='".home_url( '/' )."upload/$filename'>Download File</a></td>
		  </tr>
		</table>
		";
	
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		
		// More headers
		$headers .= 'From: <'.$_POST['youremail'].'>' . "\r\n";
		if(mail($email_to, $subject, $message, $headers)){
			echo "<div class='overlays'><div class='messagebox'><h3>Thank you. The mailman is on his way.</h3></div></div>";
		}else{
			echo "<div class='overlays'><div class='messagebox'>Sorry, don't know what happened. Try later</div></div>";
		}
	}
}
?> 
</div>

<style type='text/css'>
#contact_form_holder { 
    font-family: 'Verdana'; 
    font-variant: small-caps; 
    width:400px;
}
#contact_form_holder input, #contact_form_holder textarea { 
    width:100%; /* make all the inputs and the textarea same size (100% of the div they are into) */ 
    font-family:inherit; /* we must set this, because it doesn't inherits it */ 
    padding:5px;
}
#contact_form_holder textarea { 
    height:100px; /* i never liked small textareas, so make it 100px in height */ 
}
#cf_submit_p { text-align:right; } /* show the submit button aligned with the right side */

.error { display: none; padding:10px; color: #D8000C; font-size:12px;background-color: #FFBABA;}
.success { display: none; padding:10px; color: #044406; font-size:12px;background-color: #B7FBB9;}

#contact_logo { vertical-align: middle; }
.error img { vertical-align:top; }
</style>

<script type='text/javascript'>
	var a = Math.ceil(Math.random() * 10);
	var b = Math.ceil(Math.random() * 10);       
	var c = a + b	
	
	function DrawBotBoot() {
		document.write("<label>What is "+ a + " + " + b +" ?</label>");
		document.write("<input id='BotBootInput' type='text' maxlength='2' size='2'/>");
	}
	
    $("#careers_form").ready(function(){
        $('#send_message_careers').click(function(e){
            e.preventDefault();
            var error = false;
            var name = $('#yourname').val();
            var email = $('#youremail').val();
            var phone = $('#phonenumber').val();
            var lookforjob = $('#lookforjob').val();
            var filecv = $('#filecv').val();
            var BotBootInput = $('#BotBootInput').val();
            if(name.length == 0){
                var error = true;
                $('#name_error').fadeIn(500);
            }else{
                $('#name_error').fadeOut(500);
            }
            if(email.length == 0 || email.indexOf('@') == '-1'){
                var error = true;
                $('#email_error').fadeIn(500);
            }else{
                $('#email_error').fadeOut(500);
            }
			if(phone.length == 0 || isNaN(phone)){
				var error = true;
				$('#phone_error').fadeIn(500);
			} else {
				$('#phone_error').fadeOut(500);
			}
            if(lookforjob.length == 0){
                var error = true;
                $('#lookforjob_error').fadeIn(500);
            }else{
                $('#lookforjob_error').fadeOut(500);
            }
            if(filecv.length == 0){
                var error = true;
                $('#filecv_error').fadeIn(500);
            }else{
                $('#filecv_error').fadeOut(500);
            }
            if(BotBootInput.length == 0){
                var error = true;
                $('#BotBootInput_error').fadeIn(500);
            }else{
				var d = BotBootInput;
				if (d == c) {
					$('#BotBootInput_error').fadeOut(500);
				} else {
					$('#BotBootInput_error').fadeIn(500);
					return false;
				}
            }
			
			if(error == false){
				$("#careers_form").submit();
			}
        });
    });
</script>
<div id="greenPage2">
<div id="universal">
    <div class="wrapper">
		<?php
        if(have_posts()) :
            while(have_posts()) :
            the_post();
        ?>
        	<div class="heading">
                <div class="col2">
                	<div class="titleBox">
                    	<h2>The vacant chairs<br />are
                        yours to claim.<br /><br /></h2>
                    </div><!-- END .titleBox -->
                </div><!-- END .col2 -->
                <div class="col2">
                	<div class="titleBox">
                    	<div class="entry">
                    		<p>We invite you to fill them in immediately!<br />Make sure to show us your area of expertise and why you think that you would make a great fit.</p>
                        </div>
                    </div><!-- END .titleBox -->
                </div><!-- END .col2 -->
            </div><!-- END .heading -->
            <div class="theContent w700">
                <div id="accordion">
                    <?php $queryObject = new WP_Query( 'post_type=career' );
                    // The Loop!
                    if ($queryObject->have_posts()) { ?>
                        <?php while ($queryObject->have_posts()) { $queryObject->the_post(); ?>
                        <h3><?php the_title(); ?></h3>
                        <div class="acc-entries">
                        	<?php the_content(); ?>
                        </div><!-- end .acc-entries -->
                        <?php } ?>
                    <?php } else { ?>  
                    	<h3>Career Masih Kosong euy!! isi dong </h3>
                    <?php } ?>
                </div><!-- end #accordion -->
    		</div><!-- END .theContent -->
            <div class="content">
            	<h3>Submit your application with complete curriculum vitae indicating the job position to <a href="mailto:jobs@kana.co.id">jobs@kana.co.id</a>
Or simply complete the form below:</h3>
				<div class="careerForm w700">
						<form class="submitcv" id="careers_form" method="POST" action="" enctype="multipart/form-data">
							<fieldset>
								<div class="row">
									<input type="text" placeholder="Your Name" value="" id="yourname" name="yourname"/>
								</div>
								<div id='name_error' class='error'> Input your name</div>
								<div class="row">
									<input type="text" placeholder="Your Email" value="" id="youremail" name="youremail"/>
								</div>
								<div id='email_error' class='error'> Input your email correctly!</div>
								<div class="row">
									<input type="text" placeholder="Phone Number" value="" id="phonenumber" name="phonenumber"/>
								</div>
								<div id='phone_error' class='error'> Input your phone number correctly!</div>
								<div class="row">
                                	<div class="selectcss">
									<select name="lookforjob" id="lookforjob">
										<option value="">- Select Job Profile -</option>
										<option value="Account Executive">Account Executive</option>
										<option value="Account Manager">Account Manager</option>
										<option value="Copywriter">Copywriter</option>
                                        <option value="Social Media & Web Administrator">Social Media & Web Administrator</option>
										<option value="Finance & Admin Manager">Finance & Admin Manager</option>
										<option value="Graphic/Web Designer">Graphic/Web Designer</option>
                                        <option value="PHP Programmer">PHP Programmer</option>
										<option value="IT Sales Professional">IT Sales Professional</option>
										<option value="Linux System Administrator">Linux System Administrator</option>
										<option value="Senior Graphic/Web Designer">Senior Graphic/Web Designer</option>
										<option value="Sales Engineer">Sales Engineer</option>
										<option value="IT Quality Control">IT Quality Control</option>
									</select>
                                    </div>
								</div>
								<div id='lookforjob_error' class='error'> Select your Job Profile</div>
								<div class="row">
									<label>Upload Your CV</label>
									<input type="file" id="filecv" name="txtImage"/>
								</div>
								<div id='filecv_error' class='error'> Upload your CV</div>
								<div class="row">
									<script type="text/javascript">DrawBotBoot()</script>
								</div>
								<div id='BotBootInput_error' class='error'> Input the result of captcha correctly!</div>
								<div class="rowbtn">
									<input class="button4" id='send_message_careers' type="submit" value="SUBMIT YOUR CV"/>
									<input type="hidden" name="sendCV" value="sendCV"/>
								</div>
							</fieldset>
						</form>
                </div><!-- END .careerForm -->
            </div><!-- END .content -->
         <?php endwhile; ?>
        <?php endif; ?>
    </div><!-- END .wrapper -->
</div><!-- END #universal -->
<?php get_footer(); ?>