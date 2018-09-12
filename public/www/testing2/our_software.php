<!DOCTYPE html>
<html>
<head>
<?php
$page = "our_software";
require'templates/header.php';
?>
	<!--End header-->
	<!--content-->
	<div class="content">
	
	<div class="container">
			<div class="div_main">
 

				<div class="col-md-4 hardware">
						<h1>OUR SOFTWARE</h1>	
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
					?> 
				</div>

			</div>
			
     </div>	
     	<br/><br/>	
	   <div class="box_4">
				<div class="container">
						<div class="projects text-center">
								<div class="col-md-4 grid_2">
									<i class="icon1"> </i>
									<h3>50+</h3>
									<h4>Retail customers <br/>through the<br/> channel</h4>
								</div>
								<div class="col-md-4 grid_2">
									<i class="icon2"> </i>
									<h3>50+</h3>
									<h4>Non retail<br/> customers</h4>
								</div>
								<div class="col-md-4 grid_2">
									<i class="icon3"> </i>
									<h3>365/24-7</h3>
									<h4>Helpdesk Support<br/> for resolution <br/>of issues</h4>
								</div>
								
								<div class="clearfix"> </div>
						</div>
				</div>
		</div>
		<div class="container">

			<div class="services-in">
				<div class="container">
						<!-- end rigght conent -->
						<div class="clearfix"> </div>				
				</div>
		    </div>

			<div class="div_main">
 
               <!-- row 2 -->
			      

			<div class="div_main">
 
             <div class="container">
  <div class="row">
   
    
  </div><!-- /row -->
  <div class="row">
    
    <div class="col-md-12">
               <a id="s"></a>          	
      <!-- tabs left -->
      <div class="tabbable tabs-left">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#a" data-toggle="tab">Pharmacy Management System</a></li>
          <li><a href="#b" data-toggle="tab">Practice Management System </a></li>
          <li><a href="#c" data-toggle="tab">Clinic Management system</a></li>
        </ul>
        <div class="tab-content">
         <div class="tab-pane active" id="a">
                  <div class="col-md-8">
                      <div class="row">
		                   <div class="col-md-6">
		                       <h3 class="hs">Propharm for Pharmacies </h3>
		                   </div>
		                   <div class="col-md-6">
		                       <img src="images/software_icons/propharm_icon.jpg" />
		                   </div>
	                   </div>
	                   <p style="margin-top:10px">Propharm is a versatile software solution designed to cater for the everyday functions of a retail pharmacy. Within Propharm, one can :</p>
	                   
	                   <ul style="margin-left:25px;margin-top:10px;margin-bottom:10px;">
		                    <li> dispense medication.</li>
						    <li> manage inventory.</li>
						    <li> reconcile medical aid payments.</li>
						    <li> sell on the point of sale module.</li>
							
	                   </ul>

	                   <p>With various system generated reports on all these features in the system, it makes it easy to track business operations and overall performance. As an optional feature Propharm has a drug interaction module (Complienz) and a Head Office module. In Complienz the person dispensing is able to see any contraindications of the drug such as if a diabetic patient should not take it or if it is not suitable during pregnancy etc.In the Head Office module the back office is able to view transactions in the front office in real time. This is mostly useful in big pharmacy chains as the Head office can alter items within the system. 
                      </p>
                      <div class="row">
	                      <div class="col-md-6"><br/><img class="img-responsive" src="images/software/propharm1.png"/></div>
	                      <div class="col-md-6"><br/><img class="img-responsive" src="images/software/propharm2.png"/></div>
	                      <div class="col-md-6"><br/></div>
	                      <div class="col-md-6"><br/><img class="img-responsive" src="images/software/propharm3.png"/></div>
	                      
                      </div>
                      
                      <div class="row">
                         <br/>
                         <button type="button" class="bs2" data-toggle="modal" data-target="#myModala">ENQUIRE NOW</button>
                      </div>
                   </div>
         </div>


         <div class="tab-pane" id="b">
         	        <div class="col-md-8">
         	           <div class="row">
		                   <div class="col-md-6">
		                       <h3 class="hs">Medemass for Doctors </h3>
		                   </div>
		                   <div class="col-md-6">
		                       <img src="images/software_icons/mediplus.jpg" />
		                   </div>
	                   </div>
                       
	                   <p style="margin-top:10px">PRACTICE MANAGEMENT SOFTWARE FLEXIBLE ENOUGH TO BE
