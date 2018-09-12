<!DOCTYPE html>
<html>
<head>
<?php
$page = "support";
require'templates/header.php';
?>
	<!--End header-->
	<!--content-->
	<div class="content">
		<div class="container">
			<div class="div_main">
 

				<div class="col-md-4 hardware">
						<h1>SUPPORT</h1>	
				</div>
	            <div class="col-md-8">
						<h1></h1>	
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
					<!--  --h1>Contact Details</h1-->

                      <h4>How to get help?</h4>
                      <h5 class="hss">Call us and ask for helpdesk</h5>
					  <h5 class="hss">Email us with the specific issue</h5>
					  <br/>
                     <h3 class="hss">Contacts</h3> 
					<p></p>
                    <table>
                    	<tr>
                    		<td><img src="images/phone_icon.png"/></td>
                    		<td>
								<p>+263 242 850645/85060</p>
								<p></p>
						    </td>
						</tr>
						<tr>
						    <td><a href="mailto:sales@wts.co.zw"><img src="images/mail_icon.png"/></a></td>
						    <td><p class="green_h">Emal: <a href="mailto:sales@wts.co.zw">support@wts.co.zw</a></p></td>	
						</tr>
						<tr>
							<td></td>
							<td></td>
							
                        </tr>
                    </table>
				  </div>

                  <a id="order"></a>
				  <div class="col-md-6 heading">		
					  <h4>Feedback</h4>
					  <h5 class="hss">For any comments contact email </h5>
					  <h5 class="hss green_h"><a href="mailto:customercare@wts.co.zw">customercare@wts.co.zw</a></h5>
                      <br/>
					<p><img class="img-responsive" src="images/support.png"/></p>
                     <br/>
					<p></p>
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