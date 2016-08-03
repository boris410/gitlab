<!DOCTYPE html>
<html>
    <head>
       	<link href="/gitlab/challenge2/bootstrap/css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link href="/gitlab/challenge2/bootstrap/css/style.css" rel='stylesheet' type='text/css' />
		<link href="/gitlab/challenge2/bootstrap/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
		<script type="text/javascript" src="/gitlab/challenge2/bootstrap/js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="/gitlab/challenge2/bootstrap/js/megamenu.js"></script>
		<meta charset="utf-8">
    </head>
<body>
	<div class="col-sm-1" style="border:3px blue solid; margin:3px;padding:3px;">
		<?php if(!isset($data[0][account_account])){?>
		<a href="login">登入</a><br>
		<a href="index">首頁</a>
		<?php }else{ ?>
		Hello!!<?php print_r($data[0][account_account]) ?>
		<br>
		<a href="index">首頁</a>
		<?php } ?>
	</div>
        
