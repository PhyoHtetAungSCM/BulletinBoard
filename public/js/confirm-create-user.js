function confirmCreateUser() {
    // let profile = document.getElementById('profile').value;
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let type = document.getElementById('type').value;
    let phone = document.getElementById('phone').value;
    let dob = document.getElementById('dob').value;

    document.getElementById('confirmName').innerHTML = name;
    document.getElementById('confirmEmail').innerHTML = email;
    document.getElementById('confirmType').innerHTML = type;
    document.getElementById('confirmPhone').innerHTML = phone;
    document.getElementById('confirmDob').innerHTML = dob;
}