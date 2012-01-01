<?php

	require_once("library/svg.class.php");
	require_once("library/group.class.php");
	require_once("library/line.class.php");
	require_once("library/animatecolor.class.php");
	
	$svgObj = new Svg();
	$svgObj->width = 250;
	$svgObj->height = 80;	
		
	$gObj = new Group();
	
	$lineObj = new Line("line1");
	$lineObj->setCoordinates(10, 240, 10, 70);
	$lineObj->stroke = "#000";
	
	$gObj->addComponent($lineObj);
	$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "shapes_line_0";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
