<?php

	require_once("library/svg.class.php");
	require_once("library/group.class.php");
	require_once("library/ellipse.class.php");
	require_once("library/animatecolor.class.php");
	
	$svgObj = new Svg();
		$svgObj->width = 250;
		$svgObj->height = 80;	
		
		$gObj = new Group();
		
		$ellipse1Obj = new Ellipse("ellipse_1");
			$ellipse1Obj->setCoordinates(75, 40);
			$ellipse1Obj->setRadius(75, 40);
			$ellipse1Obj->fill = "yellow";
			$ellipse1Obj->style = "opacity: 0.5;";
			
		$ellipse2Obj = new Ellipse("ellipse_1");
			$ellipse2Obj->setCoordinates(175, 40);
			$ellipse2Obj->setRadius(75, 40);
			$ellipse2Obj->fill = "#00BFFF";
			$ellipse2Obj->style = "opacity: 0.5;";
			
		$yellow2blue = new AnimateColor();
			$yellow2blue->setInfiniteLoop();
			$yellow2blue->duration = "10s";
			$yellow2blue->from = "yellow";
			$yellow2blue->to = "#00BFFF";
			
		$blue2yellow = clone $yellow2blue;	
			$blue2yellow->from = "#00BFFF";
			$blue2yellow->to = "yellow";
			
			$ellipse1Obj->addComponent($yellow2blue);
			$ellipse2Obj->addComponent($blue2yellow);
			
			$gObj->addComponent($ellipse1Obj);
			$gObj->addComponent($ellipse2Obj);
			
			$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "shapes_ellipse_0";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
