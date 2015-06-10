<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	$_SESSION['username'] = 'admin';
}
include 'functions.php';
include 'updateDB.php';
//session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="1800">
<title>HUl Social Trends</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<style>


 #wordcloud_word_1,#wordcloud_word_2,#wordcloud_word_3,#wordcloud_word_4,#wordcloud_word_5{color:#a8009a; -webkit-animation-name: top5;-webkit-animation-duration: 3s;-webkit-animation-iteration-count: infinite;-moz-animation-name: top5;-moz-animation-duration: 3s;-moz-animation-iteration-count: infinite;-webkit-animation-name: top5;-webkit-animation-duration: 3s;-webkit-animation-iteration-count: infinite;animation-name: top5;animation-duration: 3s;animation-iteration-count: infinite; font-size:30px !important}

	  #wordcloud_word_6,#wordcloud_word_7,#wordcloud_word_8,#wordcloud_word_9,#wordcloud_word_10{color:#00af50;-webkit-animation-name: top10;-webkit-animation-duration: 4s;-webkit-animation-iteration-count: infinite;-moz-animation-name: top10;-moz-animation-duration: 4s;-moz-animation-iteration-count: infinite;-webkit-animation-name: top10;-webkit-animation-duration: 4s;-webkit-animation-iteration-count: infinite;animation-name: top10;animation-duration: 4s;animation-iteration-count: infinite;font-size:25px !important}

	  #wordcloud_word_11,#wordcloud_word_12,#wordcloud_word_13,#wordcloud_word_14,#wordcloud_word_15{color:#0070c3;-webkit-animation-name: top15;-webkit-animation-duration: 5s;-webkit-animation-iteration-count: infinite;-moz-animation-name: top15;-moz-animation-duration: 5s;-moz-animation-iteration-count: infinite;-webkit-animation-name: top15;-webkit-animation-duration: 5s;-webkit-animation-iteration-count: infinite;animation-name: top15;animation-duration: 5s;animation-iteration-count: infinite;font-size:20px !important}

	  #wordcloud_word_16,#wordcloud_word_17,#wordcloud_word_18,#wordcloud_word_19,#wordcloud_word_20{color:#ff0089;-webkit-animation-name: top20;-webkit-animation-duration: 6s;-webkit-animation-iteration-count: infinite;-moz-animation-name: top20;-moz-animation-duration: 6s;-moz-animation-iteration-count: infinite;-webkit-animation-name: top20;-webkit-animation-duration: 6s;-webkit-animation-iteration-count: infinite;animation-name: top20;animation-duration: 6s;animation-iteration-count: infinite;font-size:17px !important}

	  #wordcloud_word_21,#wordcloud_word_22,#wordcloud_word_23,#wordcloud_word_24{color:#ff4000;}

	  #wordcloud_word_0{color:#ff0000 !important;font-size:40px !important}
</style>
</head>

<body>
<?php 
$announceStatus = getAnnounceStatus();
if(crossTrendsStatus() > 0){
	$announceWidth = 'col-md-7';
}
else{
	$announceWidth = 'col-md-10';
}
?>
<!----------navigation wrapper end----------------------->

<div class="container main-contaniner">
  <div class="col-md-2">
    <nav class="navbar" role="navigation">
      <div class="navbar-header nav-contaniner nav-cont"> <img class="logo" src="images/logo.png"></div>
    </nav>
  </div>
  <!----------announcement -wrapper----------------------->
  <?php if($announceStatus == 1){ ?>
  <div class="<?php echo $announceWidth; ?> col-sm-12 col-xs-12 announce-hide pull-left" id="announce-widget">
    <div class="panel panel-default announcement-border">
      <div class="panel-heading announcement"> <span class="widget-title pull-left">Announcement</span> <i class="fa fa-times pull-right slide-down slide1"></i> </div>
      <div class="slide1-body">
        <div class="panel-body panel-min-height">
          <marquee>
          <h3><?php echo getLatestAnnounce(); ?></h3>
          </marquee>
          <!--<span class="pull-right announce-detail">Name of Submitor</span><br>
                      <span class="pull-right announce-detail">Date</span>--> 
        </div>
      </div>
    </div>
  </div>
  <?php }?>
  
  <!----------cross trends -wrapper----------------------->
  <?php //echo crossTrendsStatus(); ?>
  <?php if(crossTrendsStatus() > 0){ ?>
  <div class="col-md-3 col-sm-12 col-xs-12 cross" id="cross-trends-widget">
    <div class="list-group cross-trends-border">
      <li class="list-group-item cross-trends list-no-border height-line"> <span class="widget-title pull-left">cross Trends</span> </li>
      <!-----title of widget-------->
      
      <div class="slide2-body">
        <?php displayCrossTrends(); ?>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="clearfix"></div>
  
  <!-- twitter trend widget -->
  
  <!-- end of twitter trend widget --> 
  
  <!----------google trends widget ----------------------->
  
  <div class="col-md-12 col-sm-12 col-xs-12" id="google-widget">
    <div class="panel panel-default google-trends-border panel-background">
      <div class="panel-heading cross-trends google-trends"> <span class="widget-title pull-left">Google Trends</span> </div>
      <div class="panel-body no-padd">
        <div id="wordcloud" class="wordcloud"> </div>
      </div>
    </div>
  </div>
  <!-- end of google widget --> 
  
  <!-- youtube trend widget -->
  
  <!--  end of youtube trend widget --> 
  
  <!----------owned assests -wrapper----------------------->
  
  
</div>
</div>
<!----------main wrapper end----------------------->
</body>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/cloud.js"></script>
<script type="text/javascript" src="js/cloudtag.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</html>
