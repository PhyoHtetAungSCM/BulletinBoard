function confirmUpdatePost() {
    let title = document.getElementById('title').value;
    let description = document.getElementById('description').value;
    let status = document.getElementById('status');
    if(title) {
        document.getElementById('confirmTitle').innerHTML = title;
    } else {
        document.getElementById('confirmTitle').classList.add("error");
        document.getElementById('confirmTitle').innerHTML = "This title  field is required";
    }
    if(description) {
        document.getElementById('confirmDescription').innerHTML = description;
    } else {
        document.getElementById('confirmDescription').classList.add("error");
        document.getElementById('confirmDescription').innerHTML = "This description field is required";
    }
    if (status.checked) {
        document.getElementById('confirmStatus').innerHTML = "Active";
    } else {
        document.getElementById('confirmStatus').innerHTML = "Inactive";
    }
}

function clearUpdatePost() {
    document.getElementById('title').value = "";
    document.getElementById('description').value = "";
}