<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'qyprint');

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (isset($_POST['liked']) || isset($_POST['unliked'])) {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['redirect' => true]);
        exit();
    } else {
        $user_id = $_SESSION['user_id'];
        $postid = $_POST['product_id'];

        if (isset($_POST['liked'])) {
            $result = mysqli_query($con, "SELECT * FROM products WHERE id=$postid");
            $row = mysqli_fetch_array($result);
            $n = $row['likes'];

            mysqli_query($con, "INSERT INTO likes (user_id, product_id) VALUES ($user_id, $postid)");
            mysqli_query($con, "UPDATE products SET likes=$n+1 WHERE id=$postid");

            echo json_encode(['likes' => $n + 1]);
            exit();
        }

        if (isset($_POST['unliked'])) {
            $result = mysqli_query($con, "SELECT * FROM products WHERE id=$postid");
            $row = mysqli_fetch_array($result);
            $n = $row['likes'];

            mysqli_query($con, "DELETE FROM likes WHERE product_id=$postid AND user_id=$user_id");
            mysqli_query($con, "UPDATE products SET likes=$n-1 WHERE id=$postid");

            echo json_encode(['likes' => $n - 1]);
            exit();
        }
    }
}

// Retrieve posts from the database
$posts = mysqli_query($con, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Like and unlike system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../admin/css/styles.css">
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="icon" href="../img/qy icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <style>
        .navbar-custom {
            background-color: #15133C;
        }
        .links {
            text-align: right;
        }
        .links a {
            color: #e1e1e1;
            margin-left: 5px;
            transition: 0.3s;
            font-size: 17px;
        }
        .links a:hover {
            color: #15133C;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-custom mb-5 mr-0">
        <img src="../admin/img/qy icon.png" alt="" style="width: 4%;" class="mx-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="qyhomepage.html" style="color:white;">QY Printwork</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="qyhomepage.html" style="color:white;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="qyprods.html" style="color:white;">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="loginReg/signin.html" style="color:white;">Sign in</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-sm-0">
                <a href="../process/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </form>
        </div>
    </nav>

    <h1 style="position:relative; width: 20%; left: 5%; bottom: 120%; overflow:hidden;">Top Products</h1>
    <div class="container">
        <div class="row">
            <?php while ($row = mysqli_fetch_array($posts)) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div id="carousel-<?php echo $row['id']; ?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $queryImages = mysqli_query($con, "SELECT * FROM pictures WHERE product_id='" . $row['id'] . "'");
                            $firstImage = true;
                            while ($image = mysqli_fetch_array($queryImages)) {
                                $imagePath = $image['path'];
                            ?>
                                <div class="carousel-item <?php echo $firstImage ? 'active' : ''; ?>">
                                    <img src="<?php echo "../process/" . $imagePath; ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php
                                $firstImage = false;
                            }
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-<?php echo $row['id']; ?>" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-<?php echo $row['id']; ?>" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['productname']; ?></h5>
                        <p class="card-text"><?php echo $row['fulldescription']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $row['price']; ?></li>
                    </ul>
                    <div class="card-body">
                        <div class="links">
                            <a href="https://<?php echo $row['link'] ?>">
                                <?php
                                if ($user_id) {
                                    $result = mysqli_query($con, "SELECT * FROM likes WHERE user_id=" . $user_id . " AND product_id=" . $row['id']);
                                    if (mysqli_num_rows($result) == 1) {
                                ?>
                                    <span><a href="#" class="unlike" id="<?php echo $row['id']; ?>"><i class="fa fa-heart" aria-hidden="true"></i></a></span>
                                <?php } else { ?>
                                    <span><a href="#" class="like" id="<?php echo $row['id']; ?>"><i class="fa fa-heart-o" aria-hidden="true"></i></a></span>
                                <?php } } else { ?>
                                    <span><a href="../admin/signin.php"><i class="fa fa-heart-o" aria-hidden="true"></i></a></span>
                                <?php } ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="container mt-5">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="../qy printwork.html" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About Us</a></li>
            </ul>
            <p class="text-center text-body-secondary">&copy; 2024 Company, Inc</p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('.like, .unlike').click(function (e) {
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
                    success: function (response) {
                        var data = JSON.parse(response);
                        if (data.redirect) {
                            window.location.href = '../admin/signin.php';
                        } else {
                            // Handle success response and update UI
                            // For simplicity, just toggling the like/unlike button
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