CUSTOMISED ACROSS A WIDE SPECTRUM OF USER SCENARIOS. Medemass allows you to :</p>
	                   
	                    <ul style="margin-left:25px;margin-top:10px;margin-bottom:10px;">
		                    <li> do patient EMR creation and maintenance.</li>
						    <li> patient scheduling.</li>
						    <li> patient billing and payment tracking.</li>
						    <li> medical aid reconciliation.</li>
							<li> stock management.</li>
							<li> practitioner diary management.</li>
							<li> track financials through the system generated reports.</li>
							
                       </ul>
                       <div class="row">
                         <br/>
                         <button type="button" class="bs2" data-toggle="modal" data-target="#myModalb">ENQUIRE NOW</button>
                      </div>
                    </div>  
         </div>
         <div class="tab-pane" id="c">
             <div class="col-md-8">
                <div class="row">
		                   <div class="col-md-6">
		                       <h3 class="hs">Medemass for Clinics</h3>
		                   </div>
		                   <div class="col-md-6">
		                       <img src="images/software_icons/mediplus.jpg" />
		                   </div>
	             </div>
	             <p style="margin-top:10px">CLINIC MANAGEMENT SOFTWARE FLEXIBLE ENOUGH TO BE CUSTOMISED ACROSS A WIDE SPECTRUM OF USER SCENARIOS. Medemass allows you to :</p>
                  <ul style="margin-left:25px;margin-top:10px;margin-bottom:10px;">
		                    <li> do patient EMR creation and maintenance</li>
						    <li> patient scheduling .</li>
						    <li> stock management of all clinic consumables.</li>
						    <li> practitioner diary management.</li>
							<li> track financials through the system generated reports.</li>
							<li> admissions and full account management.</li>
							<li> integration with labs and radiology.</li>
							<li> Patient Billing of theatre, ward, pharmacy and take out invoices, accommodation and gasses.</li>
							<li> patient  payment tracking medical aid reconciliation.</li>
							<li> Electronic hospital claims Submissions.</li>
							
                    </ul>  
                    
                    <div class="row">
                         <br/>
                         <button type="button" class="bs2" data-toggle="modal" data-target="#myModalc">ENQUIRE NOW</button>
                    </div>         
            
             </div>

         </div>

        </div>
     </div>
      <!-- /tabs -->
      
    </div>
    </div>
  
         
  </div><!-- /row -->

