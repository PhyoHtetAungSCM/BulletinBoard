/** Update Post Confirmation */
function updatePostConfirmation() {
	let title = document.getElementById('title').value;
	let description = document.getElementById('description').value;
	let status = document.getElementById('status');
	
	document.getElementById('confirmTitle').innerHTML = title;
	document.getElementById('confirmDescription').innerHTML = description;
	if (status.checked) {
		document.getElementById('confirmStatus').innerHTML = "Active";
	} else {
		document.getElementById('confirmStatus').innerHTML = "Inactive";
	}
}

/** Clear Input */
function updatePostClearance() {
	document.getElementById('title').value = "";
	document.getElementById('description').value = "";
}