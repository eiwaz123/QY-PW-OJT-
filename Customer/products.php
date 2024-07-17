<?php
include_once("../process/config.php");
session_start();
$queryproducts = "SELECT * FROM products";
$resultproducts = mysqli_query($conn, $queryproducts);
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['redirect' => true]);
        exit();
    } else {
        $user_id = $_SESSION['user_id'];
        $postid = intval($_POST['product_id']);

        if (isset($_POST['liked'])) {
            $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$postid");
            $row = mysqli_fetch_array($result);
            $n = $row['likes'];

            mysqli_query($conn, "INSERT INTO likes (user_id, product_id) VALUES ($user_id, $postid)");
            mysqli_query($conn, "UPDATE products SET likes=$n+1 WHERE id=$postid");

            echo json_encode(['likes' => $n + 1]);
            exit();
        }

        if (isset($_POST['unliked'])) {
            $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$postid");
            $row = mysqli_fetch_array($result);
            $n = $row['likes'];

            mysqli_query($conn, "DELETE FROM likes WHERE product_id=$postid AND user_id=$user_id");
            mysqli_query($conn, "UPDATE products SET likes=$n-1 WHERE id=$postid");

            echo json_encode(['likes' => $n - 1]);
            exit();
        }
    }
}

// Retrieve posts from the database
$posts = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="icon" href="C:\xampp\QY Printwork\img\qy icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="css/slide.css">
    <title>QY PrintWork</title>
    <style>
        .navbar-custom {
            background-color: #15133c;
        }

        body {
            margin: 5px;
            background-color: #fbf5f5;
        }

        .centered-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .centered-image img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>


    <nav class="navbar navbar-expand navbar-custom mb-5 mr-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <li><a class="navbar-brand" href="../homepage.php" style="color:white;"><img src="../img/full logo.png" alt="" srcset="" height="80px" width="250px"></a></li>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="Customer/index2.0.php" style="color:white;">Products</a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../process/logout.php" style="color:white;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <?php
            $count = 0;
            while ($row = mysqli_fetch_assoc($resultproducts)) {
                $id = $row['id'];
                $name = $row['productname'];
                $price = $row['price'];
                $likes = $row['likes'];
            ?>
                <div class="col-md-3">
                    <div class="card" style="width: 100%;">
                        <div class="your-class">
                            <?php
                            $queryimage = "SELECT * FROM pictures WHERE product_id = $row[id]";
                            $resultimg = mysqli_query($conn, $queryimage);
                            while ($rowimage = mysqli_fetch_assoc($resultimg)) {
                                $picture = $rowimage['path'];
                                echo '<img src="../process/' . $picture . '" style="height: 450px;">';
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <a href="detailproduct.php?id=<?php echo $row['id']; ?>" >
                                <h5 class="card-title">Product Name: <?php echo $name; ?></h5>
                                <p class="card-text"> Price: <?php echo $price ?></p>
                                <p class="card-text">Likes: <span id="likes-<?php echo $id; ?>"><?php echo $likes; ?></span></p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="https://<?php echo $row['link'] ?>">
                                            <?php
                                            if ($user_id) {
                                                $result = mysqli_query($conn, "SELECT * FROM likes WHERE user_id=" . $user_id . " AND product_id=" . $row['id']);
                                                if (mysqli_num_rows($result) == 1) {
                                            ?>
                                                    <span><a href="#" class="unlike" id="<?php echo $row['id']; ?>"><i class="fa fa-heart" aria-hidden="true"></i></a></span>
                                                <?php } else { ?>
                                                    <span><a href="#" class="like" id="<?php echo $row['id']; ?>"><i class="fa fa-heart-o" aria-hidden="true"></i></a></span>
                                                <?php }
                                            } else { ?>
                                                <span><a href="../admin/signin.php"><i class="fa fa-heart-o" aria-hidden="true"></i></a></span>
                                            <?php } ?>
                                        </a>
                                    </li>
                                </ul>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                $count++;
                if ($count % 4 == 0) {
                    echo '</div><div class="row">';
                }
            }
            ?>
        </div>
    </div>

    <div class="container mt-5">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="../qy printwork.html" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About Us</a></li>
            </ul>
            <p class="text-center text-body-secondary">&copy; 2024 QY Printwork</p>
        </footer>
    </div>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/slide.js"></script>
    <script>
        $(document).ready(function() {
            $('.like, .unlike').click(function(e) {
                e.preventDefault();
                var postid = $(this).attr('id');
                var action = $(this).hasClass('like') ? 'liked' : 'unliked';

                $.ajax({
                    url: 'index.php',
                    type: 'post',
                    data: {
                        [action]: 1,
                        'product_id': postid
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.redirect) {
                            window.location.href = '../admin/signin.php';
                        } else {
                            // Handle success response and update UI
                            // Update the like count
                            $('#likes-' + postid).text(data.likes);

                            // Toggle the like/unlike button
                            if (action === 'liked') {
                                $('#' + postid).removeClass('like').addClass('unlike').find('i').removeClass('fa-heart-o').addClass('fa-heart');
                            } else {
                                $('#' + postid).removeClass('unlike').addClass('like').find('i').removeClass('fa-heart').addClass('fa-heart-o');
                            }
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>