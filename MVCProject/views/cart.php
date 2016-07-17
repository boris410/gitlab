<?php 
// session_start();
// 	require_once("require/check.php");
//   	if(!isset($_SESSION['userName']))//到此頁面判斷是否有登入
//   		header("location: login.php");

// 	require_once("require/dbconnect.php");
// 	$command = "select member.mId,bill.* from member join bill on  member.mEmail ='$_SESSION[userName]' and member.mId = bill.gmemberid";
// 	$result = mysql_query($command,$link);//透過mEmail載入帳號的帳單資料
	

// 	require_once("require/car.php")
//var_dump($data);











?>


<!DOCTYPE html>
<html>
<head>
<title>Cart</title>
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
					  <li class="active grid"><a class="color8" href="index">New</a></li>	
				      <li><a class="color1" href="#">Men</a><div class="megapanel">
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
						<li><a href="personal"><?php echo $_SESSION['userName']; ?></a></li>
						<li><a href="logout"> Logout</a></li>
						<?php }else{?>
						<li><a href="index">Guest</a></li>
						<li><a href="login">Login</a></li>
						<?php } ?>
						
					</ul>
					
					
					
			    </div>
				<div class="clearfix"> </div>
   			 </div>
   			 <div class="clearfix"> </div>
	</div>
   <div class="header_bootm">
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
	  			<a href="cart"><i class="bag_left"> </i></a>
	  			<a href="cart"><li class="bag_right"><p>205.00 $</p> </li></a>
	  			<div class="clearfix"> </div>
	  		</ul>
	  		<div class="clearfix"> </div>
		   </div>
		</div>
		 <div class="clearfix"></div>
	</div>
<div class="content">
  <div class="content_box">
	<div class="men cart">
		<p align="center">購買歷史</p>
		<table border="1" align="center">
			<tr>
		   <th>下單日期</th> <th>商品名稱</th>	<th>價格</th>
		</tr>
		
			<?php for($i=0;$i<=count($data)-1;$i++){ ?>
		<tr>
		
	 <td align="center"><?php  echo $data[$i]['bbuydate']; ?></td> <td align="center"><?php echo $data[$i]['bgoodsname']; ?></td><td align="center"><?php echo $data[$i]['bgoodsprice'];  ?></td>
		</tr>
		<?php } ?>
	
		</table>
		
		<p align="center">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
		<p align="center">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
		
		
		<p align="center">此次購物車內容</p>
			<?php if(isset($_SESSION[car])){ ?>
		<table border="1" align="center">
			<tr>
		<th>客人編號</th>	<th>產品編號</th>	<th>價格</th>	<th>品名</th> <th>購買時間</th><th>&nbsp</th><th>&nbsp</th>
			</tr>
			<tr>
			
			<?php foreach($_SESSION[car] as $key =>$value ){ ?>
	
				<td><?php  printf($_SESSION[car][$key][0]);?></td>
				<td><?php  printf($_SESSION[car][$key][1]);?></td>
				<td><?php  printf($_SESSION[car][$key][2]);?></td>
				<td><?php  printf($_SESSION[car][$key][3]);?></td>
				<td><?php  printf($_SESSION[car][$key][4]);?></td>
				<td><a href="?deal=<?php echo $key; ?>" style="color:blue;">結帳</a></td>
				<td><a href="?delete=<?php echo $key; ?>" style="color:blue;">刪除</a></td>
					<?php // ($_SESSION[car][0]); ?>
		</tr>
		
		<?php } ?>

		<?php }else{ ?>
		<p align="center">您還未購物!!您可以到<a href="index" style="color:blue;">這裡</a>選購喔!</p>
		<?php } ?>
	
		</table>
		<div class="clearfix"><hr></div>
	

		
		<!--echo $row['bill'];-->
	    <!--<h1>It appears that your cart is currently empty!</h1>-->
	    <!--<h2>You can continue browsing <a href="men.php">here</a>.</h2>-->
    </div>
	<div class="footer_top">
		
		
		
		
		
		
		
		
		
		
		
		
	<!--  <div class="span_of_4">-->
	<!--	<div class="col-md-3 box_4">-->
	<!--		<h4>Shop</h4>-->
	<!--		<ul class="f_nav">-->
	<!--			<li><a href="#">new arrivals</a></li>-->
	<!--			<li><a href="#">men</a></li>-->
	<!--			<li><a href="#">women</a></li>-->
	<!--			<li><a href="#">accessories</a></li>-->
	<!--			<li><a href="#">kids</a></li>-->
	<!--			<li><a href="#">brands</a></li>-->
	<!--			<li><a href="#">trends</a></li>-->
	<!--			<li><a href="#">sale</a></li>-->
	<!--			<li><a href="#">style videos</a></li>-->
	<!--		</ul>	-->
	<!--	</div>-->
	<!--	<div class="col-md-3 box_4">-->
	<!--		<h4>help</h4>-->
	<!--		<ul class="f_nav">-->
	<!--			<li><a href="#">frequently asked  questions</a></li>-->
	<!--			<li><a href="#">men</a></li>-->
	<!--			<li><a href="#">women</a></li>-->
	<!--			<li><a href="#">accessories</a></li>-->
	<!--			<li><a href="#">kids</a></li>-->
	<!--			<li><a href="#">brands</a></li>-->
	<!--		</ul>				-->
	<!--	</div>-->
	<!--	<div class="col-md-3 box_4">-->
	<!--		<h4>account</h4>-->
	<!--		<ul class="f_nav">-->
	<!--			<li><a href="#">login</a></li>-->
	<!--			<li><a href="#">create an account</a></li>-->
	<!--			<li><a href="#">create wishlist</a></li>-->
	<!--			<li><a href="#">my shopping bag</a></li>-->
	<!--			<li><a href="#">brands</a></li>-->
	<!--			<li><a href="#">create wishlist</a></li>-->
	<!--		</ul>-->
	<!--	</div>-->
	<!--	<div class="col-md-3 box_4">-->
	<!--		<h4>popular</h4>-->
	<!--		<ul class="f_nav">-->
	<!--			<li><a href="#">new arrivals</a></li>-->
	<!--			<li><a href="#">men</a></li>-->
	<!--			<li><a href="#">women</a></li>-->
	<!--			<li><a href="#">accessories</a></li>-->
	<!--			<li><a href="#">kids</a></li>-->
	<!--			<li><a href="#">brands</a></li>-->
	<!--			<li><a href="#">trends</a></li>-->
	<!--			<li><a href="#">sale</a></li>-->
	<!--			<li><a href="#">style videos</a></li>-->
	<!--			<li><a href="#">login</a></li>-->
	<!--			<li><a href="#">brands</a></li>-->
	<!--		</ul>			-->
	<!--	</div>-->
	<!--	<div class="clearfix"></div>-->
	<!--</div>-->
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
</body>
</html>		