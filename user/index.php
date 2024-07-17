
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <title>Document</title>
</head>
<body>
<?php
// Include the database configuration file
include_once("../process/config.php");
// Start the session
session_start();

// Redirect to signin page if user is not logged in
if (!isset($_SESSION["user_id"])) {
    header('location:../user/signin.php');
}
$user_id=$_SESSION["user_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        .card {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            width: 200px;
            float: left;
        }
        .thumb img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<?php

$postprod = mysqli_query($conn, 'SELECT * FROM products');

foreach ($postprod as $prods):
    $product_id = $prods['product_id'];    

    $likesCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS likes FROM rating WHERE product_id = $product_id AND status='like'"))['likes'];
    $dislikesCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS dislikes FROM rating WHERE product_id = $product_id AND status='dislike'"))['dislikes'];

    $status = mysqli_query($conn, "SELECT status FROM rating WHERE product_id = $product_id AND user_id = $user_id");
    if (mysqli_num_rows($status) > 0) {
        $status = mysqli_fetch_assoc($status)['status'];
    } else {
        $status = 0;
    }

    $name = $prods['productname'];
    $price = $prods['price'];
    $product_id = $prods['product_id'];
?>
    
        <div class="card">
            <h4><?php echo $name ?></h4>
            <?php 
            $query_images = "SELECT * FROM product_images WHERE product_id=$product_id";
            $result_images = mysqli_query($conn, $query_images);
            while ($row_image = mysqli_fetch_assoc($result_images)) {
                echo "<img src='" . $row_image['itempath'] . "' alt='Product Image' height='100px' width='100px'>";
            }   
            ?>
            <p>Price: <?php echo $price; ?></p>
            <button class="like <?php if($status=='like') echo "selected"; ?>" data-post-id="<?php echo $product_id; ?>">
                <i class="btn btn-primary">Like</i>
                <span class="likes_count <?php echo $product_id; ?>" data-count="<?php echo $likesCount; ?>"><?php echo $likesCount; ?> </span>
            </button>
            <button class="dislike <?php if($status=='dislike') echo "selected"; ?>" data-post-id="<?php echo $product_id; ?>">
                <i class="btn btn-primary">DisLike</i>
                <span class="dislikes_count <?php echo $product_id; ?>" data-count="<?php echo $dislikesCount; ?>"><?php echo $dislikesCount; ?> </span>
            </button>
        </div>
    </div>
<?php endforeach; ?>
<script type="text/javascript" >
    
$('.like, .dislike').click(function() {
    
 
// $(document).on('click', '.like, .dislike', function() {
    var data = {
        product_id: $(this).data('post-id'),
        user_id: <?php echo $user_id; ?> ,
        status: $(this).hasClass('like') ? 'like' : 'dislike',
    };
    console.log("Data to be sent:", data);

    $.ajax({
        url: '../process/likecount.php',
        type: 'POST',
        data: data,
        success: function(response) {
            console.log("Response from server:", response);

            var product_id = data['product_id'];
            
            var likes = $('.likes_count.' + product_id);
            var likes_count = likes.data('count');
            
            var dislikes = $('.dislikes_count.' + product_id);
            var dislikes_count = dislikes.data('count');

            var likeButton = $(".like[data-post-id='" + product_id + "']");
            var dislikeButton = $(".dislike[data-post-id='" + product_id + "']");

            if (response == 'newlike') {
                likes.html(parseInt($('.likes_count.' + product_id).text()) + 1);
                likeButton.addClass('selected');
            } else if (response == 'newdislike') {
                dislikes.html(dislikesCount + 1);
                dislikeButton.addClass('selected');
            } else if (response == 'changedlike') {
                likes.html(parseInt($('.likes_count.' + product_id).text()) + 1);
                dislikes.html(parseInt($('.dislikes_count.' + product_id).text()) - 1);
                likeButton.addClass('selected');
                dislikeButton.removeClass('selected');
            } else if (response == 'changedislike') {
                likes.html(parseInt($('.likes_count.' + product_id).text()) - 1);
                dislikes.html(parseInt($('.dislikes_count.' + product_id).text()) + 1);
                likeButton.removeClass('selected');
                dislikeButton.addClass('selected');
            } else if (response == 'deletedlike') {
                likes.html(parseInt($('.likes_count.' + product_id).text()) - 1);
                likeButton.removeClass('selected');
            } else if (response == 'deletedislike') {
                dislikes.html(parseInt($('.dislikes_count.' + product_id).text()) - 1);
                dislikeButton.removeClass('selected');
            }
            
            
            // Reload the page after updating the data
            
             
            
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error(xhr.responseText);
        }
    });

});

</script>

</body>
</html>



