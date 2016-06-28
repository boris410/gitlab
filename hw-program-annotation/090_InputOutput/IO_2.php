<?php

$fileDir = dirname ( __FILE__ );//取得檔案所在路徑
echo $fileDir;
$fileResource = opendir ( $fileDir );//打開路徑所指到的資料夾

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>

	<p>File list:</p>
	<ul>
	<?php while ($item = readdir($fileResource)) : ?><!--將路徑內的項目echot出來-->
		<li><?php echo $item; ?></li>
			
	<?php endwhile; ?>

	</ul>
	

<?php closedir($fileResource); ?>
</body>
</html>
