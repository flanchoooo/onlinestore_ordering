<div class="footer">
	<div class="footer_a">
		<div class="container">
				
				<ul class="footer_menu">
					<li <?php if($page =='home'){ echo'class="active"';} else echo'';?> ><a href="home"><span> Home</span> </a></li>
					<li <?php if($page =='about'){ echo'class="active"';} else echo'';?> ><a href="about"><span>About </span></a></li>
					<li <?php if($page =='our_software'){ echo'class="active"';} else echo'';?> ><a href="our_software"><span>Our Software</span> </a></li>
					<li <?php if($page =='hardware'){ echo'class="active"';} else echo'';?> > <a href="hardware"><span>Hardware</span> </a></li>
					<li <?php if($page =='support'){ echo'class="active"';} else echo'';?> > <a href="support"><span>Support</span> </a></li>
					<li <?php if($page =='contact'){ echo'class="active"';} else echo'';?> ><a href="contact"><span>Contact </span> </a></li>
				</ul>


				<ul class="social-icons" style="margin-top: 10px;">
					<li><a href="#"><span> </span> </a></li>
					<li class="twitter"><a href="#"><span> </span></a></li>
					<li class="gmail"><a href="#"><span> </span> </a></li>
					<li class="print"><a href="#"><span> </span> </a></li>
				</ul>
		</div>

	</div>
	
	<div class="footer_b">
		<div class="container">
               <p class="footer-class">&copy; Copyright 2018 Wildtech Solutions (Pvt) Ltd , Designed by <a href="http://apicaledge.com/" target="_blank">Apical Edge</a> </p>
		</div>	

	</div>		
</div>
<?php 
		if(isset($_SESSION['op_status'])){
		    unset($_SESSION['op_status']);
		    session_unset();
		}
?>