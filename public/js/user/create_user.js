function confirmCreateUser() {
    let confirmName = document.getElementById('confirmName');
    let confirmEmail = document.getElementById('confirmEmail');
    let confirmType = document.getElementById('confirmType');
    let confirmProfile = document.getElementById("confirmProfile");

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let type = document.getElementById('type').value;
    let phone = document.getElementById('phone').value;
    let dob = document.getElementById('dob').value;
    let profile = document.getElementById("profile");

    if(name) {
        confirmName.innerHTML = name;
    } else {
        confirmName.classList.add("error-user");
        confirmName.innerHTML = "This name field is required";
    }

    if(email) {
        confirmEmail.innerHTML = email;
    } else {
        confirmEmail.classList.add("error-user");
        confirmEmail.innerHTML = "This email field is required";
    }

    if(!type) {
        confirmType.classList.add("error-user");
        confirmType.innerHTML = "This type field is required";
    } else if (type === "0") {
        confirmType.innerHTML = "Admin";
    } else {
        confirmType.innerHTML = "User";
    }

    confirmPhone.innerHTML = phone;

    confirmDob.innerHTML = dob;

    let fReader = new FileReader();
    fReader.readAsDataURL(profile.files[0]);
    fReader.onloadend = function (event) {
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
        URL.revokeObjectURL(createUserProfile.src);
    }
};


