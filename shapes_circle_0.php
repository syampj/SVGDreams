<?php

	require_once("library/svg.class.php");
	require_once("library/group.class.php");
	require_once("library/circle.class.php");
	require_once("library/animatemotion.class.php");
	
	$svgObj = new Svg();
		$svgObj->width = 500;
		$svgObj->height = 100;	
		
		$svgObj->instructionStackConnectorFlag = false;
			
	$gObj = new Group();
		
	$circleObj = new Circle("circle_1");
		$circleObj->radius = 25;
		$circleObj->centerX = 30;
		$circleObj->centerY = 30;
		$circleObj->fill = "#3b5998";
		$circleObj->stroke = "black";
		
	$animateMotionObj = new AnimateMotion();
		$animateMotionObj->setInfiniteLoop();
		$animateMotionObj->duration = "3s";
		$animateMotionObj->moveTo(30, 10);
		
		$start = array(30, 10);
		$middle = array(130, 70);
		$end = array(230, 10);
		
		$animateMotionObj->curveTo($start, $middle, $end);
		$animateMotionObj->curveTo($end, $middle, $start);
		
			// add animation to circle:
			$circleObj->addComponent($animateMotionObj);
		
	
	$gObj->addComponent($circleObj);
	
	$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "shapes_circle_0";
	$svgObj->saveFile();
	
?>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
