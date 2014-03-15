function ajaxRequest(){
	try{
		var request = new XMLHttpRequest();
	} catch (e1){
		try {
			request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e2){
			try {
				request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e3){
				request = fales;
			}
		}
	}
	return request;
}

console.log("Hello World");



// Dummy and just for reference
function addTask(button){

	column = button;
	while (! /column /.test(column.className)){
		column = column.parentElement;
	}

	table = column;
	while (! /table/.test(table.className)){
		table = table.parentElement;
	}

	input = column.getElementsByClassName("input")[0];
	content = column.getElementsByClassName("columnContent")[0];

	task_text = input.value;
	task_column = column.className.match(/column[0-9]+/)[0].replace(/column/, "");
	task_user = table.id.replace(/table/, "");

	params  = "task_text=" + task_text;
	params += "&task_column=" + task_column;
	params += "&task_owner=" + task_user;
	request = new ajaxRequest();
	request.open ("POST", "scripts/s_add_task.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	request.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){

			newChild = addTask (this.responseText);
			newChild = document.createElement("div");
			newChild.innerHTML = this.responseText;
			newChild.className = "task";

			content.appendChild(newChild);
			input.value = "";
		}
	}

	request.send(params);
}