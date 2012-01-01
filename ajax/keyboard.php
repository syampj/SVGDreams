<?php

	require_once("../library/animatemotion.class.php");
	require_once("../library/text.class.php");
	require_once("../library/svgajaxadapter.class.php");
	// get the sent keyboard value (if you use this in a live project, don't forget to filter)
	$keyboardValue = $_GET["keyboard_value"];
		
	// arrow values
	$arrows = array("up", "down", "right", "left");
	
	$adapter = new SvgAjaxAdapter();
			
	if(!in_array($keyboardValue, $arrows)){
		
		$textId = md5(microtime());
		
		$textObj = new Text($textId);
			
			$textObj->setCoordinates(rand(40, 300), rand(40, 200));
			$textObj->setTextFont(20, 300, "middle");	
			
				$adapter->insert($textObj);
				
				$adapter->addText($textId, $keyboardValue);
		
	}
		
			echo $adapter->ajaxResponse();
	
?>