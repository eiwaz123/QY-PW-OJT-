$(document).ready(function(){
    // Function to load posts
    function loadPosts() {
        $.ajax({
            url: 'getposts.php',
            method: 'GET',
            success: function(response) {
                $('#posts').html(response);
            }
        });
    }

    // Initial loading of posts
    loadPosts();

    // Submitting post form
     $('#postButton').click(function(){
        var posts = $('#post').val();
        $.ajax({
            url: 'addpost.php',
            method: 'POST',
            data: {post: posts},
            success: function(response) {
                $('#post').val('');
                loadPosts(); // Reload posts after adding a new one
            },
            error: function(xhr, status, error) {
                console.error('Error adding post:', error); // Log any errors to the console
            }
        });
    });


    // Like functionality
    $(document).on('click', '.like-btn', function(){
        var postId = $(this).data('post-id');
        $.ajax({
            url: 'likepost.php',
            method: 'POST',
            data: {postId: postId},
            success: function(response) {
                loadPosts(); // Reload posts after liking
            }
        });
    });
});
