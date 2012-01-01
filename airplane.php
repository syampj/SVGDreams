<?php

	require_once("library/svg.class.php");
	require_once("library/group.class.php");
	require_once("library/image.class.php");
	require_once("library/animatetransform.class.php");
	require_once("library/animatemotion.class.php");
	require_once("library/svgajaxadapter.class.php");
	
	$svgObj = new Svg();
		$svgObj->width = 500;
		$svgObj->height = 211;	
		
		// we don't need now:
		$svgObj->instructionStackConnectorFlag = false;
			
	$gObj = new Group();

		$imageObj = new Image("map");
			$imageObj->source = "images/map.png";
			$imageObj->setCoordinates(0,0);
			$imageObj->setSize(500, 211);
			
			$gObj->addComponent($imageObj);
	
		for($i = 1; $i <= 100; $i++){
			$planeId = "plane_".$i;
			$imageObj = new Image($planeId);
				$imageObj->source = "images/plane.png";
				// $imageObj->setCoordinates(548, 112);
				$imageObj->setSize(15, 15);
				
					// add rotation animation: 
					$atObj = new AnimateTransform();
							$atObj->rotate(0, rand(0 , 180));
							$atObj->duration = "10s";
							$atObj->begin = "0s";
							$atObj->end = "10s";
							
							//$imageObj->addComponent($atObj);
				
					// add move from south to north:
						
					$halfX = intval($svgObj->width/2);
					$halfY = intval($svgObj->height/2);						
						
					$offsetX = rand($svgObj->width, $svgObj->width + 10);	
					$offsetY = rand(0, $svgObj->height);	
						
					$diffX = rand(0, $halfX);	
					$diffY = rand(0, $svgObj->height);					
					
					$startPoints = array($offsetX, $offsetY);
					$middlePoints = array($halfX, $halfY); 
					$endPoints	 = array(0, $diffY);
						
					$motionObject = new AnimateMotion();
						$motionObject->moveTo($offsetX, $offsetY);
						$motionObject->curveTo($startPoints, $middlePoints, $endPoints);
						$motionObject->duration = rand(20, 100)."s";
						$motionObject->setInfiniteLoop();
						
						$imageObj->addComponent($motionObject);
				
				$gObj->addComponent($imageObj);
				
		}	
		
		for($i = 100; $i <= 200; $i++){
			$planeId = "plane_".$i;
			$imageObj = new Image($planeId);
				$imageObj->source = "images/plane_reverse.png";
				// $imageObj->setCoordinates(548, 112);
				$imageObj->setSize(15, 15);
				
					// add rotation animation: 
					$atObj = new AnimateTransform();
							$atObj->rotate(0, rand(0 , 180));
							$atObj->duration = "10s";
							$atObj->begin = "0s";
							$atObj->end = "10s";
							
							//$imageObj->addComponent($atObj);
				
					// add move from south to north:
						
					$halfX = intval($svgObj->width/2);
					$halfY = intval($svgObj->height/2);						
						
					$offsetX = rand($halfX, $svgObj->width);	
					$offsetY = rand(0, $svgObj->height);	
						
					$diffX = rand(0, $halfX);	
					$diffY = rand(0, $svgObj->height);					
					
					$startPoints = array(0, $diffY);
					$middlePoints = array($halfX, $halfY); 
					$endPoints	 = array($svgObj->width + 10, $offsetY);
						
					$motionObject = new AnimateMotion();
						$motionObject->moveTo(0, $diffY);
						$motionObject->curveTo($startPoints, $middlePoints, $endPoints);
						$motionObject->duration = rand(20, 100)."s";
						$motionObject->setInfiniteLoop();
						$motionObject->rotate = "auto-reverse";
						
						$imageObj->addComponent($motionObject);
				
				$gObj->addComponent($imageObj);
				
		}	
	
	$svgObj->addComponent($gObj);
	
	$svgObj->fileName = "airplane";
	$svgObj->saveFile();
	
?>
<script src="js/jquery-1.6.4.min.js"></script>
<script src="js/svgdreams-ajax.js"></script>
<object id="<?php echo $svgObj->fileName; ?>" data="<?php echo $svgObj->fileName; ?>.svg" type="image/svg+xml"></object>
