<?php
// 建立CURL連線
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://192.168.153.212/transfer/presenter.php/getBalance?username=Boris");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close();
echo $output;
?>