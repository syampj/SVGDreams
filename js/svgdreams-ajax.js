var instructionStack = new Array();
var instructionStackBusy = false;

function svgdreamsAjax(request){
	$.ajax({
	  url: request,
	  dataType: 'html',
	  context: document.body,
	  success: function(data){
	  
		// parse and insert only of it is an object.
		if(data != ""){
			var instructionArray = JSON.parse(data);
			
			// insert the instruction to the instruction stack:
			instructionStack.push(instructionArray);
		}
	  }
	});
}