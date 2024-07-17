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
    <title>QY Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="tagsinput/bootstrap-tagsinput.css">



    <style>
        .label-info {
            background-color: blue;
            padding: 1px;
            border-radius: 4px;
        }
    </style>
</head>

<body id="reportsPage">
    <div class="" id="home">

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

        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-white mt-5 mb-5">Add New Product</h3>
                </div>
            </div>
        </div>

        <!-- cards -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <form action="../process/processproducts2.0.php" method="post" enctype="multipart/form-data" autocomplete="off"   method="post">
                <div class="card" style="width: 90%; padding: 20px; left: 20%; background-color: #194063;">
                    <div class="card-body">
                        <div class="input-group mb-3">
                        <input id="pictures" accept=".jpeg ,.jpg ,.png " name="pictures[]" type="file"
                                                class="form-control" style="height: 70px;" placeholder="Enter picture"
                                                accept=".jgp ,.jpg ,.png " required multiple>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="container" style="margin-left: 850px; min-width: 100px; padding: 5px;">
                                <div class="col-8" style="padding: 5px;">
                                    <input type="text" placeholder="Product Name" name="prodname" required>
                                </div>
                                <div class="col-8" style="padding: 5px;">
                                    <input type="text" placeholder="Price" name="price" required>
                                </div>
                                <div class="col-8" style="padding: 5px;">
                                    <input type="text" placeholder="Enter Link" name="link" required>
                                </div>
                                <div class="col-8" style="padding: 5px;">
                                    <input name="compname" type="text" id="compname" placeholder="Enter Company Name" required>
                                </div>
                                <div class="col-8" style="padding: 5px;">
                                    <textarea name="fdescription" class="fdescription" cols="30" rows="10" class="form-control"
                                        id="fdescription" placeholder="Enter full description" required contenteditable="true"
                                        required>&#9679</textarea>
                                </div>
                                <div class="col-8" style="padding: 5p;x;">
                                   
                                    <input type="text" name="tags" class="form-control" data-role="tagsinput"
                                        style="background-color: white; color: black;" placeholder="Input Tags">
                                </div>
                <button type="submit" class="btn btn-primary" name="submit">submit</button>
            </form>
        
        </div>

        <!-- footer -->
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2024</b> All rights reserved.

                    Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template
                        Mo</a>
                </p>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="tagsinput/bootstrap-tagsinput.js"></script>

    <script type="text/javascript">
        $("#tags").tagsinput('');
    </script>
</body>

</html>