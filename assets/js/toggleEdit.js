function toggleEdit(taskDescId, buttonId, hiddenId) {

  var taskDesc = document.getElementById(taskDescId);
  var editButton = document.getElementById(buttonId);
  var hiddenInput = document.getElementById(hiddenId);

  // Update Button Text
  if (taskDesc.contentEditable == "true") {
	hiddenInput.value = taskDesc.innerHTML;
	taskDesc.contentEditable = "false";
	editButton.value = "Edit";
	editButton.type = "submit";

  } else {
    taskDesc.contentEditable = "true";
	editButton.value = "Submit";
	taskDesc.focus();		
  }
}