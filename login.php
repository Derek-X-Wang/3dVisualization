<?php

//Start the session:
session_start();

if(isset($_SESSION['username'])){
	header('Location: home.php');
}

include 'class/database.php';
$db = new database('ib3d','23231785','intbridge_3dvisualization');

if($_POST){
	
	$cup = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = SHA1('$_POST[password]')";
	$re = mysqli_query($dbc, $cup);
	
	if(mysqli_num_rows($re) == 1){
		
		$_SESSION['username'] = $_POST['email'];
		header('Location: home.php');
		
	}
	
	
}

?>


<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LogIn</title>
		<?php include 'config/main_css.php'; ?>
		<?php include 'config/main_js.php'; ?>
		
		<link href="css/login.css" rel="stylesheet">
		
	</head>
	
	<body>

		<div class="container">
			
			<form class="form-signin" action="login.php" method="post" role="form">
				<h2 class="form-signin-heading">Please sign in</h2>
				<input type="email" class="form-control" name="email" placeholder="Email address" required autofocus>
				<input type="password" class="form-control" name="password" placeholder="Password" required>
				<label class="checkbox">
					<input type="checkbox" value="remember-me"> Remember me
				</label>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>
			
		</div> <!-- /container -->

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