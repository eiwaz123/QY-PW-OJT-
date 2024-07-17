<?php
include_once("../process/config.php");
session_start();
if(!$_SESSION["username"]){
header('location:adminlogin.php');}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QY Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="admins.dashboard.php">
                    <h1 class="tm-site-title mb-0">QY PRINTWORK</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="admin.dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">
                                <i class="fas fa-shopping-cart"></i>
                                Products
                            </a>
                        </li>

                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link d-block" href="../process/logout.php">
                                Admin, <b>Logout</b>
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
        <div class="row">
                <div class="container col-sm-6" style="display: block;">
                    <form action="../process/processproducts2.0.php" method="post" enctype="multipart/form-data" autocomplete="off" >
                    <div class="card" style="width: 90%; padding: 20px; left: 20%; background-color: #194063;">
                            <div class="card-body">
                                <div class="input-group mb-3">
                                     <input id="pictures" name="pictures[]" type="file" class="form-control" style="height: 70px;" placeholder="Enter picture" multiple accept="image/*"   required > 
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="container col-sm-6" style="left: 100px; min-width: 200px;">
                
                    <div class="row" style="padding: 5px;">
                        <div class="col-8" style="padding: 5px;">
                            <input type="text" placeholder="Product Name" name="prodname"required  >
                        </div>
                        <div class="col-8" style="padding: 5px;">
                            <input type="text" placeholder="Price" name="price"required  >
                        </div>
                        <div class="col-8" style="padding: 5px;">
                            <input type="text" placeholder="Enter Link" name="link" required >
                        </div>
                        <div class="col-8" style="padding: 5px;">
                        <input name="compname"  type="text"  id="compname" placeholder="Enter Company Name" required>
                        </div>
                        <div class="col-8" style="padding: 5px;">
                        <textarea name="fdescription" class="fdescription" cols="30" rows="10" class="form-control" id="fdescription" placeholder="Enter full description"  required contenteditable="true" required >&#9679</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
        </div>

        <!-- footer -->  
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2024</b> All rights reserved. 
                    
                    Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
                </p>
            </div>
        </footer>
    </div>
</body>

</html>