let loadFile = function (event) {
    let updateUserProfile = document.getElementById('updateUserProfile');
    updateUserProfile.src = URL.createObjectURL(event.target.files[0]);
    updateUserProfile.onload = function () {
        URL.revokeObjectURL(updateUserProfile.src);
    }
};