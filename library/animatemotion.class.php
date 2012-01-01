<?php

	require_once("animateabstract.class.php");

	/*
	* AnimationMotion Class
	* See w3 documentation for more information: http://www.w3.org/TR/2001/REC-smil-animation-20010904/#TimingAndRealWorldClockTime
	*/

	class AnimateMotion extends AnimateAbstract{
		
		function __construct(){
			$this->animationType =  "animateMotion";
		}
		
		
		public function moveTo($x, $y){
			$this->path .= "M ".$x." ".$y." ";
		}
		
		public function lineTo($x, $y){
			$this->path .= "L ".$x." ".$y." ";
		}
		
		public function curveTo($startPoints, $middlePoints, $endPoints){
			$this->path .= "C ".$startPoints[0]." ".$startPoints[1]." ".$middlePoints[0]." ".$middlePoints[1]." ".$endPoints[0]." ".$endPoints[1]." ";
		}
		
		
		
	}

?>