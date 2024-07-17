$(document).ready(function() {
    // Function to load posts
    function loadPosts() {
        $.ajax({
            type: "GET",
            url: "getposts.php",
            dataType: "html",
            success: function(response) {
                $("#postitems").html(response); // Update the HTML content with fetched posts
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: ", xhr.responseText);
            }
        });
    }

    // Load posts initially and then refresh every 5 seconds
    loadPosts();
    setInterval(loadPosts, 5000);

    // Submit post form
    $('#formid').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var post = $('#post').val(); // Get the value of the post input

        $.ajax({
            url: 'addpost.php',
            type: 'POST',
            data: { post: post },
            success: function(data) {
                console.log("AJAX Success: ", data);
                $('#post').val(''); // Clear the post input after successful submission
                loadPosts(); // Reload posts after submission
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: ", xhr.responseText);
            }
        });
    });
});

$(document).ready(function(){
    $(".like").click(function(event){
        event.preventDefault(); // Prevent the default behavior of the anchor tag
        
        var postId = $(this).data('post-id'); // Get the post id from the data attribute
        
        $.ajax({
            url: "likepost.php",
            type: "POST",
            data: { post_id: postId },
            success: function(response){
                // Update the likes count or do something else on success
                console.log(response);
            },
            error: function(xhr, status, error){
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });
});