<?php

	require_once("animateabstract.class.php");

	/*
	* Animation Class
	* See w3 documentation for more information: http://www.w3.org/TR/2001/REC-smil-animation-20010904/#TimingAndRealWorldClockTime
	*/

	class Animate extends AnimateAbstract{
		
		function __construct(){
			$this->animationType =  "animate";
		}
		
	}

?>