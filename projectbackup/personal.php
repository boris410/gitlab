<!DOCTYPE htlm>
<html>
<head>
<title>Single</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
</head>
<body>
	
	
	
	<?php 
	 //if(!isset($_COOKIE['userName']))
  //      header("location: login.php");
  	require_once("require/check.php");
  	
  	
	require_once("require/dbconnect.php");
     $dbname="shopping";
    mysql_select_db($dbname, $link);
    $command = "select * from member where mEmail = '$_SESSION[userName]' ";
    
    
     $result = mysql_query($command,$link);
     // var_dump($command);
     $row = mysql_fetch_assoc($result);
    //var_dump($row);
    // //到此頁面載入個人資料
?>


	
	
	
	
<div class="wrap" >	
<div class="container" >
      <div class="header_top" >
		  <div class="col-sm-9 h_menu4">
				<ul class="megamenu skyblue">
					  <li><a class="color8" href="index.php">New</a></li>	
				      <li class="active grid"><a class="color1" href="#">Men</a><div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="men.php">Accessories</a></li>
										<li><a href="men.php">Bags</a></li>
										<li><a href="men.php">Caps & Hats</a></li>
										<li><a href="men.php">Hoodies & Sweatshirts</a></li>
										<li><a href="men.php">Jackets & Coats</a></li>
										<li><a href="men.php">Jeans</a></li>
										<li><a href="men.php">Jewellery</a></li>
										<li><a href="men.php">Jumpers & Cardigans</a></li>
										<li><a href="men.php">Leather Jackets</a></li>
										<li><a href="men.php">Long Sleeve T-Shirts</a></li>
										<li><a href="men.php">Loungewear</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="men.php">Shirts</a></li>
										<li><a href="men.php">Shoes, Boots & Trainers</a></li>
										<li><a href="men.php">Shorts</a></li>
										<li><a href="men.php">Suits & Blazers</a></li>
										<li><a href="men.php">Sunglasses</a></li>
										<li><a href="men.php">Sweatpants</a></li>
										<li><a href="men.php">Swimwear</a></li>
										<li><a href="men.php">Trousers & Chinos</a></li>
										<li><a href="men.php">T-Shirts</a></li>
										<li><a href="men.php">Underwear & Socks</a></li>
										<li><a href="men.php">Vests</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="men.php">Levis</a></li>
										<li><a href="men.php">Persol</a></li>
										<li><a href="men.php">Nike</a></li>
										<li><a href="men.php">Edwin</a></li>
										<li><a href="men.php">New Balance</a></li>
										<li><a href="men.php">Jack & Jones</a></li>
										<li><a href="men.php">Paul Smith</a></li>
										<li><a href="men.php">Ray-Ban</a></li>
										<li><a href="men.php">Wood Wood</a></li>
									</ul>	
								</div>												
							</div>
						  </div>
						</div>
					</li>
				    <li class="grid"><a class="color2" href="#">Women</a>
					  <div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="men.php">Accessories</a></li>
										<li><a href="men.php">Bags</a></li>
										<li><a href="men.php">Caps & Hats</a></li>
										<li><a href="men.php">Hoodies & Sweatshirts</a></li>
										<li><a href="men.php">Jackets & Coats</a></li>
										<li><a href="men.php">Jeans</a></li>
										<li><a href="men.php">Jewellery</a></li>
										<li><a href="men.php">Jumpers & Cardigans</a></li>
										<li><a href="men.php">Leather Jackets</a></li>
										<li><a href="men.php">Long Sleeve T-Shirts</a></li>
										<li><a href="men.php">Loungewear</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="men.php">Shirts</a></li>
										<li><a href="men.php">Shoes, Boots & Trainers</a></li>
										<li><a href="men.php">Shorts</a></li>
										<li><a href="men.php">Suits & Blazers</a></li>
										<li><a href="men.php">Sunglasses</a></li>
										<li><a href="men.php">Sweatpants</a></li>
										<li><a href="men.php">Swimwear</a></li>
										<li><a href="men.php">Trousers & Chinos</a></li>
										<li><a href="men.php">T-Shirts</a></li>
										<li><a href="men.php">Underwear & Socks</a></li>
										<li><a href="men.php">Vests</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="men.php">Levis</a></li>
										<li><a href="men.php">Persol</a></li>
										<li><a href="men.php">Nike</a></li>
										<li><a href="men.php">Edwin</a></li>
										<li><a href="men.php">New Balance</a></li>
										<li><a href="men.php">Jack & Jones</a></li>
										<li><a href="men.php">Paul Smith</a></li>
										<li><a href="men.php">Ray-Ban</a></li>
										<li><a href="men.php">Wood Wood</a></li>
									</ul>	
								</div>												
							</div>
						  </div>
						</div>
			    </li>
				<li><a class="color4" href="404.php">Accessories</a></li>				
				<li><a class="color6" href="contact.php">Conact</a></li>
			  </ul> 
			</div>
			<div class="col-sm-3 header-top-right">
			     <div class="drop_buttons">
			  	   	<select class="drop-down "> 
				       <option value="1">Dollar</option>
				       <option value="2">Euro</option>
					</select>
   				    <select class="drop-down drop-down-in">
						<option value="1">English</option>
						<option value="2">French</option>
						<option value="3">German</option>
					</select>
   			       <div class="clearfix"></div>
   			    </div>
   			    <div class="register-info">
				    <ul>
						<?php if(isset($_SESSION['userName'])) {?>
						<li><a href="personal.php"><?php echo $_SESSION['userName']; ?></a></li>
						<li><a href="?logout=1"> Logout</a></li>
						<?php }else{?>
						<li><a href="index.php">Guest</a></li>
						<li><a href="login.php">Login</a></li>
						<?php } ?>
						
					</ul>
			    </div>
				<div class="clearfix"> </div>
   			 </div>
   			 <div class="clearfix"> </div>
	</div>
	
	
   <div class="header_bootm" >
		<div class="col-sm-4 span_1">
		  <div class="logo">
			<a href="index.php"><img src="images/logo.png" alt=""/></a>
		  </div>
		</div>
		<div class="col-sm-8 row_2">
		  <div class="header_bottom_right">
			<div class="search">
			  <input type="text" value="Your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your email address';}">
			  <input type="submit" value="">
	  		</div>
	  		<ul class="bag">
	  			<a href="cart.php"><i class="bag_left"> </i></a>
	  			<a href="cart.php"><li class="bag_right"><p>205.00 $</p> </li></a>
	  			<div class="clearfix"> </div>
	  		</ul>
	  		<div class="clearfix"> </div>
		   </div>
		</div>
		 <div class="clearfix"></div>
	</div>
	
	
	
	<div class="content" > 
		<table align="center" >
		
			<tr>
				
				<td><h3>Firstname</h3></td>
			
				<td><input type="text" value="<?php echo $row['mFirstname'] ?>"></td>
				
			</tr>
		
		</table>
	</div>
	
		<div class="content"> 
		<table align="center" >
		
		
			<tr>
				<td><h3>Lastname</td>
				<td><input type="text" value="<?php echo $row['mLastname']; ?>"></td>
			
				
			</tr>
		
		</table>
	</div>
	
		<div class="content"> 
		<table align="center" >
		
		
			<tr>
				<td><h3>Email</td>
				<td><input type="text" value="<?php echo $row['mEmail'] ?>"></td>
				
			</tr>
		
		</table>
	</div>
	
		<div class="content"> 
		<table align="center" >
		
		
			<tr>
				<td><h3>Phone</td>
				<td><input type="text" value="<?php echo $row['mPhone'] ?>"></td>
			</tr>
		</table>
	</div>
	
	
	
	

	
	
