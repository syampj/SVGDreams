// english alphabet:
var alphabetKeys = 'abcdefghijklmnopqrstuvwxyz'.split('');

// arrow keys,
var arrowKeys = new Array("left", "up", "right", "down");

// you can set different move amounts for different arrows. 
var arrowMoveAmounts = new Array();
	arrowMoveAmounts["up"] = 5;
	arrowMoveAmounts["down"] = 5;
	arrowMoveAmounts["left"] = 5;
	arrowMoveAmounts["right"] = 5;
	
// send the keyword value to instruction stack in a valid JSON format:
var pushIntoInstructionStack = true;

// the ajax request URL, if the keyboard press is sent to the ajax layer, (see: keyboardMultipleInstruction)
var keyboardAjaxRequestUrl = "";

// true:  keyboard values will be sent to keyboardAjaxRequestUrl with parameter keyboard_value
var keyboardAjaxInteraction = true;

// The last keyboard input. Used and unset by the svgdreams-canvas file. 
var keyboardLastInput;

// activate arrows to move with keyboardLastInput and keyboardListenerInterval values.
var activateArrows = false;

var keyboardListenerInterval = 100;

function checkKey(e){
    
	var keyCode = e.which;
	 
	if(keyCode >= 37 && keyCode <= 40){ // arrow:
		var key = parseInt(keyCode) - 37;
		var value = arrowKeys[key];
	}else if(keyCode >= 48 && keyCode <= 57){ // numbers
		var value = parseInt(keyCode) - 48;
	}else if(keyCode >= 65 && keyCode <= 90){ // alphabet:
		var value = parseInt(keyCode) - 65;
		value = alphabetKeys[value];
	}
	
	// set the keyboardLastInput value. 
	keyboardLastInput = value;
	
	if(pushIntoInstructionStack == true && typeof value != "undefined"){
		if(value.length > 0){
			var jsonData = '[{"action":"keyboard", "value":"'+value+'", "request":"'+keyboardAjaxRequestUrl+'"}]';
			var instructionArray = JSON.parse(jsonData);	
			instructionStack.push(instructionArray);
		
		}
	}
	
	return false;
	
}

function setKeyboardAjaxRequest(requestURL){
	
	if(requestURL){
		keyboardAjaxRequestUrl = requestURL;
		return true;
	}else{
		return false;
	}
}

$(document).keydown(checkKey);	

$(document).keyup(function(){keyboardLastInput = "";});