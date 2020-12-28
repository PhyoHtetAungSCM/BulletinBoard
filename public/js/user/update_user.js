function updateUserConfirmation() {
    let uploadedProfile = document.getElementById('uploadedProfile');
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let type = document.getElementById('type').value;
    let phone = document.getElementById('phone').value;
    let dob = document.getElementById('dob').value;
    let profile = document.getElementById('profile');

    let confirmProfile = document.getElementById('confirmProfile');

    document.getElementById('confirmName').innerHTML = name;
    document.getElementById('confirmEmail').innerHTML = email;

    if (type === "0") {
        document.getElementById('confirmType').innerHTML = "Admin";
    } else {
        document.getElementById('confirmType').innerHTML = "User";
    }

    document.getElementById('confirmPhone').innerHTML = phone;
    document.getElementById('confirmDob').innerHTML = dob;

    /** Uploaded or Updated Profile on Modal */
    if(profile.files[0] !== undefined) {
        let fReader = new FileReader();
        fReader.readAsDataURL(profile.files[0]);
        fReader.onloadend = function (event) {
            confirmProfile.src = event.target.result;
        }
    } else if (uploadedProfile) {
        let uploadedProfileName = (uploadedProfile.src).replace(/^.*[\\\/]/, '');
        confirmProfile.src = `/images/${uploadedProfileName}`;
    } else {
        confirmProfile.removeAttribute('src');
    }
}

function updateUserClearance() {
    document.getElementById('name').value = "";
    document.getElementById('email').value = "";
    document.getElementById('type').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('dob').value = "";
    document.getElementById("profile").value = "";
    document.getElementById("createUserProfile").removeAttribute('src');
}

let loadFile = function (event) {
    let updateUserProfile = document.getElementById('updateUserProfile');
    updateUserProfile.src = URL.createObjectURL(event.target.files[0]);
    updateUserProfile.onload = function () {
        URL.revokeObjectURL(updateUserProfile.src);
    }
};