</div>
  
  
  


               

		   </div>
	

		
		

			

		<div class="services-in">
				<div class="container">
						<!-- end rigght conent -->
						<div class="clearfix"> </div>
					
				</div>
		</div>


		<div class="services-in">
				<div class="container">
					
					 <div class="service-grid ad-in">
						<h5>Clients & Partners</h5>
                            <hr/>
                            
                         <div class="col-md-4">
						    
								<ul>
									<li>Strathaven Pharmacy
									</li>	
									<li>Kenlink The Bridge Pharmacy
									</li>	
									<li>Kenlink Avondale Pharmacy
									</li>	
									<li>Rockfoundation Medical Centre
									</li>
									<li>Ascot pharmacy
									</li>	
									<li>Health Mart Pharmacy Mutare
									</li>	
									<li>Greenwood Pharmacy
									</li>	
									
								</ul>
						</div>

						  <div class="col-md-4">
						    
								<ul>
                                    <li>University Of Zimbabwe Seke Clinic
									</li>
                                    <li>Plaza Mazoe Pharmacy
									</li>
                                    <li>Plaza Karigamombe Pharmacy
									</li>
                                    <li>Trinity Pharmacy
									</li>
                                    <li>Els Pharmacy
									</li>
                                    <li>Link Queensdale Pharmacy
									</li>
                                    <!--li>Rapha Pharmacy
									</li-->
                                    
                                   
								</ul>
						</div>

						  <div class="col-md-4">
						    
								<ul>
									<!--li>Michael Galfand Clinic
									</li-->
									<li>University Of Zimbabwe St Marys Clinic
									</li>	
									<li>Vlemag Pharmacy
									</li>
									<li>Medix Pharmacy
									</li>
									<li>University Of Zimbabwe central Pharmacy
									</li>
									<li>Avenues Clinic
									</li>
									<li>Health and All	
									</li>
									
							    </ul>
						</div>
						

			        </div>
				</div>
		</div>



		


