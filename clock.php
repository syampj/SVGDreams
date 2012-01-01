<?php

	require_once("library/svg.class.php");
	require_once("library/group.class.php");
	require_once("library/svgajaxadapter.class.php");
	require_once("library/text.class.php");
	
	$svgObj = new Svg();
		$svgObj->width = 650;
		$svgObj->height = 200;	
		
		$svgObj->instructionStackConnectorFlag = true;
			
	$gObj = new Group();
		
	
	$svgAjaxAdapter = new SvgAjaxAdapter();
		$svgAjaxAdapter->requestURL = "ajax/clock.php";
		$svgAjaxAdapter->event = "onclick";
		$svgAjaxAdapter->jsFunctionName = "pickCircles";	
		$svgAjaxAdapter->clockActive = true;
		
		$svgObj->addJS($svgAjaxAdapter->renderJS());
		
	$svgAjaxAdapter = new SvgAjaxAdapter();
		$svgAjaxAdapter->requestURL = "ajax/circle_clicked.php";
		$svgAjaxAdapter->jsFunctionName = "circleClicked";	
		$svgAjaxAdapter->clockActive = false;
		
		$svgObj->addJS($svgAjaxAdapter->renderJS());
		
	$textObj = new Text("time_counter"); $textObj->setCoordinates(5, 20); $textObj->setTextFont(15, 20, "middle"); $textObj->addText("0");
		$gObj->addComponent($textObj);
		
	$textObj2 = new Text("time_counter_text"); $textObj2->setCoordinates(30, 20); $textObj2->setTextFont(15, 75, "middle"); $textObj2->addText("steps | ");
		$gObj->addComponent($textObj2);
		
	$textObj3 = new Text("points"); $textObj3->setCoordinates(120, 20); $textObj3->setTextFont(15, 20, "middle"); $textObj3->addText(0);
		$gObj->addComponent($textObj3);
		
	$textObj4 = new Text("points_text"); $textObj4->setCoordinates(140, 20); $textObj4->setTextFont(15, 75, "middle"); $textObj4->addText("points | ");
		$gObj->addComponent($textObj4);	
	
	$textObj5 = new Text("level_text"); $textObj5->setCoordinates(240, 20); $textObj5->setTextFont(15, 50, "middle"); $textObj5->addText("Level: ");
		$gObj->addComponent($textObj5);	
		
	$textObj6 = new Text("level"); $textObj6->setCoordinates(290, 20); $textObj6->setTextFont(15, 20, "middle"); $textObj6->addText(0);
		$gObj->addComponent($textObj6);		
	
	$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "clock_1";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>
<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
