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
     <div class="header_top">
		  <div class="col-sm-9 h_menu4">
				<ul class="megamenu skyblue">
					  <li><a class="color8" href="index">Home</a></li>	
				      <li class="active grid"><a class="color1" href="addProduct">addProduct</a>
				 
					</li>
				 
				<li><a class="color6" href="contact.php">Conact</a></li>
			  </ul> 
			</div>
			<div class="col-sm-3 header-top-right">
			    
   			    <div class="register-info">
				 
						<?php if(isset($_SESSION['userName'])) {?>
						<ul>
					    	<li><a href="personal">Hello!! <?php echo $_SESSION['userName']; ?></a></li>
						    <li><a href="logout"> Logout</a></li>
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
	  			
	  			<a href="cart"><h4><li class="bag_right"><p>目前購物車:<?php  echo count($_SESSION[car])."項";   ?></p></h4></li></a>
	  			<div class="clearfix"> </div>
	  		</ul>
	  	
		   </div>
		</div>
		 <div class="clearfix"></div>
	</div>
	<div class="content">
  <div class="content_box">
	<div class="men">
	  <div class="col-md-3 sidebar">
	  	
	  	<div class="block block-layered-nav">
		    
</div>


<!--<div class="block block-cart">-->
<!--        <div class="block-title">-->
<!--        <strong><span>Carrello</span></strong>-->
<!--    </div>-->
<!--    <div class="block-content">-->
        <p><?php //print_r($_SESSION[car][mID1][3]);  print_r($_SESSION[car][mID1][2]); ?></p>
        <?php //if (count($_SESSION[car])!=0){ ?>
        
            <?php //for($i=0;$i<=(count($_SESSION[car]))-1;$i++){ ?>
<!--            <p class="empty">1</p>-->
            <?php //} ?>
            
            
            <?php //}else{ ?>
<!--            <p class="empty">You have no items in your shopping cart.</p>-->
            <?php //} ?>
<!--        </div>-->
<!--</div>-->
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!--	<?php-->
<!--//session_start();-->
<!--?>-->
<!--<!DOCTYPE htlm>-->
<!--<htlm>-->
<!--<head>-->
<!--<title>Clothes</title>-->
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />-->
<!--<meta name="keywords" content="Lookz Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, -->
<!--Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />-->
<!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
<!--<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<!--<link href="css/style.css" rel='stylesheet' type='text/css' />-->
<!-- Custom Theme files -->
<!--webfont-->
<!--<link href='http://fonts.useso.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>-->
<!--<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>-->
<!-- start menu -->
<!--<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />-->
<!--<script type="text/javascript" src="js/megamenu.js"></script>-->
<!--<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>-->
<!--</head>-->

<!--<body>-->
<!--<div class="wrap">	-->
<!--<div class="container">-->
<!--     <div class="header_top">-->
<!--		  <div class="col-sm-9 h_menu4">-->
<!--				<ul class="megamenu skyblue">-->
<!--					  <li><a class="color8" href="index">Home</a></li>	-->
<!--				      <li class="active grid"><a class="color1" href="index">Main</a>-->
<!--				      <div class="megapanel">-->
<!--						<div class="row">-->
<!--							<div class="col1">-->
<!--								<div class="h_nav">-->
<!--									<ul>-->
<!--										<li><a href="men.php">Accessories</a></li>-->
<!--										<li><a href="men.php">Bags</a></li>-->
<!--										<li><a href="men.php">Caps & Hats</a></li>-->
<!--										<li><a href="men.php">Hoodies & Sweatshirts</a></li>-->
<!--										<li><a href="men.php">Jackets & Coats</a></li>-->
<!--										<li><a href="men.php">Jeans</a></li>-->
<!--										<li><a href="men.php">Jewellery</a></li>-->
<!--										<li><a href="men.php">Jumpers & Cardigans</a></li>-->
<!--										<li><a href="men.php">Leather Jackets</a></li>-->
<!--										<li><a href="men.php">Long Sleeve T-Shirts</a></li>-->
<!--										<li><a href="men.php">Loungewear</a></li>-->
<!--									</ul>	-->
<!--								</div>							-->
<!--							</div>-->
<!--							<div class="col1">-->
<!--								<div class="h_nav">-->
<!--									<ul>-->
<!--										<li><a href="men.php">Shirts</a></li>-->
<!--										<li><a href="men.php">Shoes, Boots & Trainers</a></li>-->
<!--										<li><a href="men.php">Shorts</a></li>-->
<!--										<li><a href="men.php">Suits & Blazers</a></li>-->
<!--										<li><a href="men.php">Sunglasses</a></li>-->
<!--										<li><a href="men.php">Sweatpants</a></li>-->
<!--										<li><a href="men.php">Swimwear</a></li>-->
<!--										<li><a href="men.php">Trousers & Chinos</a></li>-->
<!--										<li><a href="men.php">T-Shirts</a></li>-->
<!--										<li><a href="men.php">Underwear & Socks</a></li>-->
<!--										<li><a href="men.php">Vests</a></li>-->
<!--									</ul>	-->
<!--								</div>							-->
<!--							</div>-->
<!--							<div class="col1">-->
<!--								<div class="h_nav">-->
<!--									<h4>Popular Brands</h4>-->
<!--									<ul>-->
<!--										<li><a href="men.php">Levis</a></li>-->
<!--										<li><a href="men.php">Persol</a></li>-->
<!--										<li><a href="men.php">Nike</a></li>-->
<!--										<li><a href="men.php">Edwin</a></li>-->
<!--										<li><a href="men.php">New Balance</a></li>-->
<!--										<li><a href="men.php">Jack & Jones</a></li>-->
<!--										<li><a href="men.php">Paul Smith</a></li>-->
<!--										<li><a href="men.php">Ray-Ban</a></li>-->
<!--										<li><a href="men.php">Wood Wood</a></li>-->
<!--									</ul>	-->
<!--								</div>												-->
<!--							</div>-->
<!--						  </div>--->
<!--						</div>-->
<!--					</li>-->
<!--				    <li class="grid"><a class="color2" href="#">Women</a>-->
<!--					  <div class="megapanel">-->
<!--						<div class="row">-->
<!--							<div class="col1">-->
<!--								<div class="h_nav">-->
<!--									<ul>-->
<!--										<li><a href="men.php">Accessories</a></li>-->
<!--										<li><a href="men.php">Bags</a></li>-->
<!--										<li><a href="men.php">Caps & Hats</a></li>-->
<!--										<li><a href="men.php">Hoodies & Sweatshirts</a></li>-->
<!--										<li><a href="men.php">Jackets & Coats</a></li>-->
<!--										<li><a href="men.php">Jeans</a></li>-->
<!--										<li><a href="men.php">Jewellery</a></li>-->
<!--										<li><a href="men.php">Jumpers & Cardigans</a></li>-->
<!--										<li><a href="men.php">Leather Jackets</a></li>-->
<!--										<li><a href="men.php">Long Sleeve T-Shirts</a></li>-->
<!--										<li><a href="men.php">Loungewear</a></li>-->
<!--									</ul>	-->
<!--								</div>							-->
<!--							</div>-->
<!--							<div class="col1">-->
<!--								<div class="h_nav">-->
<!--									<ul>-->
<!--										<li><a href="men.php">Shirts</a></li>-->
<!--										<li><a href="men.php">Shoes, Boots & Trainers</a></li>-->
<!--										<li><a href="men.php">Shorts</a></li>-->
<!--										<li><a href="men.php">Suits & Blazers</a></li>-->
<!--										<li><a href="men.php">Sunglasses</a></li>-->
<!--										<li><a href="men.php">Sweatpants</a></li>-->
<!--										<li><a href="men.php">Swimwear</a></li>-->
<!--										<li><a href="men.php">Trousers & Chinos</a></li>-->
<!--										<li><a href="men.php">T-Shirts</a></li>-->
<!--										<li><a href="men.php">Underwear & Socks</a></li>-->
<!--										<li><a href="men.php">Vests</a></li>-->
<!--									</ul>	-->
<!--								</div>							-->
<!--							</div>-->
<!--							<div class="col1">-->
<!--								<div class="h_nav">-->
<!--									<h4>Popular Brands</h4>-->
<!--									<ul>-->
<!--										<li><a href="men.php">Levis</a></li>-->
<!--										<li><a href="men.php">Persol</a></li>-->
<!--										<li><a href="men.php">Nike</a></li>-->
<!--										<li><a href="men.php">Edwin</a></li>-->
<!--										<li><a href="men.php">New Balance</a></li>-->
<!--										<li><a href="men.php">Jack & Jones</a></li>-->
<!--										<li><a href="men.php">Paul Smith</a></li>-->
<!--										<li><a href="men.php">Ray-Ban</a></li>-->
<!--										<li><a href="men.php">Wood Wood</a></li>-->
<!--									</ul>	-->
<!--								</div>												-->
<!--							</div>-->
<!--						  </div>-->
<!--						</div>-->
<!--			    </li>-->
<!--				<li><a class="color4" href="404.php">Accessories</a></li>				-->
<!--				<li><a class="color6" href="contact.php">Conact</a></li>-->
<!--			  </ul> -->
<!--			</div>-->
<!--			<div class="col-sm-3 header-top-right">-->
<!--			     <div class="drop_buttons">-->
<!--			  	   	<select class="drop-down "> -->
<!--				       <option value="1">Dollar</option>-->
<!--				       <option value="2">Euro</option>-->
<!--					</select>-->
<!--   				    <select class="drop-down drop-down-in">-->
<!--						<option value="1">English</option>-->
<!--						<option value="2">French</option>-->
<!--						<option value="3">German</option>-->
<!--					</select>-->
<!--   			       <div class="clearfix"></div>-->
<!--   			    </div>-->
<!--   			    <div class="register-info">-->
<!--				    <ul>-->
<!--						<?php //if(isset($_SESSION['userName'])) {?>-->
<!--						<li><a href="personal"><?php //echo $_SESSION['userName']; ?></a></li>-->
<!--						<li><a href="logout"> Logout</a></li>-->
<!--						<?php //}else{?>-->
<!--						<li><a href="index">Guest</a></li>-->
<!--						<li><a href="login">Login</a></li>-->
<!--						<?php //} ?>-->
<!--					</ul>-->
<!--			    </div>-->
<!--				<div class="clearfix"> </div>-->
<!--   			 </div>-->
<!--   			 <div class="clearfix"> </div>-->
<!--	</div>-->
<!--    <div class="header_bootm">-->
<!--		<div class="col-sm-4 span_1">-->
<!--		  <div class="logo">-->
<!--			<a href="index.php"><img src="images/logo.png" alt=""/></a>-->
<!--		  </div>-->
<!--		</div>-->
<!--		<div class="col-sm-8 row_2">-->
<!--		  <div class="header_bottom_right">-->
<!--			<div class="search">-->
<!--			  <input type="text" value="Your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your email address';}">-->
<!--			  <input type="submit" value="">-->
<!--	  		</div>-->
<!--	  		<ul class="bag">-->
<!--	  			<a href="cart"><i class="bag_left"> </i></a>-->
<!--	  			<a href="cart"><li class="bag_right"><p>205.00 $</p> </li></a>-->
<!--	  			<div class="clearfix"> </div>-->
<!--	  		</ul>-->
<!--	  		<div class="clearfix"> </div>-->
<!--		   </div>-->
<!--		</div>-->
<!--		 <div class="clearfix"></div>-->
<!--	</div>-->