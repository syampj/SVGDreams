function createElement(target, elementType, attributes){  
	if(target != ""){
		var targetObj = document.getElementById(target);
	}else{
		var targetObj = document.getElementById("scene");
	} 
	
	var createdObj = targetObj.ownerDocument.createElementNS("http://www.w3.org/2000/svg", elementType); 
	
	for(attribute in attributes){ 
		createdObj.setAttribute(attribute, attributes[attribute]);
	} 
	
	targetObj.appendChild(createdObj); 
	parent.instructionStackBusy = false; 
	return targetObj;
}

// changes the content of the text element.
function addText(elementId, text){  document.getElementById(elementId).textContent = text;  parent.instructionStackBusy = false; }

function deleteElement(elementId){  addAttribute(elementId, "transform", "scale(0)"); parent.instructionStackBusy = false; }

function rotateElement(elementId, angle){  addAttribute(elementId, "transform", "rotate("+angle+")"); parent.instructionStackBusy = false; }

function moveElement(elementId, x, y)
{  
	var obj = document.getElementById(elementId);
	var tagName = obj.tagName;
	
	if(typeof tagName != "undefined"){
		switch(tagName){
			case "circle":
			case "ellipse":
				obj.setAttribute("cx", x);
				obj.setAttribute("cy", y);
				break;
			default: // for the remaining elements:
				obj.setAttribute("x", x);
				obj.setAttribute("y", y);
				break;
		}
	}
	parent.instructionStackBusy = false; 
}

function addAttribute(elementId, attribute, value){ if(document.getElementById(elementId)){document.getElementById(elementId).setAttribute(attribute, value);} parent.instructionStackBusy = false;} 

function processKeyboard(value, request){ if(request != ""){ parent.svgdreamsAjax(request+"?keyboard_value="+value);  parent.instructionStackBusy = false; } } 

function bindEvent(elementId, event, functionName){	addAttribute(elementId, event, functionName);	parent.instructionStackBusy = false;}

function resolveInstruction(instruction){

	if(typeof instruction == "object"){
	
		parent.instructionStackBusy = true;  
			
		for(var i in instruction){
			
			switch(instruction[i].action){ 
				case "insert": var createdObj = createElement(instruction[i].elementId, instruction[i].shapeType, instruction[i].attributes); break; 
				case "update":  addAttribute(instruction[i].elementId, instruction[i].attribute, instruction[i].value);  break; 
				case "delete":  deleteElement(instruction[i].elementId); break; 
				case "rotate":  rotateElement(instruction[i].elementId, instruction[i].angle); break; 
				case "move":    moveElement(instruction[i].elementId, instruction[i].x, instruction[i].y); break; 
				case "keyboard":  if(typeof parent.keyboardAjaxInteraction != "undefined"){ if(parent.keyboardAjaxInteraction == true){ processKeyboard(instruction[i].value, instruction[i].request);} } parent.instructionStackBusy = false; break; 
				case "text": addText(instruction[i].elementId, instruction[i].text); break; 
				case "event": bindEvent(instruction[i].elementId, instruction[i].event, instruction[i].functionName); break;
			}
			
			parent.instructionStackBusy = false;  
			
		} 
		
	}	
}

function getInstruction() { 
	var instructionStack = parent.instructionStack; 
	var firstInstruction = parent.instructionStack[0]; 
	resolveInstruction(firstInstruction);  
	instructionStack.splice(0,1); 
}

// changes coordinates of an element by diffX and diffY
function changeCoordinate(elementId, diffX, diffY){
	var obj = document.getElementById(elementId);
	var tagName = obj.tagName;
	
	if(typeof tagName != "undefined"){
		switch(tagName){
			case "circle":
			case "ellipse":
				var objCx = obj.cx.animVal.value;
				var objCy = obj.cy.animVal.value;
					moveElement(elementId, objCx + parseInt(diffX), objCy + parseInt(diffY));
				break;
			default: // for the remaining elements:
				var objX = obj.x.animVal.value;
				var objY = obj.y.animVal.value;
					moveElement(elementId, objX + parseInt(diffX), objY + parseInt(diffY));
				break;
		}
	}
}

// keyboard listener 
function keyboardListener(){
	if(typeof keyboardTargetElementId != "undefined"){
		var keyboardLastInput = parent.keyboardLastInput;
		
		var keyboardMoveAmountArray = parent.arrowMoveAmounts;
		var keyboardMoveAmount = keyboardMoveAmountArray[keyboardLastInput];
		
		switch(keyboardLastInput){
			case "up": changeCoordinate(keyboardTargetElementId, 0, -1*keyboardMoveAmount); break;
			case "down": changeCoordinate(keyboardTargetElementId, 0, keyboardMoveAmount); break;
			case "left": changeCoordinate(keyboardTargetElementId, -1*keyboardMoveAmount, 0); break;
			case "right": changeCoordinate(keyboardTargetElementId, keyboardMoveAmount, 0); break;
		}
	}
}
// Runs keyboardListener ifever keyboardAjaxInteraction is false.
if(typeof parent.keyboardListenerInterval != "undefined" && parent.activateArrows == true){
	setInterval("keyboardListener()", parent.keyboardListenerInterval);
}