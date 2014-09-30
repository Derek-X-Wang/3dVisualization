<?php

include '../class/database.php';
$db = new database('ib3d','23231785','intbridge_3dvisualization');
if(isset($_POST['id'])) {
	//$dbc = mysqli_connect('localhost', 'ib3d', '23231785', 'intbridge_3dvisualization') OR die('Could not connect because:'.mysqli_error());
	//print_r($_POST);
	//$q = "SELECT id FROM places WHERE BINARY id = '$_POST[id]'";
	//$r = mysqli_query($dbc, $q) or die('error: '.mysqli_error($dbc));
	//echo mysqli_num_rows($r);
	//if(mysqli_num_rows($r) == 1){
	if($db->verifyPlaceID($_POST['id'])){	
		echo "ok";
	}else{
		echo "error";
	}
	
}

?>