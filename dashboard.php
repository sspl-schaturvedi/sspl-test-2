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

<!-- Custom CSS -->
<link href="css/custom.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container"> 
  <!-- Navigation -->
  <nav class="navbar" role="navigation"> <ul class="pull-right logout">
        <li> <a href="logout.php" class="btn btn-default">Logout</a> </li>
      </ul>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <img class="logo" src="img/logo.png"> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    
    
    <!-- /.navbar-collapse --> 
  </nav>
</div>
<!-- /.container --> 

<!-- Page Content -->
<div class="container"> 
  
  <!-- Jumbotron  -->
  <div class="jumbotron"> 
    
    <!-- Google Trends -->
    
    <div class="row text-left container-google"> 
      <!-- 4:3 aspect ratio -->
      <div class="embed-responsive embed-responsive-4by3 google-trends-desktop">
        <iframe class="embed-responsive-item" src="http://www.google.com/trends/hottrends/visualize?nrow=2&ncol=5&pn=p3"></iframe>
      </div>
      <br/>
      <div class="embed-responsive embed-responsive-4by3 google-trends-tablet">
        <iframe class="embed-responsive-item" src="http://www.google.com/trends/hottrends/visualize?nrow=2&ncol=3&pn=p3"></iframe>
      </div>
      <br />
      <div class="embed-responsive embed-responsive-4by3 google-trends-mobile">
        <iframe class="embed-responsive-item" src="http://www.google.com/trends/hottrends/visualize?nrow=3&ncol=2&pn=p3"></iframe>
      </div>
    </div>
   
    
    <!-- YouTube Trends -->
    <div class="row text-left container-youtube">
    <div class="slider">
        <div class="slidernav" id="youtubeSlidernav3"></div>
        <div class="slidernav" id="youtubeSlidernav2"></div>
        <div class="slidernav" id="youtubeSlidernav1"></div>
      </div>
      <div class="col-xs-6 col-md-2"> <img src="img/youtube-trends-logo.png" class="img-responsive youtube-margin-bottom"> </div>
      <div class="col-xs-12 col-md-10">
        <div class="col-md-3 col-sm-6 youtube-margin-bottom single-trend">
          <div class="thumbnail"> <a href="#" target="_blank"><img src="http://placehold.it/800x500" alt=""></a> </div>
          <div class="caption">
            <p><a href="#" class="youtube-trend-title" target="_blank">Loading...</a></p>
            <p>by <span class="youtube-trend-author">...</span></p>
            <p><span class="youtube-trend-views">...</span> views</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 youtube-margin-bottom single-trend">
          <div class="thumbnail"> <a href="#" target="_blank"><img src="http://placehold.it/800x500" alt=""></a> </div>
          <div class="caption">
            <p><a href="#" class="youtube-trend-title" target="_blank">Loading...</a></p>
            <p>by <span class="youtube-trend-author">...</span></p>
            <p><span class="youtube-trend-views">...</span> views</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 youtube-margin-bottom single-trend">
          <div class="thumbnail"> <a href="#" target="_blank"><img src="http://placehold.it/800x500" alt=""></a> </div>
          <div class="caption">
            <p><a href="#" class="youtube-trend-title" target="_blank">Loading...</a></p>
            <p>by <span class="youtube-trend-author">...</span></p>
            <p><span class="youtube-trend-views">...</span> views</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 youtube-margin-bottom single-trend">
          <div class="thumbnail"> <a href="#" target="_blank"><img src="http://placehold.it/800x500" alt=""></a> </div>
          <div class="caption">
            <p><a href="#" class="youtube-trend-title" target="_blank">Loading...</a></p>
            <p>by <span class="youtube-trend-author">...</span></p>
            <p><span class="youtube-trend-views">...</span> views</p>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
    
  
    
    <!-- Twitter Trends -->
    <div class="row text-center container-twitter">
      <div class="col-xs-12 col-md-10">
        <div class="col-md-3 col-sm-6 twitter-first single-trend">
          <div class="caption">
            <p><a href="#" target="_blank"></a></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 single-trend">
          <div class="caption">
            <p><a href="#" target="_blank"></a></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 single-trend">
          <div class="caption">
            <p><a href="#" target="_blank"></a></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 single-trend">
          <div class="caption">
            <p><a href="#" target="_blank"></a></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 single-trend">
          <div class="caption">
            <p><a href="#" target="_blank"></a></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 single-trend">
          <div class="caption">
            <p><a href="#" target="_blank"></a></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 single-trend">
          <div class="caption">
            <p><a href="#" target="_blank"></a></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 single-trend">
          <div class="caption">
            <p><a href="#" target="_blank"></a></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 single-trend">
          <div class="caption">
            <p><a href="#" target="_blank"></a></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 single-trend">
          <div class="caption">
            <p><a href="#" target="_blank"></a></p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-2"> <img src="img/twitter-trends-logo.png" class="img-responsive twitter-img"> </div>
    </div>
    <!-- /.row -->
    
  </div>
  <!-- /.Jumbotron --> 
  
</div>
<!-- /.container --> 

<!-- jQuery --> 
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>

<!-- Custom JS -->
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
