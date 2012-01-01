<?php

	require_once("library/svg.class.php");
	require_once("library/image.class.php");
	require_once("library/text.class.php");
	require_once("library/group.class.php");
	
	$svgObj = new Svg();
		$svgObj->width = 400;
		$svgObj->height = 250;	
		
		$svgObj->instructionStackConnectorInterval = 100;
		$svgObj->instructionStackConnectorFlag = false;
		
		$imageId = "circle_to_control";
		
		$svgObj->keyboardTargetElementId = $imageId;
		
		$textId = md5(microtime());
		$textObj = new Text($textId);
			$textObj->setCoordinates(5, 20);
			$textObj->setTextFont(20, 200, "middle");
			$textObj->addText("Press arrows");
		
		$imageObj = new Image($imageId);
			$imageObj->source = "images/kspaceduel.png";
			$imageObj->setCoordinates(50, 50);
			$imageObj->setSize(100, 100);
		
		$gObj = new Group();
			
			$gObj->addComponent($textObj);
			$gObj->addComponent($imageObj);
		
			$svgObj->addComponent($gObj);
	
			$svgObj->fileName = "keyboard_arrows";
			$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>
<script src="js/svgdreams-keyboard.js"></script>
<script>
	keyboardAjaxInteraction = true; // set false if you don't want to send keyboard inputs directly to the ajax layer.
	activateArrows = true;
</script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
