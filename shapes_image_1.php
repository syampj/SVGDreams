<?php

	require_once("library/svg.class.php");
	require_once("library/group.class.php");
	require_once("library/image.class.php");
	require_once("library/rect.class.php");
	require_once("library/animatetransform.class.php");
	
	$svgObj = new Svg();
		$svgObj->width = 500;
		$svgObj->height = 100;	
		
		$svgObj->instructionStackConnectorFlag = false;
			
	$gObj = new Group();
		
	$rectObj = new Rect("sea");
		$rectObj->x = 0;
		$rectObj->y = 0;
		$rectObj->fill = "blue";
		$rectObj->width = 500;
		$rectObj->height = 100;
		$rectObj->style = "fill-opacity:0.3;";
	
		$gObj->addComponent($rectObj);	
		
	// images to use in the animation:
	$images = array("fish.png", "fish2.png", "fish3.png", "starfish.png");
	
	for($i = 1; $i <= 10; $i++){
		foreach($images AS $key=>$imageName){
		
			$point1x = rand(500, 750);
			$point1y = rand(0, 100);
			$point2x = rand(-250, 0);
			$point2y = rand(0, 100);
		
			$imageObj = new Image("fish");
				$imageObj->source = "images/".$imageName;
				$imageObj->width = 40;
				$imageObj->height = 40;
			
			$animationTransform = new AnimateTransform();
				$animationTransform->setInfiniteLoop();
				$animationTransform->translate(array($point1x,$point1y), array($point2x, $point2y));
				$animationTransform->duration = rand(15, 30);
				
				$imageObj->addComponent($animationTransform);
				$gObj->addComponent($imageObj);

		}
	}
	
	$images = array("fish_reverse.png", "fish2_reverse.png", "fish3_reverse.png", "starfish.png");
	
	for($i = 1; $i <= 10; $i++){
		foreach($images AS $key=>$imageName){
		
			$point1x = rand(-250, 0);
			$point1y = rand(0, 100);
			$point2x = rand(500, 750);
			$point2y = rand(0, 100);
		
			$imageObj = new Image("fish");
				$imageObj->source = "images/".$imageName;
				$imageObj->width = 40;
				$imageObj->height = 40;
			
			$animationTransform = new AnimateTransform();
				$animationTransform->setInfiniteLoop();
				$animationTransform->translate(array($point1x,$point1y), array($point2x, $point2y));
				$animationTransform->duration = rand(15, 30);
				
				$imageObj->addComponent($animationTransform);
				$gObj->addComponent($imageObj);

		}
	}
		
	
	
	$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "shapes_image_1";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
