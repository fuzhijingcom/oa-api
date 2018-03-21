<?php
header("Content-type: text/html; charset=utf-8");

$id = $_GET['id'];
$url = "http://news-at.zhihu.com/api/4/news/".$id;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$out = curl_exec($ch);
curl_close($ch);

echo $out;


?>