<!-- Modal -->
<div id="myModala" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SOFTWARE PRODUCT ENQUIRY</h4>
      </div>
      <div class="modal-body">
        
	        <form name="enquiry" id="enquiry" action="commit/enquiry.php" method="POST">
		        <div class="row btm">
			           <div class="col-md-6">
			                 <input type="text" name="name" class="form-control" placeholder="Name" required  />
			           </div>
			           <div class="col-md-6">  
			                 <input type="text" name="surname" class="form-control" placeholder="Surname" required  />
			           </div>
		        </div>
		        
		        <div class="row btm">
			           <div class="col-md-6">
			                 <input type="text" name="email" class="form-control" placeholder="Email" required  />
			           </div>
			           <div class="col-md-6">  
			                 <input type="text" name="contact_number" class="form-control"  placeholder="Contact number" required />
			           </div>
		        </div>
		        
		        <div class="row btm">
			           <div class="col-md-6">
			                 <input type="text" name="company" class="form-control" placeholder="Organisation/Company"  />
			           </div>
			           <div class="col-md-6">  
			                 <input type="text" name="company_title" class="form-control" placeholder="Title"  />
			           </div>
		        </div>
		        
		        
		       <div class="row btm">
			           <div class="col-md-6">
			                 <label>Would you like a Software Demo?</label>
			           </div>
			           <div class="col-md-6">  
									<input type="radio" name="demo_request" value="Yes" required />&nbsp;&nbsp;Yes <br />
									<input type="radio" name="demo_request" value="No" required />&nbsp;&nbsp;No
			           </div>
		        </div>
	      
      </div>
      <div class="modal-footer">
         <!--  --button type="button" class="bs2" id="submitForm">Send</button-->
         <input type="hidden" name="postval" value="Pharmacy Management System - Propharm" />
         <button type="submit" name="submit" class="bs2">Send</button>
         <button type="button" class="bs2" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="myModalb" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SOFTWARE PRODUCT ENQUIRY</h4>
      </div>
      <div class="modal-body">
        
	        <form name="enquiry" id="enquiry" action="commit/enquiry.php" method="POST">
		        <div class="row btm">
			           <div class="col-md-6">
			                 <input type="text" name="name" class="form-control" placeholder="Name" required  />
			           </div>
			           <div class="col-md-6">  
			                 <input type="text" name="surname" class="form-control" placeholder="Surname" required />
			           </div>
		        </div>
		        
		        <div class="row btm">
			           <div class="col-md-6">
			                 <input type="text" name="email" class="form-control" placeholder="Email" required />
			           </div>
			           <div class="col-md-6">  
			                 <input type="text" name="contact_number" class="form-control"  placeholder="Contact number" required />
			           </div>
		        </div>
		        
		        <div class="row btm">
			           <div class="col-md-6">
			                 <input type="text" name="company" class="form-control" placeholder="Organisation/Company" />
			           </div>
			           <div class="col-md-6">  
			                 <input type="text" name="company_title" class="form-control" placeholder="Title" />
			           </div>
		        </div>
		        
		        
		       <div class="row btm">
			           <div class="col-md-6">
			                 <label>Would you like a Software Demo?</label>
			           </div>
			           <div class="col-md-6">  
									<input type="radio" name="demo_request" value="Yes" required />&nbsp;&nbsp;Yes <br />
									<input type="radio" name="demo_request" value="No" required />&nbsp;&nbsp;No
			           </div>
		        </div>
	      
      </div>
      <div class="modal-footer">
         <!--  --button type="button" class="bs2" id="submitForm">Send</button-->
         <input type="hidden" name="postval" value="Practice Management System - Medemass" />
         <button type="submit" name="submit" class="bs2">Send</button>
         <button type="button" class="bs2" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="myModalc" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SOFTWARE PRODUCT ENQUIRY</h4>
      </div>
      <div class="modal-body">
        
	        <form name="enquiry" id="enquiry" action="commit/enquiry.php" method="POST">
		        <div class="row btm">
			           <div class="col-md-6">
			                 <input type="text" name="name" class="form-control" placeholder="Name" required  />
			           </div>
			           <div class="col-md-6">  
			                 <input type="text" name="surname" class="form-control" placeholder="Surname"  required />
			           </div>
		        </div>
		        
		        <div class="row btm">
			           <div class="col-md-6">
			                 <input type="text" name="email" class="form-control" placeholder="Email" required  />
			           </div>
			           <div class="col-md-6">  
			                 <input type="text" name="contact_number" class="form-control"  placeholder="Contact number" required  />
			           </div>
		        </div>
		        
		        <div class="row btm">
			           <div class="col-md-6">
			                 <input type="text" name="company" class="form-control" placeholder="Organisation/Company"  />
			           </div>
			           <div class="col-md-6">  
			                 <input type="text" name="company_title" class="form-control" placeholder="Title"  />
			           </div>
		        </div>
		        
		        
		       <div class="row btm">
			           <div class="col-md-6">
			                 <label>Would you like a Software Demo?</label>
			           </div>
			           <div class="col-md-6">  
									<input type="radio" name="demo_request" value="Yes" required />&nbsp;&nbsp;Yes <br />
									<input type="radio" name="demo_request" value="No" required />&nbsp;&nbsp;No
			           </div>
		        </div>
	      
      </div>
      <div class="modal-footer">
         <!--  --button type="button" class="bs2" id="submitForm">Send</button-->
         <input type="hidden" name="postval" value="Clinic Management System - Medemass" />
         <button type="submit" name="submit" class="bs2">Send</button>
         <button type="button" class="bs2" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>

  </div>
</div>


	</div>
	<!--footer-->
	<?php
	include'templates/footer.php';
	?>
    <script>
	    $(document).ready(function() {
	  	        $('#rootwizard').bootstrapWizard({'tabClass': 'nav nav-tabs'});

	  	         $("#enquiry").on("submit", function(e) {
	  	           var postData = $(this).serializeArray();
	  	           var formURL = $(this).attr("action");
	  	           $.ajax({
	  	               url: formURL,
	  	               type: "POST",
	  	               data: postData,
	  	               success: function(data, textStatus, jqXHR) {
	  	                   $('#myModal .modal-header .modal-title').html("Result");
	  	                   $('#myModal .modal-body').html(data);
	  	                   $("#submitForm").remove();
	  	               },
	  	               error: function(jqXHR, status, error) {
	  	                   console.log(status + ": " + error);
	  	               }
	  	           });
	  	           e.preventDefault();
	  	       });
	  	        
	  	       $("#submitForm").on('click', function() {
	  	           $("#enquiry").submit();
	  	       });
	  	  
	    });
    </script>
    <!--footer-->
</body>
</html>