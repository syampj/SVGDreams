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
		
	
	$screenOffsetX = 0.8*$svgObj->width;	
	$screenOffsetY = 0.8*$svgObj->height;	
		
	$circleObj = new Circle("circle_1");
		$circleObj->radius = 10;
		$circleObj->fill = "#3b5998";
		$circleObj->style = "fill-opacity:0.8;";
		
	// clone 20 more circles: 	
	for($j = 1; $j <= 50; $j++){
		$objName = "circleObj".$j;
		$$objName = clone $circleObj;
		$$objName->id = $j;
		
		$animateMotionObj = new AnimateMotion();
			$animateMotionObj->setInfiniteLoop();
			$animateMotionObj->duration = "100s";
		
			
		for($i = 1; $i<=20; $i++){
			if($i == 1){ $start = array(rand(0, $screenOffsetX), rand(0, $screenOffsetY)); }else{ $start = $end; }
			$middle = array(rand(0, $screenOffsetX), rand(0, $screenOffsetY));
			$end = array(rand(0, $screenOffsetX), rand(0, $screenOffsetY));
			
			$animateMotionObj->moveTo(250, 50);
			$animateMotionObj->curveTo($start, $middle, $end);
			
		}
		
		// add animation to circle:
		$$objName->addComponent($animateMotionObj);
		
		$gObj->addComponent($$objName);
		
	}
	
				
	
	$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "shapes_circle_2";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
