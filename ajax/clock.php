<?php
	session_start();

	require_once("../library/animatetransform.class.php");
	require_once("../library/circle.class.php");
	require_once("../library/svgajaxadapter.class.php");
	
	$loopCount = intval($_GET["loopCount"]);
	
	$targetId = md5(microtime());
	
	if($loopCount % 10 == 0){
		$_SESSION["level"]++; 
	}
	
	if($loopCount > 1){
		$_SESSION["itemsInScene"][$loopCount] = $targetId;
	}else{
		unset($_SESSION["itemsInScene"]);
		$_SESSION["itemsInScene"][1] = $targetId;

		// init points and level:
		$_SESSION["points"] = 0;	
		$_SESSION["level"] = 1;	
	}
	
	$circleObj = new Circle($targetId);
		$circleObj->radius = 25;
		$circleObj->centerX = rand(20, 550);
		$circleObj->centerY = rand(20, 150);
		$circleObj->fill = "#3b5998";
		$circleObj->stroke = "black";	
		
		$adapterObj = new SvgAjaxAdapter();
			$adapterObj->insert($circleObj);
		
			if(isset($_SESSION["points"])){$points = $_SESSION["points"];}else{$points = 0;}
			if(isset($_SESSION["level"])){$level = $_SESSION["level"];}else{$level = 0; $_SESSION["level"] = 1;}
			
			$adapterObj->addText("time_counter", $loopCount % 10);
			$adapterObj->addText("points", $points);
			$adapterObj->addText("level", $level);
		
			// new frequency: 
			if(1000 - $level*50 > 200){$newFrequency = 1000 - $level*50;}else{$newFrequency = 200;}
		
			$adapterObj->bindEvent($targetId, "onclick", "circleClicked();");
		
			if($loopCount > 1){
				$adapterObj->delete($_SESSION["itemsInScene"][$loopCount - 1]);
			}
		
			echo $adapterObj->ajaxResponse();
			
	$_SESSION["count_seconds"]++; 
	
?>