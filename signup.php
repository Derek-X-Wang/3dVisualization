<?php

//Start the session:
session_start();

include 'config/login_setup.php';

if($_POST){
	
	$insertInfo = "INSERT INTO page (titile, label, header, body) VALUES ('$_POST[title]', '$_POST[label]', '$_POST[header]', '$_POST[body]')";
	$r = mysqli_query($dbc, $insertInfo);
	
	if($r){
		
		echo "<p>Page added<p>";
		
	}else{
		echo "<p>Page could not be added because: ".mysqli_error($dbc)."<p>";
		echo '<p>'.$q.'<p>';
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
		
		<style>
			body {
			  padding-top: 40px;
			  padding-bottom: 40px;
			}
			
			.form-signin {
			  max-width: 330px;
			  padding: 15px;
			  margin: 0 auto;
			}
			.form-signin .form-signin-heading,
			.form-signin .checkbox {
			  margin-bottom: 10px;
			}
			.form-signin .checkbox {
			  font-weight: normal;
			}
			.form-signin .form-control {
			  position: relative;
			  height: auto;
			  -webkit-box-sizing: border-box;
			     -moz-box-sizing: border-box;
			          box-sizing: border-box;
			  padding: 10px;
			  font-size: 16px;
			}
			.form-signin .form-control:focus {
			  z-index: 2;
			}
			.form-signin input[type="email"] {
			  margin-bottom: -1px;
			  border-bottom-right-radius: 0;
			  border-bottom-left-radius: 0;
			}
			.form-signin input[type="password"] {
			  margin-bottom: 10px;
			  border-top-left-radius: 0;
			  border-top-right-radius: 0;
			}
			
		</style>
		
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

		
	</body>
</html>