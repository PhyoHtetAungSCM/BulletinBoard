function confirmFormData() {
    let title = document.getElementById('title').value;
    let description = document.getElementById('description').value;
    document.getElementById('confirmTitle').innerHTML = title;
    document.getElementById('confirmDescription').innerHTML = description;
}

// post detail pop up
$(document).on('click', '.postDetail', function(){
    let title = $(this).attr('data-title');
    let description = $(this).attr('data-description');
    $('#detailTitle').text(title);
    $('#detailDescription').text(description);
    $('#postDetailModal').modal('show');
});

// confirm delete form data
$(document).on('click', '.deletePost', function(){
    let postId = $(this).attr('data-deletePostId');
    $('#deletePostId').val(postId);
    $('#deleteModal').modal('show'); 
});