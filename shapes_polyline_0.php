<?php

	require_once("library/svg.class.php");
	require_once("library/group.class.php");
	require_once("library/polyline.class.php");
	require_once("library/animatetransform.class.php");
	
	$svgObj = new Svg();
	$svgObj->width = 300;
	$svgObj->height = 300;	
		
	$gObj = new Group();
	
	$positionX = 10;
	$positionY = 10;
	$moveX = 290;
	$moveY = 290;
	
	for($i = 0; $i <= 15; $i++){
		$moveX = $moveX - 10;
		$positionX = $positionX + $moveX;
		$points .= $positionX.",".$positionY." ";
		$moveY = $moveY - 10;
		$positionY = $positionY + $moveY;
		$points .= $positionX.",".$positionY." ";
		$moveX = $moveX - 10;
		$positionX = $positionX - $moveX;
		$points .= $positionX.",".$positionY." ";
		$moveY = $moveY - 10;
		$positionY = $positionY - $moveY;
		$points .= $positionX.",".$positionY." ";
		
	}
	
	$polylineObj = new Polyline("Polyline1");
		$polylineObj->strokeWidth = "3";
		$polylineObj->points = $points;
		$polylineObj->stroke = "#3b5998";
		$polylineObj->fill = "#fff";
	
	$gObj->addComponent($polylineObj);
	$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "shapes_polyline_0";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
