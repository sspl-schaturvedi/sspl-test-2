<?php
if(isset($_POST['youtubeProxy'])){
	$file = file_get_contents('https://gdata.youtube.com/feeds/api/standardfeeds/IN/most_popular');
	echo $file;
}


if(isset($_POST['twitterTempProxy'])){
	$file = file_get_contents('http://trends24.in/india/');
	echo json_encode($file);
}
?>