<div class="content"  >
  <div class="content_box">
	<div class="men">

    </div>
    
	<div class="footer_top">
		<!-- start span_of_2 -->
		<div class="span_of_2">
			<div class="span1_of_2">
				<h5>need help? <a href="#">contact us <span> &gt;</span> </a> </h5>
				<p>(or) Call us: +22-34-2458793</p>
			</div>
			<div class="span1_of_2">
				<h5>follow us </h5>
				<div class="social-icons">
					     <ul>
					        <li><a href="#" target="_blank"></a></li>
					        <li><a href="#" target="_blank"></a></li>
					        <li><a href="#" target="_blank"></a></li>
					        <li><a href="#" target="_blank"></a></li>
					        <li class="last2"><a href="#" target="_blank"></a></li>
						</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="copy">
		   <p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
		</div>
     </div>
     
     
   </div>
</div>	


<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
							  <script defer src="js/jquery.flexslider.js"></script>
							  <script type="text/javascript">
								$(function(){
								  SyntaxHighlighter.all();
								});
								
								$(window).load(function(){
								  $('.flexslider').flexslider({
									animation: "slide",
									start: function(slider){
									  $('body').removeClass('loading');
									}
								  });
								});
								
								
								$("#buy").click(function(){
									  
									 
        						  var x = ($(".m_5").text());
        						  car(x);
						
									
									
									
								});
								
								
								
								
								
								
								
								
								
								
								
							  </script>
</body>
</htlm>		