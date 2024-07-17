<?php
include_once ("../process/config.php");
session_start();
if (!isset($_SESSION['username']) || ($_SESSION['type'] !== 'admin')) {
    header("Location: signin.php");
    exit();
}
$username = $_SESSION['username'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <title>Admin Dashboard</title>
    <link rel="icon" href="../img/qy icon.png">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            <a class="navbar-brand" href="index.php">
                <img src="img/full logo.png" alt="" srcset="" height="80px" width="250px">
            </a>
            <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars tm-nav-icon"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto h-100">


                    <li class="nav-item">
                        <a class="nav-link" href="products.php">
                            <i class="fas fa-shopping-cart"></i>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php]">
                            <i class="fas fa-shopping-cart"></i>
                            About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">
                            <i class="fas fa-shopping-cart"></i>
                            Contact Us
                        </a>
                    </li>


                    <li class="nav-item dropdown">

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Billing</a>
                            <a class="dropdown-item" href="#">Customize</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">

                        <a class="nav-link d-block" href="signin.php">
                            <?php echo $username ?> <b>Logout</b>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <div class="row">
    <?php
    $query = mysqli_query($conn, "SELECT p.*, 
                                   (SELECT pic.path FROM pictures pic WHERE pic.product_id = p.id LIMIT 1) AS picture_path
                                   FROM products p ");
    $count = 0; // Initialize a counter
   
    while ($row = mysqli_fetch_array($query)) {
        $name = $row['productname'];
        $price = $row['price'];
        $id = $row['id'];
        $like = $row['likes'];
        $description = $row['fulldescription'];
        $picture = $row['picture_path']; // Fetch the image path directly from the subquery
    ?>
        <div class="col-4 md-3 p-3"> <!-- Adjust col-md-3 according to your grid system -->
            <div class="card">
                <div class="card-img" style="display: flex; height: 250px !important; width: 250px !important; justify-content: center; align-content: center; align-self: center;">
                    <img src="../process/<?php echo $picture; ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><span style="color: red;">Product name:</span><br><?php echo $name ?></h5>                  
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Price: ₱<?php echo $price ?></li>
                    <li class="list-group-item"><?php echo $like ?> people like this</li>
                    <li class="list-group-item">Categories: <?php 
                    $query_tag=mysqli_query($conn,"SELECT * FROM categories WHERE product_id = $id");
                    while($row = mysqli_fetch_array($query_tag)){
                    $tags=$row['categories'];
                    echo $tags . " "; 
                    }
                    
                  ?></li>
                </ul>
            </div>
        </div>
    <?php
        $count++; // Increment the counter
    }
    ?>
</div> <!-- Close the last row -->

        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2024</b> All rights reserved.
                </p>
            </div>
        </footer>
 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>