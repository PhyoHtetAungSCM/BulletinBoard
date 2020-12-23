function confirmCreatePost() {
    let title = document.getElementById('title').value;
    let description = document.getElementById('description').value;
    if(title) {
        document.getElementById('confirmTitle').innerHTML = title;
    } else {
        document.getElementById('confirmTitle').classList.add("error-post");
        document.getElementById('confirmTitle').innerHTML = "This title  field is required";
    }
    if(description) {
        document.getElementById('confirmDescription').innerHTML = description;
    } else {
        document.getElementById('confirmDescription').classList.add("error-post");
        document.getElementById('confirmDescription').innerHTML = "This description field is required";
    }
}

function clearCreatePost() {
    document.getElementById('title').value = "";
    document.getElementById('description').value = "";
}