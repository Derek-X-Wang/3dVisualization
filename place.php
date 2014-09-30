<?php

if($_GET['id']){
//	echo "Id is ".$_GET['id'];
}else{
	header('Location: home.php');
}



?>
<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>3dVisualization</title>
		<?php include 'config/main_css.php'; ?>
		<?php include 'config/main_js.php'; ?>
		<style>
			body {
				font-family: Monospace;
				background-color: #FFFFFF;
				color: #fff;
				margin: 0px;
				overflow: hidden;
			}

		</style>
		
	</head>
	
	<body>
		
		<div id="info">
			<a href="http://threejs.org" target="_blank">three.js</a> -
			Jeep by Psionic, interior from
			<a href="http://assimp.sf.net" target="_blank">Assimp</a>
		</div>
		<script src="js/three.js"></script>

		<script src="js/three.min.js"></script>
		<script src="js/RequestAnimationFrame.js"></script>
		<script src="js/Detector.js"></script>
		<script src="js/TrackballControls.js"></script>
		<script src="js/MTLLoader.js"></script>
		<script src="js/OBJMTLLoader.js"></script>
		<script src="js/stats.min.js"></script>


        <script>
			if (!Detector.webgl)
				Detector.addGetWebGLMessage();

			var container, stats;
			var camera, scene, renderer;
			var mouseX = 0, mouseY = 0;

			var windowHalfX = window.innerWidth / 2;
			var windowHalfY = window.innerHeight / 2;

			init();
			animate();

			function init() {

				container = document.createElement('div');
				document.body.appendChild(container);

				camera = new THREE.PerspectiveCamera(30, window.innerWidth / window.innerHeight, .001, 100);
				camera.position.z = 1.75;

				controls = new THREE.TrackballControls(camera);
				controls.rotateSpeed = 1.0;
				controls.zoomSpeed = 1;
				controls.panSpeed = 2;
				controls.noZoom = false;
				controls.noPan = false;
				controls.staticMoving = false;
				controls.dynamicDampingFactor = 0.05;

				scene = new THREE.Scene();
				scene.fog = new THREE.Fog(0xffffff);

				var ambient = new THREE.AmbientLight(0x888888);
				scene.add(ambient);

				var directionalLight = new THREE.DirectionalLight(0x002222);
				directionalLight.position.set(-500, 50, 100);
				scene.add(directionalLight);

				var loader = new THREE.OBJMTLLoader();
				//models/ex3dDemo/REdiningroom.obj
				loader.load('models/DiningRmSet/DiningRmSet01.obj', 'models/DiningRmSet/DiningRmSet01.mtl', function(object) {

					object.position.y = -.4;
					object.position.x = -1.8;
					;

					scene.add(object);

				});

				// lights
				var mainLight = new THREE.PointLight(0xffffff, 1.5, 1000);
				mainLight.position.y = 60;
				scene.add(mainLight);

				var greenLight = new THREE.PointLight(0xffffff, 0.25, 1200);
				greenLight.position.set(550, 50, 0);
				scene.add(greenLight);

				renderer = new THREE.WebGLRenderer({
					alpha : true,
					antialias : true
				});
				renderer.setSize(window.innerWidth, window.innerHeight);
				container.appendChild(renderer.domElement);
			}

			/*** The Loop ***/
			function animate() {

				requestAnimationFrame(animate);

				controls.update();
				camera.lookAt(scene.position);
				renderer.render(scene, camera);
			}

		</script>





		
	</body>
</html>