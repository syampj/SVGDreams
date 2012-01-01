<?php

	require_once("animateabstract.class.php");

	/*
	* AnimateColor Class
	* See w3 documentation for more information: http://www.w3.org/TR/SVG/animate.html#AnimateColorElement
	*/

	class AnimateColor extends AnimateAbstract{
		
		
		function __construct(){
			$this->animationType =  "animateColor";
			$this->attributeName = "fill";
		}
		
	}

?>