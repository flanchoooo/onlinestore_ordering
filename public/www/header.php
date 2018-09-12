<title>Wild Tech Solutions | Home </title>
    <meta name="description" content="Wild Tech Solutions - Medical Retail Technical Service Provision incorporating the setting up of a hardware and software distribution.">
	<meta name="keywords" content=" Medical Retail Technical Service,Propharm,RxWin, PosWin,StockWin,RecWin,Complienz">
	<meta http-equiv="content-language" content="en">
	<meta name="Copyright" content="Author">
	<meta name="Author" content="Wild Tech Solutions">
	<meta name="country" content="Zimbabwe">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<link rel="shortcut icon" href="images/favicon.ico"/>
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<!--//fonts-->
</head>
<body> 
<!--header-->

	<!--banner-->
 <script src="js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
	<div class="slider">
	    <div class="callbacks_container">
	      <ul class="rslides" id="slider">
	        <li>
	          <img src="images/header-1.jpg" alt="">
	          <div class="banner">
				<h2>Trouble-free Dispensing</h2>
				<p>Our software combined with our trusted partners such as WeCare, Optiplife, Izzy-pix, Izikhwama,Admin-e-Sirators, Complienz, Epharm and BluLabel ensure Troublefree Disepensing throughout the day.</p>
			</div>
	        </li>
	        <li>
	          <img src="images/header-2.jpg" alt="">
	        	 <div class="banner">
				<h2>Innovative Products & Technology</h2>
				<p>We at Propharm Computers like to take on an innovative approach to our software as well as our ongoing efforts to better aid the independent pharmacies with all of the tools they may require to make a success.</p>
			</div>
	        </li>
	        <li>
	          <img src="images/header-3.jpg" alt="">
	         <div class="banner">
				<h2>Total control of stock</h2>
				<p>With Propharm's StockWin software, stock take has never been this easy! StockWin enables you to conduct a live stock take wirelessly without closing your doors and without the need to work after hours.</p>
			</div>
	        </li>

	        <!--li>
	          <img src="images/banner6.jpg" alt="">
	         <div class="banner">
				<h2>Medical Pratice Management Software</h2>
				<p>WTS also offers a medical practice management solution package called medis elite. One of the mostly used medical practioner software in Southern Africa…</p>
			</div>
	        </li-->
	      </ul>
	  </div>
	  </div>
	  <!--header-->
		<div class="header">
			<div class="container">			
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt=" " /></a>
				</div>
				<div class="top-nav">
					<span class="menu"> </span>
					<ul>
						<li <?php if($page =='home'){ echo'class="active"';} else echo'';?>><a href="home" class="scroll">HOME </a></li>
						<li <?php if($page =='about'){ echo'class="active"';} else echo'';?>><a href="about" class="scroll">ABOUT </a></li>
						<li <?php if($page =='our_software'){ echo'class="active"';} else echo'';?>><a href="our_software" class="scroll">OUR SOFTWARE</a></li>
						<li <?php if($page =='hardware_and_support'){ echo'class="active"';} else echo'';?>><a href="hardware_and_support" class="scroll">HARDWARE & SUPPORT</a></li>
						<li <?php if($page =='contact'){ echo'class="active"';} else echo'';?>><a href="contact" class="scroll">CONTACT</a></li>
					</ul>
					<!--script-->
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
			   </script>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>