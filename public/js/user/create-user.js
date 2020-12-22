function confirmCreateUser() {

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let type = document.getElementById('type').value;
    let phone = document.getElementById('phone').value;
    let dob = document.getElementById('dob').value;
    let profile = document.getElementById("profile");

    document.getElementById('confirmName').innerHTML = name;
    document.getElementById('confirmEmail').innerHTML = email;

    if (type === "0") {
        document.getElementById('confirmType').innerHTML = "Admin";
    } else {
        document.getElementById('confirmType').innerHTML = "User";
    }

    document.getElementById('confirmPhone').innerHTML = phone;
    document.getElementById('confirmDob').innerHTML = dob;

    let fReader = new FileReader();
    fReader.readAsDataURL(profile.files[0]);
    fReader.onloadend = function (event) {
        let confirmProfile = document.getElementById("confirmProfile");
        confirmProfile.src = event.target.result;
    }
}

function clearCreateUser() {
    document.getElementById('name').value = "";
    document.getElementById('email').value = "";
    document.getElementById('password').value = "";
    document.getElementById('confirmPassword').value = "";
    document.getElementById('type').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('dob').value = "";
    document.getElementById("profile").value = "";
    document.getElementById("createUserProfile").removeAttribute('src');
}


let loadFile = function (event) {
    let createUserProfile = document.getElementById('createUserProfile');
    createUserProfile.src = URL.createObjectURL(event.target.files[0]);
    createUserProfile.onload = function () {
        URL.revokeObjectURL(createUserProfile.src) // free memory
    }
};


