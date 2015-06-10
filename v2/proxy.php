<?php
if(isset($_POST['youtubeProxy'])){
	//$file = file_get_contents('https://gdata.youtube.com/feeds/api/standardfeeds/IN/most_popular');
	$file = file_get_contents('https://www.youtube.com/channel/UCAh9DbAZny_eoGFsYlH2JZw');
	echo $file;
}

if(isset($_POST['twitterProxy'])){
	$file = file_get_contents('http://trends24.in/india/');
	echo json_encode($file);
}

if(isset($_POST['googleProxy'])){
	$file = file_get_contents('http://www.google.co.in/trends/hottrends/atom/feed?pn=p3');
	echo $file;
}
?>