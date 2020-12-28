function createPostConfirmation() {
    let title = document.getElementById('title').value;
    let description = document.getElementById('description').value;

    document.getElementById('confirmTitle').innerHTML = title; 
    document.getElementById('confirmDescription').innerHTML = description;    
}

function createPostClearance() {
    document.getElementById('title').value = "";
    document.getElementById('description').value = "";
}