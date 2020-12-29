/** User Detail Pop Up */
$(document).on('click', '.userDetail', function () {
	let name = $(this).attr('data-name');
	let email = $(this).attr('data-email');
	let type = $(this).attr('data-type');
	let phone = $(this).attr('data-phone');
	let dob = $(this).attr('data-dob');
	let profile = $(this).attr('data-profile');

	$('#detailName').text(name);
	$('#detailEmail').text(email);

	if(type === "0") {
		$('#detailType').text("Admin");
	} else {
		$('#detailType').text("User");
	}

	$('#detailPhone').text(phone);
	$('#detailDob').text(dob);
	
	if(profile) {
		$("#detailProfile").attr('src', `/images/${profile}`);
	}
	
	$('#userDetailModal').modal('show');
});

/** Confirm Delete Form Data */
$(document).on('click', '.deleteUser', function () {
	let userId = $(this).attr('data-deleteUserId');
	$('#deleteUserId').val(userId);
	$('#deleteModal').modal('show');
});