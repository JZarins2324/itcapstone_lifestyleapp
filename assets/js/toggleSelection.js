function toggleSelection(element, event) {
  var editButton = element.querySelector('input[type="button"]');
  if (editButton && editButton.value !== "Edit") {
	// 	if (event.target !== editButton) {
	return;
  }

  element.classList.toggle('selected');
}