<?php

	require_once("library/svg.class.php");
	require_once("library/group.class.php");
	require_once("library/polygon.class.php");
	require_once("library/animatetransform.class.php");
	
	$svgObj = new Svg();
	$svgObj->width = 300;
	$svgObj->height = 300;	
		
	$gObj = new Group();
	
	$polygonObj = new Polygon("polygon1");
		$polygonObj->strokeWidth = "3";
		$polygonObj->points = "150,75  179,161 269,161 197,215 223,301 150,250 77,301 103,215 31,161 121,161";
		$polygonObj->stroke = "#3b5998";
		$polygonObj->fill = "#fff";
	
		$animateTransform = new AnimateTransform();
			$animateTransform->setInfiniteLoop();
			$animateTransform->duration = "5s";
			$animateTransform->begin = "0";
			$animateTransform->end = "10s";
			$animateTransform->scale(0.1, 1);
			
	
	$polygonObj->addComponent($animateTransform);
	
	$gObj->addComponent($polygonObj);
	$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "shapes_polygon_0";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
