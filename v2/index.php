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

$brandsFbData_W1 = getBrandsFbData('2');
$brandsFbData_W2 = getBrandsFbData('3');
for($i=0;$i<7;$i++){
	$brandsFbProfitNLoss[$i] = intval((($brandsFbData_W1[$i]['doi']-$brandsFbData_W2[$i]['doi'])/$brandsFbData_W2[$i]['doi'])*100);
	if($brandsFbProfitNLoss[$i] > 0){
		$brandsFbProfitNLossClass[$i] = "up";
	}
	else{
		$brandsFbProfitNLossClass[$i] = "down";
	}
}

$brandsTwData_W1 = getBrandsTwData('2');
$brandsTwData_W2 = getBrandsTwData('3');
for($i=0;$i<7;$i++){
	$brandsTwProfitNLoss[$i] = intval((($brandsTwData_W1[$i]['doi']-$brandsTwData_W2[$i]['doi'])/$brandsTwData_W2[$i]['doi'])*100);
	if($brandsTwProfitNLoss[$i] > 0){
		$brandsTwProfitNLossClass[$i] = "up";
	}
	else{
		$brandsTwProfitNLossClass[$i] = "down";
	}
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
      <div class="panel-heading announcement"> <span class="widget-title pull-left">Announcement</span> </div>
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
  <div class="col-md-3 col-sm-6 col-xs-12 twitter-hide pull-left" id="twitter-widget">
    <div class="panel panel-default full-twitter-border" id="twitter-trends-widget">
      <div class="panel-heading cross-trends twitter-trends"> <span class="widget-title pull-left">Twitter Trends</span> <span class="pull-right live">Live</span> </div>
      <div class="panel-body twitter-tags zero_padding">
        <p class="heightline-twitter">
        <li class="list-group-item twitter-tags"><a href="" target="_blank"><span></span></a></li>
        <li class="list-group-item twitter-tags"><a href="" target="_blank"><span></span></a></li>
        <li class="list-group-item twitter-tags"><a href="" target="_blank"><span></span></a></li>
        <li class="list-group-item twitter-tags"><a href="" target="_blank"><span></span></a></li>
        <li class="list-group-item twitter-tags"><a href="" target="_blank"><span></span></a></li>
        <li class="list-group-item twitter-tags"><a href="" target="_blank"><span></span></a></li>
        <li class="list-group-item twitter-tags"><a href="" target="_blank"><span></span></a></li>
        <li class="list-group-item twitter-tags"><a href="" target="_blank"><span></span></a></li>
        <li class="list-group-item twitter-tags"><a href="" target="_blank"><span></span></a></li>
        <li class="list-group-item twitter-tags last-tweet"><a href="" target="_blank"><span></span></a></li>
        </p>
      </div>
    </div>
  </div>
  <!-- end of twitter trend widget --> 
  
  <!----------google trends widget ----------------------->
  
  <div class="col-md-6 col-sm-12 col-xs-12" id="google-widget">
    <div class="panel panel-default google-trends-border panel-background">
      <div class="panel-heading cross-trends google-trends"> <span class="widget-title pull-left">Google Trends</span> <span class="pull-right live">Live</span> </div>
      <div class="panel-body no-padd">
        <div id="wordcloud" class="wordcloud"> </div>
      </div>
    </div>
  </div>
  <!-- end of google widget --> 
  
  <!-- youtube trend widget -->
  <div class="col-md-3 col-sm-12 col-xs-12 pull-right">
    <div class="panel panel-default youtube-trends-border" id="youtube-trends-widget">
      <div class="panel-heading cross-trends youtube-trends"> <span class="widget-title pull-left">youtube Trends</span> <span class="pull-right live">Live</span></div>
      <div class="panel-body no-padding"> 
        <!------youtube first trend video-------------->
        <div class="youtube-tile">
          <div class="col-md-7 col-sm-3 col-xs-12 padding_15">
            <div class="thumbnail"> <a href="#" target="_blank"> <img src="http://placehold.it/320x240" alt=""></a> </div>
          </div>
          <div class="col-md-5" style="padding:10px 1px 1px 1px">
            <div class="caption">
              <p><a href="#" class="trend-title" target="_blank" title="">Loading... </a></p>
              <p> <span class="author">Loading... </span></p>
              <p><span class="trend-views">Loading... </span> views</p>
            </div>
          </div>
        </div>
        
        <!------youtube second trend video-------------->
        <div class="youtube-tile">
          <div class="col-md-7 col-sm-3 col-xs-12 padding_15">
            <div class="thumbnail"> <a href="#" target="_blank"> <img src="http://placehold.it/320x240" alt=""></a> </div>
          </div>
          <div class="col-md-5" style="padding:10px 1px 1px 1px">
            <div class="caption">
              <p><a href="#" class="trend-title" target="_blank" title="">Loading... </a></p>
              <p> <span class="author">Loading... </span></p>
              <p><span class="trend-views">Loading... </span> views</p>
            </div>
          </div>
        </div>
        
        <!------youtube third trend video-------------->
        <div class="youtube-tile">
          <div class="col-md-7 col-sm-3 col-xs-12 padding_15">
            <div class="thumbnail"> <a href="#" target="_blank"> <img src="http://placehold.it/320x240" alt=""></a> </div>
          </div>
          <div class="col-md-5" style="padding:10px 1px 1px 1px">
            <div class="caption">
              <p><a href="#" class="trend-title" target="_blank" title="">Loading... </a></p>
              <p> <span class="author">Loading... </span></p>
              <p><span class="trend-views">Loading... </span> views</p>
            </div>
          </div>
        </div>
        
        <!------youtube fourth trend video-------------->
        <div class="youtube-tile">
          <div class="col-md-7 col-sm-3 col-xs-12 padding_15">
            <div class="thumbnail"> <a href="#" target="_blank"> <img src="http://placehold.it/320x240" alt=""></a> </div>
          </div>
          <div class="col-md-5" style="padding:10px 1px 1px 1px">
            <div class="caption">
              <p><a href="#" class="trend-title" target="_blank" title="">Loading... </a></p>
              <p> <span class="author">Loading... </span></p>
              <p><span class="trend-views">Loading... </span> views</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  end of youtube trend widget --> 
  
  <!----------owned assests -wrapper----------------------->
  
  <div class="col-md-6 col-sm-6 col-xs-12" id="assets-widget">
    <div class="list-group own-assests-border max-height" style="max-height:281px">
      <li class="list-group-item own-assests height-line"> <span class="widget-title pull-left">Top Brands</span> <i class="cross-trend-icon fa fa-facebook graphfb grapgiconalign" id="show_fb_chart"></i> <i class="cross-trend-icon fa fa-twitter grapgiconatweet grapgiconalign" id="show_tw_chart"></i> </li>
      <!--<div class="slide3-body" id="ticker">
        <li class="list-group-item all-trend-font">Dove <span class="pull-right">xx,xx,xxx</span></li>
        <li class="list-group-item all-trend-font">Cornetto <span class="pull-right">xx,xx,xxx</span></li>
        <li class="list-group-item all-trend-font">Rexona <span class="pull-right">xx,xx,xxx</span></li>
        <li class="list-group-item all-trend-font">Rexona <span class="pull-right">xx,xx,xxx</span></li>
        <li class="list-group-item all-trend-font">Rexona <span class="pull-right">xx,xx,xxx</span></li>
      </div>-->
      <div class="slide3-body">
        <div id="chart_facebook" class="chart">
          <ul id="numbers">
            <?php
			  for($i=0; $i<4; $i++){
				  echo '<li><span>'.(($brandsFbData_W1[0]['doi']*(4-$i))/4).'k</span></li>';
			  } ?>
          </ul>
          <ul id="bars">
            <div class="chart_detail"><i class="cross-trend-icon fa fa-facebook graphfb"></i>&nbsp;&nbsp;Organic Impression
              <marquee class="marquee-border" scrolldelay="200">
              <p class="chart-marquee">Data range: 25-05-2015 till 31-05-2015 | Comparing data of last two weeks.</p>
              </marquee>
            </div>
            <?php
			for($i=0; $i<7; $i++){ ?>
            <li>
              <div data-percentage="<?php echo intval(($brandsFbData_W1[$i]['doi']/$brandsFbData_W1[0]['doi'])*100); ?>" 
              		data-profitnloss="<?php echo $brandsFbProfitNLoss[$i]; ?>" class="bar <?php echo $brandsFbProfitNLossClass[$i]; ?>">
                <div class="bar-value"><?php echo $brandsFbData_W1[$i]['doi'].'k'; ?></div>
              </div>
              <span><img src="<?php echo get_logo($brandsFbData_W1[$i]['brand']); ?>"></span></li>
            <?php
			} ?>
          </ul>
        </div>
        <div id="chart_twitter" class="chart">
          <ul id="numbers">
            <?php
			  for($i=0; $i<4; $i++){
				  echo '<li><span>'.number_format((float)(($brandsTwData_W1[0]['doi']*(4-$i))/4), 1, '.', '').'</span></li>';
			  } ?>
          </ul>
          <ul id="bars">
            <div class="chart_detail"><i class="cross-trend-icon fa fa-twitter graphtweet" id="show_tw_chart"></i>&nbsp;&nbsp;Engagement Rate
              <marquee class="marquee-border" scrolldelay="200">
              <p class="chart-marquee">Data range: 25-05-2015 till 31-05-2015 | Comparing data of last two weeks.</p>
              </marquee>
            </div>
            <?php
			for($i=0; $i<7; $i++){ ?>
            <li>
              <div data-percentage="<?php echo ($brandsTwData_W1[$i]['doi']/$brandsTwData_W1[0]['doi'])*100; ?>" 
              		data-profitnloss="<?php echo $brandsTwProfitNLoss[$i]; ?>" class="bar <?php echo $brandsTwProfitNLossClass[$i]; ?>">
                    <div class="bar-value"><?php echo number_format((float)$brandsTwData_W1[$i]['doi'], 2, '.', ''); ?></div></div>
              <span><img src="<?php echo get_logo($brandsTwData_W1[$i]['brand']); ?>"></span></li>
            <?php 
			} ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
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
