<?php

	require_once("animateabstract.class.php");

	/*
	* AnimateTransform Class
	* See w3 documentation for more information: http://www.w3.org/TR/2001/REC-smil-animation-20010904/#TimingAndRealWorldClockTime
	* Also see http://www.w3.org/TR/SVG/animate.html#AnimateTransformElement
	*/

	class AnimateTransform extends AnimateAbstract{
		
		function __construct(){
			// initialize some basic values: 
			$this->attributeName = "transform";
			$this->attributeType = "XML";
			
			$this->animationType =  "animateTransform";
		}
		
		public function rotate($fromAngle, $toAngle){
			$this->type = "rotate";
			$this->from = $fromAngle;
			$this->to = $toAngle;
		}
		
		public function scale($fromScale, $toScale){
			$this->type = "scale";
			$this->from = $fromScale;
			$this->to = $toScale;
		}
		
		public function translate($fromPoints, $toPoints){
			$this->type = "translate";
			$this->from = $fromPoints[0].",".$fromPoints[1];
			$this->to   = $toPoints[0].",".$toPoints[1];
		}
		
		public function skew($direction, $from, $to){
				
			switch($direction){
				case "x":
					$this->type="skewX";
				break;
				case "y":
					$this->type="skewY";
				break;
			}			
				
			$this->from = $from;
			$this->to   = $to;
		
		}
		
	}

?>