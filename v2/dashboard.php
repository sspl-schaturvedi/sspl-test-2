<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$username = 'admin';
$password = '1234';
if(isset($_POST['submit'])){
	if($_POST['username'] != $username || $_POST['password'] != $password){
		header("Location:index.php");
	}
	else{
		$_SESSION['username'] = 'admin';
	}
}
if(!isset($_SESSION['username'])){
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Social Trends</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="css/custom.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container main-contaniner"> 
  <!----------announcement -wrapper----------------------->
  <div class="col-md-7 col-lg-7 col-sm-6 col-xs-12">
    <div class="panel panel-default announcement-boder">
      <div class="panel-heading announcement"> <span class="widget-title pull-left">Announcement</span> <i class="fa fa-chevron-down pull-right slide-down"></i> </div>
      <div class="panel-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        <div class="clearfix"></div>
        <span class="pull-right announce-detail">Name of Submitor</span><br>
        <span class="pull-right announce-detail">Date</span> </div>
    </div>
  </div>
  
  <!----------cross trends -wrapper----------------------->
  
  <div class="col-md-5 col-lg-5 col-sm-6 col-xs-12">
    <div class="list-group cross-trends-boder"> <a href="#" class="list-group-item cross-trends"> <span class="widget-title pull-left">cross Trends</span><i class="fa fa-chevron-down pull-right slide-down"></i></a><!-----title of widget--------> 
      
      <a href="#" class="list-group-item all-trend-font">Cross trend 1 <i class="cross-trend-icon twitter fa fa-twitter"></i> <i class="cross-trend-icon youtube fa fa-youtube-play"></i> <i class="cross-trend-icon google fa fa-google"></i></a> <a href="#" class="list-group-item all-trend-font">Cross trend 2 <i class="cross-trend-icon twitter fa fa-twitter"></i> <i class="cross-trend-icon youtube fa fa-youtube-play"></i> <i class="cross-trend-icon google fa fa-google"></i></a> <a href="#" class="list-group-item all-trend-font">Cross trend 3 <i class="cross-trend-icon twitter fa fa-twitter"></i> <i class="cross-trend-icon youtube fa fa-youtube-play"></i> <i class="cross-trend-icon google fa fa-google"></i> </a> <a href="#" class="list-group-item all-trend-font">Cross trend 4 <i class="cross-trend-icon twitter fa fa-twitter"></i> <i class="cross-trend-icon youtube fa fa-youtube-play"></i> <i class="cross-trend-icon google fa fa-google"></i> </a> </div>
  </div>
  <div class="clearfix"></div>
  
  <!----------google trends -wrapper----------------------->
  
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="panel panel-default google-trends-boder panel-background">
      <div class="panel-heading cross-trends google-trends"> <span class="widget-title pull-left">Google Trends</span> </div>
      <div class="panel-body"> <img src="images/google trends.PNG" class="img-responsive"> </div>
    </div>
  </div>
  <div class="clearfix"></div>
  
  <!----------owned assests -wrapper----------------------->
  
  <div class="col-md-7 col-lg-7 col-sm-6 col-xs-12">
    <div class="list-group own-assests-boder"> <a href="#" class="list-group-item own-assests"> <span class="widget-title pull-left">Owned assests</span> <i class="fa fa-chevron-down pull-right slide-down"></i> </a> <a href="#" class="list-group-item all-trend-font">Dove <span class="pull-right">xx,xx,xxx</span></a> <a href="#" class="list-group-item all-trend-font">Cornetto <span class="pull-right">xx,xx,xxx</span></a> <a href="#" class="list-group-item all-trend-font">Rexona <span class="pull-right">xx,xx,xxx</span></a> <a href="#" class="list-group-item all-trend-font">Knorr <span class="pull-right">xx,xx,xxx</span></a> </div>
  </div>
  
  <!----------twitter trends -wrapper----------------------->
  
  <div class="col-md-5 col-lg-5 col-sm-6 col-xs-12">
    <div class="list-group twitter-trends-boder"> <a href="#" class="list-group-item twitter-trends"> <span class="widget-title pull-left">twitter trends</span> </a> <a href="#" class="list-group-item">Dapibus ac facilisis in</a> <a href="#" class="list-group-item">Morbi leo risus</a> <a href="#" class="list-group-item">Porta ac consectetur ac</a> <a href="#" class="list-group-item">Vestibulum at eros</a> </div>
  </div>
  <div class="clearfix"></div>
  
  <!----------youtube -wrapper----------------------->
  
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="panel panel-default youtube-trends-border">
      <div class="panel-heading cross-trends youtube-trends"> <span class="widget-title pull-left">youtube Trends</span> </div>
      <div class="panel-body no-padding">
        <div class="col-md-4 col-sm-6 padding_15"><!------youtube first trend video-------------->
          <div class="thumbnail"> <a href="#" target="_blank"> <img src="images/youtube-1.PNG" alt=""></a> </div>
          <div class="caption">
            <p><a href="#" class="trend-title" target="_blank" title="">Hamari Adhuri Kahani | Official Trailer | Vidya Balan | Emraan Hashmi | </a></p>
            <p>by <span class="author">FoxStarHindi</span></p>
            <p><span class="trend-views">2,149,537</span> views</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 padding_15"><!------youtube second trend video-------------->
          <div class="thumbnail"> <a href="#" target="_blank"> <img src="images/youtube-2.PNG" alt=""></a> </div>
          <div class="caption">
            <p><a href="#" class="trend-title" target="_blank" title="">MTV Roadies X2 - Pokhara - Journey Episode #9 - Full</a></p>
            <p>by <span class="author">mtvroadies</span></p>
            <p><span class="trend-views">385,914</span> views</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 padding_15"><!------youtube third trend video-------------->
          <div class="thumbnail"> <a href="#" target="_blank"> <img src="images/youtube-3.PNG" alt=""></a> </div>
          <div class="caption">
            <p><a href="#" class="youtube-trend-title" target="_blank" title="">Bezubaan Phir Se | Disney's ABCD 2 | Varun Dhawan</a></p>
            <p>by <span class="youtube-trend-author"> UTV Motion Pictures</span></p>
            <p><span class="youtube-trend-views">185,094</span> views</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!---youtube wrapper end----------> 
  
</div>
<!----------main wrapper end-----------------------> 
<!-- jQuery --> 
<script src="js/jquery.js"></script> 
<script type="text/javascript" src="js/cloud.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<!-- Custom JS --> 
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
