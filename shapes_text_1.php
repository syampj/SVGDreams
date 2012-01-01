<?php

	require_once("library/svg.class.php");
	require_once("library/group.class.php");
	require_once("library/text.class.php");
	
	$rotationAngles = array();
	for($i = 1; $i <= 360; $i = $i +30){
		$rotationAngles[] = $i;
	}
	
	$svgObj = new Svg();
		$svgObj->width = 400;
		$svgObj->height = 40;	
		
		$gObj = new Group();
		
		$textObj = new Text("text_1");
			$textObj->setCoordinates(20, 20);
			$textObj->setTextFont(20, 300, "middle");
			$textObj->addText("Sample text rotating");
			$textObj->setRotation($rotationAngles);
		
			$gObj->addComponent($textObj);
			$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "shapes_text_1";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
