<?php
session_start();
?>
<!DOCTYPE htlm>
<htlm>
<head>
<title>Clothes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
<meta name="keywords" content="Lookz Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.useso.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
</head>

<body>
<div class="wrap">	
<div class="container">
	
<!---nav bar-------------------------------------------------------->	
     <div class="header_top">
		  <div class="col-sm-9 h_menu4">
				<ul class="megamenu skyblue">
				<li><a class="color8" href="index">Home</a></li>	
				<li class="active grid"><a class="color1" href="addProduct">addProduct</a>
				<li class="active grid"><a class="color1" href="deal">deal</a>
				</li>

			  </ul> 
			</div>
			<div class="col-sm-3 header-top-right">
			    
   			    <div class="register-info">
				 
						<?php if(isset($_SESSION['userName'])) {?>
						<ul>
					    	<li><a href="personal">Hello!! <?php echo $_SESSION['userName']; ?></a></li>
						    <li><a href="bloglogout"> Logout</a></li>
						</ul>
						<?php }else{?>
						<ul>
					        <li><a href="index">Hello!! Guest</a></li>
					        <li><a href="login">Login</a></li>
						</ul>
						<?php } ?>
				
			    </div>
				<div class="clearfix"> </div>
   			 </div>
   			 <div class="clearfix"> </div>
	</div>
<!---nav bar-------------------------------------------------------->	
	
<!---logo and search------------------------------------------------>	
    <div class="header_bootm">
		<div class="col-sm-4 span_1">
		  <div class="logo">
			<a href="index"><img src="images/logo.png" alt=""/></a>
		  </div>
		</div>
		<div class="col-sm-8 row_2">
		  <div class="header_bottom_right">
			<div class="search">
			  <input type="text" value="Your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your email address';}">
			  <input type="submit" value="">
	  		</div>
	  		<ul class="bag">
	  			
	  			
	  			
	  		</ul>
	  	
		   </div>
		</div>
		 <div class="clearfix"></div>
	</div>
<!---logo and search------------------------------------------------>		
	
	<div class="content">
  <div class="content_box">
	<div class="men">
	  <div class="col-md-3 sidebar">
	  	
	  	<div class="block block-layered-nav">
		    
</div>

</div>