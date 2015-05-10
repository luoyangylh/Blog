function newStory() {
	var input = document.createElement("div");
	input.className = "input-group";
	input.id = "input_story"
	var text = document.createElement("textarea");
	text.name = "story";
	text.className = "form-control";
	text.id = "form-control";
	text.rows = "5";
	var span = document.createElement("span");
	span.className = "input-group-addon btn btn-primary";
	span.appendChild(document.createTextNode("Send"));
	span.onclick = sendData;
	input.appendChild(text);
	input.appendChild(span);	
	var element = document.getElementById("div1");
	var timeline = element.childNodes[2];
	element.insertBefore(input, timeline);	

}

function sendData() {
	var form = document.getElementById("form-control");
	var cdata = form.value;
	
	// alert(form.value);
	var data = {
		story: cdata	
	};
	$.post("addNewStory.php", data, function( response ) {
		// submitter.value="Comment posted"; 
		// submitter.disabled=true; 
		// alert(response);
		$(response).insertBefore($("li:first")); 
		$("#input_story").hide();
	});
	return false;
}