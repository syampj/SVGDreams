<?php

	require_once("library/svg.class.php");
	require_once("library/text.class.php");
	require_once("library/group.class.php");
	
	$svgObj = new Svg();
		$svgObj->width = 400;
		$svgObj->height = 250;	
		
		$svgObj->instructionStackConnectorInterval = 100;
		$svgObj->instructionStackConnectorFlag = true;
		
		$textId = md5(microtime());
		$textObj = new Text($textId);
			$textObj->setCoordinates(5, 20);
			$textObj->setTextFont(20, 200, "middle");
			$textObj->addText("Press letters");
		
		$gObj = new Group();
			$gObj->addComponent($textObj);
		
		$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "keyboard_1";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>
<script src="js/svgdreams-keyboard.js"></script>
<script>keyboardAjaxRequestUrl = "ajax/keyboard.php";</script>

<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
