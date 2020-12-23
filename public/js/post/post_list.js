// Post Detail Pop Up
$(document).on('click', '.postDetail', function () {
    let title = $(this).attr('data-title');
    let description = $(this).attr('data-description');
    $('#detailTitle').text(title);
    $('#detailDescription').text(description);
    $('#postDetailModal').modal('show');
});

// Confirm Delete Form Data
$(document).on('click', '.deletePost', function () {
    let postId = $(this).attr('data-deletePostId');
    $('#deletePostId').val(postId);
    $('#deleteModal').modal('show');
});