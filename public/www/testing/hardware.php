<!DOCTYPE html>
<html>
<head>
<?php
$page = "hardware";
require'templates/header.php';
?>
	<!--End header-->
	<!--content-->
	<div class="content">
		<div class="container">
			<div class="div_main">
			       
 
                        <div class="row">
    
    <div class="col-md-12">

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
      <!-- tabs left -->
			<!-- tabs -->
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#a" data-toggle="tab">POS Equipment and Consumables</a></li>
			        <li><a href="#b" data-toggle="tab">Printers </a></li>
			        <li><a href="#c" data-toggle="tab">Computers & Accessories</a></li>
			        <li><a href="#d" data-toggle="tab">Networking</a></li>
				</ul>
				
				<div class="tab-content">
					<div class="tab-pane active" id="a">                
						<div class="row">
						   <div class="col-xs-9">
								<h3 class="hs">POS Equipment and Consumables </h3><br/>
								 
								<div class="row">
			                           <br/>
				                        <div class="col-md-4 rwbtm">
								        	  <img src="images/pos_img.jpg" class="img-responsive"/>	
								        	  <h3>Point of Sale</h3>
								        </div>	
								        
								        <div class="col-md-4 rwbtm">
								              <img src="images/hardware/cash-drawer1.jpg" class="img-responsive"/>	
								              <h3>Cash Drawer</h3>
								        </div>
								        
								         <div class="col-md-4 rwbtm">
								              <img src="images/hardware/handheld-scanner.jpg" class="img-responsive"/>
								              <h3>Handheld Scanner </h3>
								        </div>
			                     </div>
			                     
			                     <div class="row">
			                           <br/>
				                        <div class="col-md-4 rwbtm">
								        	  <img src="images/shelf_talker.jpg" class="img-responsive"/>	
								        	  <h3>Shelf Strips & Shelf Talkers </h3>
								        </div>	
								        
								        <div class="col-md-4 rwbtm">
								              <img src="images/hardware/till_rolls.jpg" class="img-responsive"/>
								              <h3>Till Rolls</h3>
								        </div>
								        
								         <div class="col-md-4 rwbtm">
								              <img src="images/hardware/price-labels.jpg" class="img-responsive"/>
								              <h3>Price Labels</h3>
								        </div>
			                     </div>
			                     
			                     
			                     <div class="row">
			                           <br/>
				                        <div class="col-md-4 rwbtm">
								        	  <img src="images/hardware/barcode-stickers.jpg" class="img-responsive"/>	
								        	  <h3>Barcode Stickers </h3>
								        </div>	
								        
								        <div class="col-md-4 rwbtm">
								              <img src="images/hardware/rotatirm_a4_paper.jpg" class="img-responsive"/>
								              <h3>Bond Paper</h3>
								        </div>
								        
								         <div class="col-md-4 rwbtm">
								              
								        </div>
			                     </div>
			                     
			
			                     <div class="row">
			                        <div class="col-xs-12">
			                         <br/>
			                         <button type="button" class="bs2" data-toggle="modal" data-target="#myModala">REQUEST A QUOTE</button>
			                        </div>
			                     </div>       
								
						   </div><!-- end col xs 9 -->
						</div> <!-- end row -->
					</div> 
					<div class="tab-pane" id="b"> 
						<div class="row">
						   <div class="col-xs-9">
						    <h3 class="hs">Printers </h3><br/>
			                     <div class="row">                   
				                        <div class="col-md-4 rwbtm">	
								               <img src="images/printer_img1.jpg" class="img-responsive"/>			        	
								        </div>
								        <div class="col-md-4 rwbtm">
								        	   <img src="images/printer_img2.jpg" class="img-responsive"/>	
								        </div>
								        <div class="col-md-4 rwbtm">
								        	  <img src="images/hp2.jpg" class="img-responsive"/>	
								        </div>	   
			                     </div>
			                     
			                     <div class="row">
			                           <br/>
				                        <div class="col-md-4 rwbtm">
								        	  <img src="images/hp3.jpg" class="img-responsive"/>	
								        </div>	
								        
								        <div class="col-md-4 rwbtm">
								              <img src="images/hp1.jpg" class="img-responsive"/>
								        </div>
								        
								         <div class="col-md-4 rwbtm">
								              
								        </div>
			                     </div>
			                     
			                     <div class="row">
			                        <div class="col-xs-12">
			                         <br/>
			                         <button type="button" class="bs2" data-toggle="modal" data-target="#myModalb">REQUEST A QUOTE</button>
			                        </div>
			                     </div> 
						   </div>
						</div>
					</div>
				
					<div class="tab-pane" id="c"> 
						<div class="row">
						   <div class="col-xs-9">
								 <h3 class="hs">Computers & Accessories</h3><br/>
			                     <div class="row">                   
				                        <div class="col-md-4 rwbtm">	
								               <img src="images/computers_img1.jpg" class="img-responsive"/>			        	
								        </div>
								        <div class="col-md-4 rwbtm">
								        	   <img src="images/computers_img2.jpg" class="img-responsive"/>	
								        </div>
								        <div class="col-md-4 rwbtm">
								        	  <img src="images/computers_img3.jpg" class="img-responsive"/>	
								        </div>	   
			                     </div>
			                     
			                     <div class="row">
			                           <br/>  
			                     </div>
			                     
			                     <div class="row">                   
				                        <div class="col-md-4 rwbtm">	
								               <img src="images/acer_laptop.png" class="img-responsive"/>			        	
								        </div>
								        <div class="col-md-4 rwbtm">
								        	   	<img src="images/dell_laptop.jpg" class="img-responsive"/>	
								        </div>
								        <div class="col-md-4 rwbtm">
								        	    <img src="images/hp_laptop.png" class="img-responsive"/>
								        </div>	   
			                     </div>
			                     
			                     <div class="row">
			                           <br/>     
			                     </div> 
			                     
			                     <div class="row">                   
				                        <div class="col-md-4 rwbtm">	
								               <img src="images/lenovo_laptop.jpg" class="img-responsive"/>			        	
								        </div>
								        <div class="col-md-4 rwbtm"> 
								        <img src="images/hardware/computer-keyboard.jpg" class="img-responsive"/>			        	
								          	
								        </div>
								        <div class="col-md-4 rwbtm">	
								        <img src="images/hardware/computer-mouse.jpg" class="img-responsive"/>	    
								        </div>	   
			                     </div>
			                     
			                     <div class="row">
			                           <br/>      
			                     </div> 
			                     <div class="row">
			                        <div class="col-xs-12">
				                         <br/>
				                         <button type="button" class="bs2" data-toggle="modal" data-target="#myModalc">REQUEST A QUOTE</button>
			                        </div>
			                     </div> 
						   </div>
						</div>
					</div>
				
					<div class="tab-pane" id="d"> 
						 <div class="row">
							   <div class="col-xs-9">
									<h3 class="hs">Networking</h3><br/>
					                     <div class="row">                   
						                        <div class="col-md-4 rwbtm">	
										               <img src="images/hardware/cables.jpg" class="img-responsive"/>	
										               <h3>Cables</h3>		        	
										        </div>
										        
										        <div class="col-md-4 rwbtm">
										        	  <img src="images/hardware/ups.jpg" class="img-responsive"/>
										        	  <h3>UPS</h3>	
										        </div>	
										        
										        <div class="col-md-4 rwbtm">
										        	   <img src="images/hardware/ethernet-hub1.jpg" class="img-responsive"/>	
										               <h3>Ethernet hub switch</h3>
										        </div>   
					                     </div>
					                     
					                     <div class="row">
					                           <br/>   
					                     </div> 
					                     
					                     <div class="row">                   
						                        <div class="col-md-4 rwbtm">	
										               <img src="images/hardware/modems.jpg" class="img-responsive"/>	
										               <h3>Modems</h3>		        	
										        </div>
										        
										        <div class="col-md-4 rwbtm">
										        	  <img src="images/hardware/network-switch.jpg" class="img-responsive"/>
										        	  <h3>Network Switch</h3>	
										        </div>	
										        
										        <div class="col-md-4 rwbtm">
										        	   <img src="images/hardware/routers1.jpg" class="img-responsive"/>	
										               <h3>Routers</h3>
										        </div>   
					                     </div>
					                     <div class="row">
					                         <div class="col-xs-12">
						                         <br/>
						                         <button type="button" class="bs2" data-toggle="modal" data-target="#myModald">REQUEST A QUOTE</button>
					                         </div>
					                     </div>
							   </div>
						 </div>
					</div>
				</div>
			</div>
			<!-- /tabs -->
      
    </div>
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
					
					<div class="service-grid ser-in">
						<h5>Why W.T.S</h5>
                            <hr/>


						<p>The difference we try to make for our customers is based simply around a manageable progressive long term relationship. The first step is to automate sites ensure 100% computer based procedures and to ensure:</p>
							<ul>
								<li>Value for money pricing </li>	
								<li>Convenient online and onsite support for software and hardware issues
								</li>	
								<li>Quality software and hardware 
								</li>	
								
							</ul>					
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
        <h4 class="modal-title">REQUEST A QUOTE</h4>
      </div>
      <div class="modal-body">
        
	        <form name="request_quote" id="request_quote" action="commit/request_quote.php" method="POST">
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
		        	       
	      
      </div>
      <div class="modal-footer">
         <!--  --button type="button" class="bs2" id="submitForm">Send</button-->
         <input type="hidden" name="postval" value="POS Package" />
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
        <h4 class="modal-title">REQUEST A QUOTE</h4>
      </div>
      <div class="modal-body">
        
	        <form name="request_quote" id="request_quote" action="commit/request_quote.php" method="POST">
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
		        
		        
		        
		       
	      
      </div>
      <div class="modal-footer">
         <!--  --button type="button" class="bs2" id="submitForm">Send</button-->
         <input type="hidden" name="postval" value="Printers" />
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
        <h4 class="modal-title">REQUEST A QUOTE</h4>
      </div>
      <div class="modal-body">
        
	        <form name="request_quote" id="request_quote" action="commit/request_quote.php" method="POST">
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
		        	       
	      
      </div>
      <div class="modal-footer">
         <!--  --button type="button" class="bs2" id="submitForm">Send</button-->
         <input type="hidden" name="postval" value="Computers" />
         <button type="submit" name="submit" class="bs2">Send</button>
         <button type="button" class="bs2" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>

  </div>
</div>		


<!-- Modal -->
<div id="myModald" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">REQUEST A QUOTE</h4>
      </div>
      <div class="modal-body">
        
	        <form name="request_quote" id="request_quote" action="commit/request_quote.php" method="POST">
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

	      
      </div>
      <div class="modal-footer">
         <!--  --button type="button" class="bs2" id="submitForm">Send</button-->
         <input type="hidden" name="postval" value="Netowrking" />
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

    <!--footer-->
</body>
</html>
<?php 
		if(isset($_SESSION['op_status']))
		    unset($_SESSION['op_status']);
?>