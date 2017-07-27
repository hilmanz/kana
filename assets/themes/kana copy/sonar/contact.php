<div class="send">
<?php
if (isset($_POST['sendCV'])=="sendCV") {
	// $email_to = "ferra@kana.co.id,jobs@kana.co.id";
	$email_to = "chit.eureka@gmail.com";
	//$email_to = "amien.krisna@sonarplatform.com,bayu.ekaputra@sonar.id,yodi.laksono@sonar.id,vera.shiska@sonar.id,amien.krisna@sonar.id";
	// $email_to = "wahyu_bunyu_jogja@yahoo.co.id,wahyu.priyanto@kana.co.id";
	// $email_to = "deddy@kana.co.id,dedysumarna@gmail.com";
	$subject = $_POST['yourname'];
	
		$message = "
		<h1>EMAIL CONTACT KANA DIGITAL</h1>
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
			<td valign='top'>Country</td>
			<td valign='top'>:</td>
			<td valign='top'>".$_POST['country']."</td>
		  </tr>
		  <tr>
			<td valign='top'>Best time to contact</td>
			<td valign='top'>:</td>
			<td valign='top'>".$_POST['bestTime']."</td>
		  </tr>
		  <tr>
			<td valign='top'>Notes or Request</td>
			<td valign='top'>:</td>
			<td valign='top'>".$_POST['message']."</td>
		  </tr>
		</table>
		";
	
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		
		// More headers
		$headers .= 'From: <'.$_POST['youremail'].'>' . "\r\n";
		
			require("postmark.php");
	
			$postmark = new Postmark("3552419a-2e50-4947-bf5e-0e2fbeaf7d3c","info@kana.co.id","info@kana.co.id");
			
			if($postmark->to($email_to)->subject($subject)->html_message($message)->send()){
				 echo "<div class='overlays'><div class='messagebox'><h3>Thank you for the Request. We will contact you shortly.</h3></div></div>";
			}else{
				echo "<div class='overlays'><div class='messagebox'>Sorry, don't know what happened. Try later</div></div>";
			} 
		
		
		// if(mail($email_to, $subject, $message, $headers)){
			// echo "<div class='overlays'><div class='messagebox'><h3>Thank you for the Request. We will contact you shortly.</h3></div></div>";
		// }else{
			// echo "<div class='overlays'><div class='messagebox'>Sorry, don't know what happened. Try later</div></div>";
		// }
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
            var message = $('#message').val();
            var bestTime = $('#bestTime').val();
            var country = $('#country').val();
            var BotBootInput = $('#BotBootInput').val();
            var time = new Date();                


            $.post('save/webservice.php',
                { yourname: name, youremail: email, phonenumber: phone, message: message, time: time }
            ).done(function(data){
               // alert(data);
            });

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
            if(message.length == 0){
                var error = true;
                $('#note_error').fadeIn(500);
            }else{
                $('#note_error').fadeOut(500);
            }
            if(country.length == 0){
                var error = true;
                $('#country_error').fadeIn(500);
            }else{
                $('#country_error').fadeOut(500);
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
<script>
  $( ".overlays" ).click(function() {
  	$( this ).hide();
	});
</script>

<div id="contact-page">
	<div class="content">
    	<div class="section" id="contactHead">
        </div><!--end#section-about-->
        <div class="sectionContent" id="section-contact">
        	<div class="wrapper">
        	<h1>Request A Demo</h1>
            <p>We're always eager to present our platform to agencies and brands who wish to explore the power of social data. Kindly complete the form below and our sales representative will contact you in less than 24 hours.</p>
            
            <div id="formContact" class="formRequest">
            
                <form class="submitcv" id="careers_form" method="POST" action="" enctype="multipart/form-data">
                    <fieldset>
                        <div class="row">
                            <input class="inputForm" type="text" placeholder="Your Name" value="" id="yourname" name="yourname"/>
                        </div>
                        <div id='name_error' class='error'> Input your name</div>
                        <div class="row">
                            <input class="inputForm" type="text" placeholder="Your Email" value="" id="youremail" name="youremail"/>
                        </div>
                        <div id='email_error' class='error'> Input your email correctly!</div>
                        <div class="row">
                            <input class="inputForm" type="text" placeholder="Phone Number" value="" id="phonenumber" name="phonenumber"/>
                        </div>
                        <div id='phone_error' class='error'> Input your phone number correctly!</div>
                        <div class="row">
                            <input type="text" placeholder="When Is the Best Time to Contact You?" class="inputForm" name="bestTime" id="bestTime" />
                        </div>
                        <div class="row">
                            <input type="text" placeholder="Country" class="required inputForm" name="country" id="country" />
                        </div>
                        <div id='country_error' class='error'> Input your Country correctly!</div>
                        <div class="row">
                            <textarea placeholder="Notes or Request" name="message" id="message" class="inputTextarea"></textarea>
                        </div>
                        <div id='note_error' class='error'> Input your Notes or Request correctly!</div>
                        <div class="rowUpload2">
                            <script type="text/javascript">DrawBotBoot()</script>
                        </div>
                        <div id='BotBootInput_error' class='error'> Input the result of captcha correctly!</div>
                        <div class="rowbtn">
                            <input class="bt-blue fl" id='send_message_careers' type="submit" value="Send Request"/>
                            <input type="hidden" name="sendCV" id="submitBtn" value="sendCV"/>
                        </div>
                    </fieldset>
                </form>
            </div><!-- #formContact -->
            </div><!--end.wrapper-->
        </div><!--end#section-contact-->
            
    </div><!--end.content-->
</div><!--end#home-page-->
