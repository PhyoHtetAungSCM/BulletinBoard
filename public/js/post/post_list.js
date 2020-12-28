/** Post Detail Pop Up */
$(document).on('click', '.post-detail', function () {
    let title = $(this).attr('data-title');
    let description = $(this).attr('data-description');
    $('#detailTitle').text(title);
    $('#detailDescription').text(description);
    $('#postDetailModal').modal('show');
});

/** Confirm Delete Form Data */
$(document).on('click', '.post-delete', function () {
    let postId = $(this).attr('data-deletePostId');
    $('#deletePostId').val(postId);
    $('#deletePostModal').modal('show');
});