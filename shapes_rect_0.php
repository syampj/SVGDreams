<?php

	require_once("library/svg.class.php");
	require_once("library/group.class.php");
	require_once("library/rect.class.php");
	require_once("library/animatecolor.class.php");
	
	$svgObj = new Svg();
		$svgObj->width = 140;
		$svgObj->height = 140;	
		
		$gObj = new Group();
		
		$rectObj = new Rect("Rect_1");
			$rectObj->setCoordinates(20, 20);
			$rectObj->setSize(100, 100);
			$rectObj->fill = "#3b5998";
		
		$fadeIn = new AnimateColor();
			$fadeIn->setInfiniteLoop();
			$fadeIn->duration = "5s";
			$fadeIn->from = "#3b5998";
			$fadeIn->to = "#fff";
			
			$rectObj->addComponent($fadeIn);	
			
			$gObj->addComponent($rectObj);
			$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "shapes_rect_0";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
