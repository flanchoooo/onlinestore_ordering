<!DOCTYPE html>
<html>
<head>
<?php
$page = "contact";
require'templates/header.php';
?>
	<!--End header-->
	<!--content-->
	<div class="content">
		<div class="container">
			<div class="div_main">
 

				<div class="col-md-4 hardware">
						<h1>CONTACT US</h1>	
				</div>
	            <div class="col-md-8">
						<?php
						  
					//session_start();
					$error = isset($_SESSION['op_status']) ? $_SESSION['op_status'] : '';
					
					if(is_array($error) && $error['msg'] != '')
					{
						
						$cls = $error['cls'];
						$text =  $error['msg'];
						
						echo"<div class='alert ".$cls."'>
									   <button class='close' data-dismiss='alert'>&times;</button>
									    ".$text."
							        </div>";
					}
					
					//session_destroy();
					if(isset($_SESSION['op_status'])){
						unset($_SESSION['op_status']);
						$_SESSION['op_status'] = array();
						$error = array();
						session_unset();
						session_destroy($_SESSION['op_status']);
					}
					?>   	
				</div>

			</div>	

			

			<div class="services-in">
				<div class="container">
					
					

						

						<!-- end rigght conent -->
						<div class="clearfix"> </div>
					
				</div>
		    </div>

			<div class="div_main">
 
               <!-- row 2 -->
			      <div class="col-md-6 heading">
					<h1>Contact Details</h1>


					<p><img class="img-responsive" src="images/contact_img.jpg"/></p>
                     <br/>
					<p>For online orders and enquiries fill in our contact form or call using below details:</p>
                    <table>
                    	<tr>
                    		<td><img src="images/phone_icon.png"/></td>
                    		<td>
								<p>Landline: +263-4- 850645/850605 | +263 8677107451/52</p>
								<p>Helpdesk: +263 777 271 683</p>
						    </td>
						</tr>
						<tr>
						    <td><a href="mailto:sales@wts.co.zw"><img src="images/mail_icon.png"/></a></td>
						    <td><p class="green_h">Emal: <a href="mailto:sales@wts.co.zw">sales@wts.co.zw</a></p>
						        <p class="green_h">Emal: <a href="mailto:customercare@wts.co.zw">customercare@wts.co.zw</a></p>
						    </td>	
						</tr>
						
						<tr>
							<td><img src="images/location_icon.png" id="gmp"/></td>
							<td>
		                            <p>11 Barnstaple Avenue<br/>
									   Northwood, Mt. Pleasant <br/>
									   Harare</p>
							</td>
							
                        </tr>
                    </table>
				  </div>

                  <a id="order"></a>
				  <div class="col-md-6 heading">		
							<h1>Send Us A Message</h1>


					
							

					<p>
                  <form name="contact_form" id="contact_form" method="post" action="commit/send_message.php">
						<div class="contact-grid">
							<div class="col-md-6 contact-us">
								<input type="text" value="" name="name" placeholder="Name" id="name" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Name';}" required>
							</div>
							<div class="col-md-6 contact-us">
								<input type="text" value="" name="email" id="email" placeholder="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Email';}" required>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="contact-grid">
							<div class="col-md-6 contact-us">
								<input type="text" value="" name="number" id="number" placeholder="Contact Number" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Contact number';}" required>
							</div>
							<div class="col-md-6 contact-us">
								<input type="text" value="" name="subject" id="subject" placeholder="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Subject';}" required>
							</div>
							<div class="clearfix"> </div>
						</div>


							<div class="col-md-12 contact">
						       <textarea cols="77" rows="6" value="" name="message" id="message" placeholder="Message" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}" required></textarea>
						    </div>

						

						<div class="send">
							<input type="hidden" name="cap" value="137" >
							<input type="submit" name="submit" value="SEND" >
						</div>
				</form>


					</p>
			</div>	

			<div class="services-in">
				<div class="container">
						<!-- end rigght conent -->
						<div class="clearfix"> </div>
					
				</div>
		    </div>
	
       </div>
	

		
		

			

		<div class="services-in">
				<div class="container">
						<!-- end rigght conent -->
						<div class="clearfix"> </div>
					
				</div>
		</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Find Us</h4>
      </div>
      <div class="modal-body">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3799.9984779510055!2d31.01434125031801!3d-17.74471088780579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTfCsDQ0JzQxLjAiUyAzMcKwMDAnNTkuNSJF!5e0!3m2!1sen!2sza!4v1455709847270" width="550" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
		
	   
      </div>
      
    </div>

  </div>
</div>




	</div>
	<!--footer-->
	<?php
	$page = "contact";
	include'templates/footer.php';
	?>
    <script src="bootstrap/js/bootstrap.min.js"></script> 
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery.validate.js"></script>
	<script>
	$.validator.setDefaults({
		submitHandler: function() {
			form.submit();
            

		}
	});

	$().ready(function() {

		var test = window.google != undefined;


		$('#gmp').click(function() {                     
           $('#myModal').modal('show');
        });

		$("#contact_form").validate({

                rules: {
                   name: "required",
                   company: "required",
                   number: "required",
                   subject: "required",
                   message: "required",
                    email: {
					required: true,
					email: true
				   }
                },

                messages: { 
                   name: "required",
                   company: "required",
                   number: "required",
                   subject: "required",
                   message: "required",
                   email: {
					required: "required",
					email: "please enter a valid email"
				   }
									
				}


			});

		
		
	});


	
	</script>


    <!--footer-->
</body>
</html>