<?php
include_once("../process/config.php");
session_start();
if (!isset($_SESSION['username']) || ($_SESSION['type'] !== 'admin'))  {
    header("Location: signin.php");
    exit();
} 
$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <title>Admin Dashboard</title>
    <link rel="icon" href="../img/qy icon.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="reportsPage">
<nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.php">
                   <img src="img/full logo.png" alt="" srcset=""  height="80px"  width="250px" >
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link" href="Aboutus.php">
                                <i class="fas fa-shopping-cart"></i>
                                About us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.php">
                                <i class="fas fa-shopping-cart"></i>
                                Contact us
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
                            <a class="nav-link d-block" href="../process/logout.php">
                                <?php echo $username  ?> <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>

    


    <div class="container mt-1 ">
        <div class="row tm-content-row " >
            <div class="tm-bg-dark tm-block tm-block-products ">
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead class="" >
                            <tr>
                                <th scope="col-">&nbsp;</th>

                                <th scope="col">PICTURE</th>
                                <th scope="col">PRODUCT NAME</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">Description</th>
                                <th scope="col">Link</th>
                                <th scope="col"></th>
                                <th scope="col">&nbsp;</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM products";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($result)) {
                                $id = $row["id"];
                                $name = $row['productname'];
                                $company = $row['company'];
                                $price = $row['price'];
                                $fdescription = $row['fulldescription'];
                                $link=$row['link'];
                                // Fetch all pictures for this product
                                $picturequery = "SELECT * FROM pictures WHERE product_id = $id";
                                $resultpicture = mysqli_query($conn, $picturequery);

                                echo '<tr>';
                                echo '<th scope="row">' . $id . '</th>';
                                echo '<td>';

                                // Display all pictures for this product
                                while ($pic_row = mysqli_fetch_array($resultpicture)) {
                                    $picture = $pic_row['path'];
                                    echo '<img src="../process/' . $picture . '" style="width: 150px; height: 150px;">';
                                }

                                echo '</td>';
                                echo '<td class="tm-product-name">' . $name . '</td>';
                                echo '<td class="tm-product-name">₱' . $price . '</td>';
                                echo '<td>' . $fdescription . '</td>';
                                echo '<td> <a href="https://www.'. $link .'" target="_blank" class="text-black">Link</a></td>';
                                echo '<td>
                                        <a href="../process/delete.php?id=' . $id . '" onclick="return confirm(\'Are you sure you want to delete?\')" class="tm-product-delete-link">
                                        <i class="bi bi-trash"></i>
                                         </a>
                                     </td>';
                                echo '<td>
                                         <a href="editprod.php?id=' . $id . '" class="tm-product-delete-link">
                                         <i class="bi bi-pen"></i>
                                         </a>
                                     </td>';
                                echo '</tr>';
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- table container -->
                <button class="btn btn-primary btn-block text-uppercase mb-3">
                    <a href="addproducts.php" class="text-white"> Add new Product</a>
                </button>
            </div>
        </div>
    </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small">
                Copyright &copy; <b>2024</b> All rights reserved.

                Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
            $(".tm-product-name").on("click", function() {
                window.location.href = "edit-product.html";
            });
        });
    </script>
</body>

</html>