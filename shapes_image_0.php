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
		
	
	$imageObj = new Image("fish");
		$imageObj->source = "images/fish.png";
		$imageObj->width = 40;
		$imageObj->height = 40;
	
	$animationTransform = new AnimateTransform();
		$animationTransform->setInfiniteLoop();
		$animationTransform->translate(array(500, 50), array(0, 50));
		$animationTransform->duration = "10s";
		
		$imageObj->addComponent($animationTransform);
		$gObj->addComponent($imageObj);

		
		
	
	
	$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "shapes_image_0";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
