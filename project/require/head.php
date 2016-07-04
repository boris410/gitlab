<?php 
$name="GUEST";
if(isset($_COOKIE['userName'])){
    $name = $_COOKIE['userName'];
}
if($_GET['logout']){//檢查是否登出
setcookie("userName","out",time()-60*60*24);
    header("location: index.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>3 Carousel Layout (BS 3)</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		
	</head>
	<body>
	    
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
    <div class="navbar-wrapper">
        <div class="container">
            <div class="navbar navbar-inverse navbar-static-top">
                <div class="navbar-header">
                    <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="navbar-brand" href="#">Bootstrap 3</a>
                </div>
                
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="http://www.bootply.com" target="ext">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                        <?php if(isset($_COOKIE['userName'])){ ?>
                        <li class="activ"><a href="person.php">Hi <?php echo $name = $_COOKIE['userName']; ?> </a></li>
                        <li class="activ"><a href="index.php?logout=1">logout</a></li>
                        <?php }else{ ?>
                        <li class="activ"><a href="#">hello <?php echo $name; ?> </a></li>
                        <li class="activ"><a href="login.php">login</a></li>
                        <?php } ?>
                    </ul>
                </div>
                

            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /navbar wrapper -->


    <!-- Carousel
================================================== -->
    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="/assets/example/bg_suburb.jpg" style="width:100%" class="img-responsive">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Bootstrap 3 Carousel Layout</h1>
                        <p></p>
                        <p><a class="btn btn-lg btn-primary" href="http://getbootstrap.com">Learn More</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="http://lorempixel.com/2000/600/abstract/1" class="img-responsive">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Changes to the Grid</h1>
                        <p>Bootstrap 3 still features a 12-column grid, but many of the CSS class names have completely changed.</p>
                        <p><a class="btn btn-large btn-primary" href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="http://placehold.it/1500X500" class="img-responsive">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Percentage-based sizing</h1>
                        <p>With "mobile-first" there is now only one percentage-based grid.</p>
                        <p><a class="btn btn-large btn-primary" href="#">Browse gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>
	