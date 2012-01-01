<?php

	/*
	* Animation Class
	* See w3 documentation for more information: http://www.w3.org/TR/2001/REC-smil-animation-20010904/#TimingAndRealWorldClockTime
	*/

	abstract class AnimateAbstract{
		// target element id: 
		public $targetElement = "";
		
		public $animationType;
		
		// attribute name 
		public $attributeName = "";
		
		// attribute type   CSS | XML | Auto
		public $attributeType = "";
		
		// during a transform we need to decide if it's translate | scale | rotate | skewX | skewY
		public $type = "";
		
		// begining second of the animation:
		public $begin = "";
		
		// end second of the animation: 
		public $end = "";
		
		// duration second:
		public $duration = "";
		
		// from is the begining value of the attribute for a given animation behaviour
		public $from = "";
		
		// to is the end value of the attribute for a given animation behaviour
		public $to = "";
		
		// repeat count:
		public $repeatCount = "";
		
		// set this as freeze if you want the animation fill freeze at the end.
		public $fill;
		
		// path of the animation, valid commands are M | L | H | V | Z | C 
		public $path = "";
		
		// rotate the shape by the path:
		public $rotate = "auto";
		
		public $attributeValues;
		
		// Valid animation properties, key is the class property and the value is the svg tag attribute:
		public $validProperties = array(
						"targetElement"=>"targetElement", "attributeName"=>"attributeName", "attributeType"=>"attributeType", "path"=>"path", 
						"type"=>"type", "begin"=>"begin", "end"=>"end", "duration"=>"dur", "from"=>"from", "to"=>"to", "repeatCount"=>"repeatCount",
						"fill"=>"fill", "rotate"=>"rotate"
						);
		
		public function render(){
			
			$response = "<".$this->animationType;
			
			foreach($this->validProperties AS $property=>$attribute){
				if($this->$property != NULL){$response .= ' '.$attribute.'="'.$this->$property.'" ';}
			}
			$response .= ">";
			
			$response .= "</".$this->animationType.">";
			
			return $response;
		}
		
		public function setInfiniteLoop(){
			$this->repeatCount = "indefinite";
		}
		
		public function getElementAttributes(){
		
			foreach($this->validProperties AS $property=>$attribute){
				$this->attributeValues[$attribute] = $this->$property;
			}
		
			return $this->attributeValues;
		}
		
	}

?>