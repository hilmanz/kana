<?php
/**
 * Template Name: Contact
 *
 */
get_header(); ?>
<div id="redPage">
<div class="send">
<?php
if (isset($_POST['sendCV'])=="sendCV") {
	// $email_to = "ferra@kana.co.id,jobs@kana.co.id";
	//$email_to = "chit@eureka@gmail.com";
	$email_to = "info@kana.co.id,amien.krisna@kana.co.id,vera@kana.co.id,bayu.ekaputra@kana.co.id,narendra.wicaksana@kana.co.id,agnes.adellina@kana.co.id";
	//$email_to = "deddy@kana.co.id,dedysumarna@gmail.com";
	$subject = $_POST['yourname'];

	$file = $_FILES['fileupload']['tmp_name'];
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

	$filename = md5($_FILES['fileupload']['name'].rand(1000,9999)).".".$type[1];
	$filename = $_POST['youremail']."_".$filename;
	$path = bloginfo('template_directory')."upload/$filename";

	$message = "
	<h1>EMAIL CONTACT KANA DIGITAL</h1>
	<table width='400' border='0' cellspacing='0' cellpadding='0'>
	  <tr>
		<td width='100' valign='top'>Name</td>
		<td width='10' valign='top'>:</td>
		<td width='92' valign='top'>".$_POST['yourname']."</td>
	  </tr>
	  <tr>
		<td width='100' valign='top'>Company</td>
		<td width='10' valign='top'>:</td>
		<td width='92' valign='top'>".$_POST['yourcompany']."</td>
	  </tr>
	  <tr>
		<td width='100' valign='top'>Company Address</td>
		<td width='10' valign='top'>:</td>
		<td width='92' valign='top'>".$_POST['yourcompanyaddress']."</td>
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
		<td valign='top'>Interested in</td>
		<td valign='top'>:</td>
		<td valign='top'>".$_POST['interested']."</td>
	  </tr>
	  <tr>
		<td valign='top'>Message</td>
		<td valign='top'>:</td>
		<td valign='top'>".$_POST['message']."</td>
	  </tr>
	  <tr>
		<td valign='top'>Budget</td>
		<td valign='top'>:</td>
		<td valign='top'>".$_POST['budget']."</td>
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
		echo "<div class='overlays'><div class='messagebox'><h3>Thank you. We will contact you shortly.</h3></div></div>";
	}else{
		echo "<div class='overlays'><div class='messagebox'>Sorry, don't know what happened. Try later</div></div>";
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
            var yourcompany = $('#yourcompany').val();
            var yourcompanyaddress = $('#yourcompanyaddress').val();
            var message = $('#message').val();
            var email = $('#youremail').val();
            var phone = $('#phonenumber').val();
            var interested = $('#interested').val();
            var budget = $('#budget').val();
            var BotBootInput = $('#BotBootInput').val();
            if(name.length == 0){
                var error = true;
                $('#name_error').fadeIn(500);
            }else{
                $('#name_error').fadeOut(500);
            }
            if(yourcompany.length == 0){
                var error = true;
                $('#company_error').fadeIn(500);
            }else{
                $('#company_error').fadeOut(500);
            }
            if(yourcompanyaddress.length == 0){
                var error = true;
                $('#companyaddress_error').fadeIn(500);
            }else{
                $('#companyaddress_error').fadeOut(500);
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
            if(interested.length == 0){
                var error = true;
                $('#interested_error').fadeIn(500);
            }else{
                $('#interested_error').fadeOut(500);
            }
            if(message.length == 0){
                var error = true;
                $('#message_error').fadeIn(500);
            }else{
                $('#message_error').fadeOut(500);
            }
            if(budget.length == 0){
                var error = true;
                $('#budget_error').fadeIn(500);
            }else{
                $('#budget_error').fadeOut(500);
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
<div id="universal">
    <div class="wrapper">
		<?php
        if(have_posts()) :
            while(have_posts()) :
            the_post();
        ?>
        	<div class="heading">
                <div class="col1">
                	<div class="titleBox">
                    	<h2 style="font-size:45px;">Do we want to hear from you? You bet we do!
Tell us about your project, your questions,
or even your favorite flavor of ice cream. </h2>
                    </div><!-- END .titleBox -->
                </div><!-- END .col1 -->
            </div><!-- END .heading -->
            <div class="content">
				<div class="careerForm w700">
                		<p>*This form accepts project-related, general inquiries & warm greetings.</p>
						<form class="submitcv" id="careers_form" method="POST" action="" enctype="multipart/form-data">
							<fieldset>
								<div class="row">
									<input type="text" placeholder="Your full name, or just the first" value="" id="yourname" name="yourname"/>
								</div>
								<div id='name_error' class='error'> Input your name</div>
								<div class="row">
									<input type="text" placeholder="Your company" value="" id="yourcompany" name="yourcompany"/>
								</div>
								<div id='company_error' class='error'> Input your company</div>
								<div class="row">
									<input type="text" placeholder="Your company address" value="" id="yourcompanyaddress" name="yourcompanyaddress"/>
								</div>
								<div id='companyaddress_error' class='error'> Input your company address</div>
								<div class="row">
									<input type="text" placeholder="Your phone number" value="" id="phonenumber" name="phonenumber"/>
								</div>
								<div id='phone_error' class='error'> Input your phone number correctly!</div>
								<div class="row">
									<input type="text" placeholder="Your e-mail address" value="" id="youremail" name="youremail"/>
								</div>
								<div id='email_error' class='error'> Input your email correctly!</div>
								<div class="row">
                                	<div class="selectcss">
									<select name="interested" id="interested">
										<option value="">What you're interested in</option>
										<option value="Website">Website</option>
										<option value="Mobile Apps">Mobile Apps</option>
										<option value="Games">Games</option>
										<option value="Social Media Management">Social Media Management</option>
										<option value="Sonar">Sonar</option>
										<option value="Brandifi">Brandifi</option>
										<option value="Touchbase">Touchbase</option>
										<option value="Others">Others</option>
									</select>
                                    </div>
								</div>
								<div id='interested_error' class='error'> Select What you're interested in</div>
								<div class="row">
									<textarea placeholder="Say what you need to say (or upload one)"  id="message" name="message"></textarea>
								</div>
								<div id='message_error' class='error'> Say what you need</div>
								<div class="row">
									<input type="file" id="fileupload" name="fileupload"/>
								</div>
								<div id='fileupload_error' class='error'> Upload what you need</div>
								<div class="row">
                                	<div class="selectcss">
									<select name="budget" id="budget">
										<option value="">If this is project-related, specify your budget</option>
										<option value="< Rp. 50.000.000">< Rp. 50.000.000</option>
										<option value="Rp. 51.000.000 - Rp. 100.000.000">Rp. 51.000.000 - Rp. 100.000.000</option>
										<option value="> Rp. 100.000.000">> Rp. 100.000.000</option>
									</select>
                                    </div>
								</div>
								<div id='budget_error' class='error'> Specify your budget</div>
								<div class="row">
									<script type="text/javascript">DrawBotBoot()</script>
								</div>
								<div id='BotBootInput_error' class='error'> Input the result of captcha correctly!</div>
								<div class="rowbtn">
									<input class="button5" id='send_message_careers' type="submit" value="SUBMIT"/>
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
