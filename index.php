<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//$_SESSION['username'] = '';
session_destroy();
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

<style>
.pg-login {
}

.pg-login .jumbotron {
	width:80%;
	margin:0px auto;
	min-height:500px;
	height:auto;
	border-radius:0px 0px 20px 20px;
	padding-top:12%;
}

.login-form-top{margin-top:5%}

input, button {
	background:#71c4e6 !important;
	color:#fff !important;
	border:1px solid #2990cb !important;
	border-radius:0px !important;
	
}

input::-webkit-input-placeholder { 
    color:    #fff !important;
}
input::-moz-input-placeholder { 
    color:    #fff !important;
}
input::-ms-input-placeholder { 
    color:    #fff !important;
}

@media only screen and (max-width: 767px) {
    /* portrait phones */
	
.pg-login .jumbotron {
	width:80%;
	margin:0px auto;
	min-height:360px;
	height:auto;
	border-radius:0px 0px 20px 20px;
	padding-top:12%;
}

.login-form-top{margin-top:15%}

.img-login{  margin: 0 auto; width:70%}

}

@media only screen and (max-width: 991px) {
    /* phones */
	.login-form-top{margin-top:10%}

.img-login{  margin: 0 auto; width:70%}
}
</style>

</head>

<body>

<!-- Page Content -->
<div class="container pg-login"> 
  
  <!-- Jumbotron  -->
  <div class="jumbotron"> 
    
    <!-- Login Form -->
    <div class="row text-left container-youtube">
      <div class="col-xs-12 col-md-6"> <img src="img/loginscreenlogo.png" class="img-responsive img-login"> </div>
      <div class="col-xs-12 col-md-6 login-form-top">
        <form action="dashboard.php" method="post">
          <div class="form-group">
            <input type="username" class="form-control" id="exampleInputUsername" placeholder="Username" name="username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
          </div>
          <button type="submit" class="btn btn-default pull-right" name="submit">Login</button>
        </form>
      </div>
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
</body>
</html>
