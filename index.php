<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Project1_IntBridge_3dVisualization_Summer2014</title>
		<?php include 'config/main_css.php'; ?>
		<?php include 'config/main_js.php'; ?>
		<link href="css/index-cover.css" rel="stylesheet">	
	
	</head>
	
	<body>
		
		<!-- Navbar
	    ================================================== -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		  <div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Brand</a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		      	<li class="active"><a href="#">Link</a></li>
		        <li><a href="#">Link</a></li>
		        <li><a href="#">Link</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div>
		</nav>
		
          <!-- Carousel
	    ================================================== -->
	    <div id="myCarousel" class="carousel slide" data-ride="carousel">
	      <!-- Indicators -->
	      <ol class="carousel-indicators">
	        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	        <li data-target="#myCarousel" data-slide-to="1"></li>
	        <li data-target="#myCarousel" data-slide-to="2"></li>
	      </ol>
	      <div class="carousel-inner">
	        <div class="item active">
	          <img class="fill" src="img/natural_wallpaper1.jpg" alt="First slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Example headline.</h1>
	              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
	              <p><a class="btn btn-lg btn-primary" href="login.php" role="button">Sign up today</a></p>
	            </div>
	          </div>
	        </div>	        
	        <div class="item">
	          <img class="fill" src="img/Nature-wallpaper2.jpg" alt="Second slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Another example headline.</h1>
	              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	              <p><a class="btn btn-lg btn-primary" href="login.php" role="button">Learn more</a></p>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="fill" src="img/Nature-wallpaper-3.jpg" alt="Third slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>One more for good measure.</h1>
	              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	              <p><a class="btn btn-lg btn-primary" href="login.php" role="button">Browse gallery</a></p>
	            </div>
	          </div>
	        </div>
	      </div>
	      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	    </div><!-- /.carousel -->
	
		<!-- footer
	    ================================================== -->
		<div class="footer-bar">
	
		    <div class="footer">
		        <ul>
		            <li><a href="index.php">Home</a></li>
		            <li><a href="#" target="_blank">Privacy &amp; Terms</a></li>
		            <li><a href="http://www.google.com/support/accounts?hl=en" target="_blank">Help</a></li>
		        </ul>
		        <div>
		            <span class="lang-chooser-wrap">
		                <label for="lang-chooser"><i class="fa fa-language fa-lg"></i></label>
		                <select class="lang-chooser" name="lang-chooser">
		                    <option value="en"selected="selected">English (United States)</option>
		                    <option value="zh-CN">简体中文</option>
		                    <option value="zh-TW">繁體中文</option>
		                </select>
		            </span>
		        </div>
		    </div>
	
		</div>
		
	</body>
</html>