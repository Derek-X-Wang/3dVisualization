<?php 

//Start the session:
session_start();

//if(!isset($_SESSION['username'])){
//	header('Location: login.php');
//}



?>

<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>
		<?php include 'config/main_css.php'; ?>
		<?php include 'config/main_js.php'; ?>
		<!--Does not work
			<script src="js/nav-fix.js"></script>-->
		
		<style type="text/css">
	      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;width: 100%;}
	      .fill {
		    top: 50px;
		    left: 0;
		    right: 0;
		    bottom: 0;
		    position: absolute;
		    width: 100%;
		    height: auto;
		  }
		
		  .navbar {
		        margin-bottom: 0;
		  }
		  /* working code to adjust the height of nav, save for later
		  .navbar { min-height:40px; height: 40px; }
		  .navbar .navbar-brand{ padding: 0px 12px;font-size: 16px;line-height: 40px; }
		  .navbar .navbar-nav > li > a {  padding-top: 0px; padding-bottom: 0px; line-height: 40px; }
		  */
			.controls {
				margin-top: 16px;
				border: 1px solid transparent;
				border-radius: 2px 0 0 2px;
				box-sizing: border-box;
				-moz-box-sizing: border-box;
				height: 32px;
				outline: none;
				box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
			}

			#pac-input {
				background-color: #fff;
				padding: 0 11px 0 13px;
				width: 400px;
				font-family: Roboto;
				font-size: 15px;
				font-weight: 300;
				text-overflow: ellipsis;
			}

			#pac-input:focus {
				border-color: #4d90fe;
				margin-left: -1px;
				padding-left: 14px; /* Regular padding-left + 1. */
				width: 401px;
			}

			.pac-container {
				font-family: Roboto;
			}

			#type-selector {
				color: #fff;
				background-color: #4d90fe;
				padding: 5px 11px 0px 11px;
			}

			#type-selector label {
				font-family: Roboto;
				font-size: 13px;
				font-weight: 300;
			}
		</style>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5sn0TYIA1bPZ-ZQs6sFlew8KhFr-tEIU"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
				
		<script type="text/javascript">
			function initialize() {
				
				function bindMarker(marker, info) {
				    google.maps.event.addListener(marker, "click", function() {
				        info.open(map, marker);
				    });
				}
				
				function checkID(id){
					console.log('In checkID, id is'+id);
					return $.ajax({
					  type: "POST",
					  url: "php/mapPinHelper.php",
					  async: false,//many people mention that this is a bad solution, but no better idea currently; change later
					  data: {'id': id}
					});
				}
				
				var map = new google.maps.Map(document.getElementById('map-canvas'), {});
				var markers = [];

				var defaultBounds = new google.maps.LatLngBounds(new google.maps.LatLng(34.3925629,-119.892547), new google.maps.LatLng(34.4353629,-119.805347));
				map.fitBounds(defaultBounds);

				// Create the search box and link it to the UI element.
				var input = /** @type {HTMLInputElement} */(
					document.getElementById('pac-input'));
				map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

				var searchBox = new google.maps.places.SearchBox(
				/** @type {HTMLInputElement} */(input));

				// Listen for the event fired when the user selects an item from the
				// pick list. Retrieve the matching places for that item.
				google.maps.event.addListener(searchBox, 'places_changed', function() {
					var places = searchBox.getPlaces();

					if (places.length == 0) {
						return;
					}
					for (var i = 0, marker; marker = markers[i]; i++) {
						marker.setMap(null);
					}

					// For each place, get the icon, place name, and location.
					markers = [];
					var bounds = new google.maps.LatLngBounds();
					for (var i = 0, place; place = places[i]; i++) {
						
						var defaultInfoWindowString = '<div><h3>Currently, NO DATA on this address.</h3><p><a href="index.php">Report Error!</a></p></div>';
						var imgURL = place.icon;
						checkID(place.place_id)
						.done(function(data) {
							console.log('In done, data is'+data);
						    if(data == "ok") {
						      	defaultInfoWindowString = '<div><h3><a href="place.php?id='+ place.place_id + '">Lets ENTER!</a></h3></div>';
						      	imgURL = "ico/housePointer.png";
						      	console.log('is ok');
							} else {
						        // Tell the user their password was bad
						        console.log('is not ok');
						    }
						})
						.fail(function(x) {
						    // Tell the user something bad happened
						    console.log('ajax failed');
						});
						
						console.log(place.place_id);
						var image = {
							url : imgURL,
							size : new google.maps.Size(71, 71),
							origin : new google.maps.Point(0, 0),
							anchor : new google.maps.Point(17, 34),
							scaledSize : new google.maps.Size(25, 25)
						};
						

						
						var infowindow = new google.maps.InfoWindow({
							content: defaultInfoWindowString
						});

						// Create a marker for each place.
						var marker = new google.maps.Marker({
							map : map,
							icon : image,
							title : place.name,
							position : place.geometry.location
						});
						
						// use this function to avoid infowindow overwrite
						bindMarker(marker, infowindow);

						markers.push(marker);

						bounds.extend(place.geometry.location);
					}

					map.fitBounds(bounds);
				});

				// Bias the SearchBox results towards places that are within the bounds of the
				// current map's viewport.
				google.maps.event.addListener(map, 'bounds_changed', function() {
					var bounds = map.getBounds();
					searchBox.setBounds(bounds);
				});

			}


			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
				
		
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
		      <ul class="nav navbar-nav">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		            <li class="divider"></li>
		            <li><a href="#">One more separated link</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		            <li class="divider"></li>
		            <li><a href="#">One more separated link</a></li>
		          </ul>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		      	<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		            <li class="divider"></li>
		            <li><a href="#">One more separated link</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div>
		</nav>
		
		<!-- Google Map
	    ================================================== -->
	    <div class="fill">
	    	<input id="pac-input" class="controls" type="text" placeholder="Search Box">
	    	<div id="map-canvas"></div>
		</div>
		
		
	</body>
</html>