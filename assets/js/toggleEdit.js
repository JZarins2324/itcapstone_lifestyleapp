// toggleEdit.js

function toggleEdit(taskDescId, buttonId) {

  var taskDesc = document.getElementById(taskDescId);
  var editButton = document.getElementById(buttonId);

	console.log(taskDesc.innerHTML);

	hiddenInput = document.getElementById('hiddenId')
	hiddenInput.value = taskDesc.innerHTML;

	if (taskDesc.contentEditable == "true") {
		taskDesc.contentEditable = "false";
		editButton.value = "Edit";
		editButton.type = "submit";
		// if (noteSection.classList.contains('selected')) {
		// 	noteSection.classList.remove('selected');
		// }
  } else {
		taskDesc.contentEditable = "true";
		editButton.value = "Submit";
		// if (!noteSection.classList.contains('selected')) {
		// 	noteSection.classList.add('selected');
		// }
		taskDesc.focus();		
	}
}