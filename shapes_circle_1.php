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
		$circleObj->radius = 10;
		$circleObj->centerX = 20;
		$circleObj->centerY = 20;
		$circleObj->fill = "#3b5998";
		
	$screenOffsetX = $svgObj->width*(0.8);
	$screenOffsetY = $svgObj->height*(0.8);		
	
	$animateMotionObj = new AnimateMotion();
		$animateMotionObj->setInfiniteLoop();
		$animateMotionObj->duration = "400s";
		$animateMotionObj->moveTo(0, 0);
		
		for($i = 1; $i<=200; $i++){
			if($i == 1){	
				$start = array(rand(0, $screenOffsetX), rand(0, $screenOffsetY));
			}else{
				$start = $end;
			}
			
			$middle = array(rand(0, $screenOffsetX), rand(0, $screenOffsetY));
			$end = array(rand(0, $screenOffsetX), rand(0, $screenOffsetY));
			$animateMotionObj->curveTo($start, $middle, $end);
		}
		
			// add animation to circle:
			$circleObj->addComponent($animateMotionObj);
		
	
	$gObj->addComponent($circleObj);
	
	$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "shapes_circle_1";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
