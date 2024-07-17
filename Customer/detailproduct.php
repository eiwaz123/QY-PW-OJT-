<?php
include_once ("../process/config.php");
$product_id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<div>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
        <link rel="icon" href="C:\xampp\QY Printwork\img\qy icon.png">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
        <link rel="stylesheet" type="text/css" href="css/slide.css">
        <title>
            QY PrintWork
        </title>
        <style>
            .navbar-custom {
                background-color: #15133c;
            }

            body {
                margin: 5px;
            }
        </style>
    </head>

   
    <nav class="navbar navbar-expand navbar-custom mb-5 mr-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <li><a class="navbar-brand" href="../homepage.php" style="color:white;"><img src="../img/full logo.png" alt="" srcset="" height="80px" width="250px"></a></li>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
               
                <li class="nav-item">
                    <a class="nav-link" href="products.php" style="color:white;">Products</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <?php if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="../process/logout.php" style="color:white;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!-- CAROUSEL PRODUCT -->
    <div class="row">
        <div class="card col-4  border-0 mt-5" style="width:10rem; margin-left: 5rem;">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];


                ?>

                <div class="your-class">
                    <?php
                    $queryimage = "SELECT * FROM pictures  WHERE product_id = $row[id]";
                    $resultimg = mysqli_query($conn, $queryimage);
                    while ($rowimage = mysqli_fetch_assoc($resultimg)) {
                        $picture = $rowimage['path'];
                        $id = $rowimage['product_id'];
                        echo '<img src="../process/' . $picture . '" style="height: 450px; ">';
                        ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <?php
        $query = "SELECT * FROM products WHERE id = $product_id";
        $resultproducts = mysqli_query($conn, $query);
        while ($products = mysqli_fetch_assoc($resultproducts)) {
            $name = $products['productname'];
            $price = $products['price'];
            $description = $products['fulldescription'];
            //$category = $products['category'];
            $company = $products['company'];
            ?>


            <!-- END CARUSEL -->
            <div class="card col border-0 mt-5">
                <div class="col">
                    <div class="row">
                        <p>Categories:</p>
                        <?php
                        $querycategories = "SELECT * FROM categories WHERE product_id = $product_id";
                        $resultcategories = mysqli_query($conn, $querycategories);
                        while ($categories = mysqli_fetch_assoc($resultcategories)) {
                            $category = $categories['categories'];

                            ?>
                            <p style="color:green;"><?php echo  "&nbsp",$category, "," ?></p>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <h2><?php echo $name; ?></h2>
                    </div>
                    <div class="row">
                        <h3>PHP <?php echo $price; ?></h3>
                    </div>
                    <div class="row">
                        <h4><?php echo $company; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="mx-auto mt-5 px-3" style="text-align:center">
                <h3>Product Details</h3>
            </div>
        </div>
        <div class="col">
            <div class="card mx-auto" style="width:40rem;">
                <div class="row">
                    <div class="card-body mx-auto px-3" style="text-align:center;">
                        <p class="card-text"> <?php echo nl2br($description); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="col mt-5" style="text-align:center;">
        <p>Disclaimer!<br><br>In case you need specific requirements, please inform us of your required specification so
            we can provide a made-to-order quotation for you.</p>
    </div>
</div>

<div class="container mt-5">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="../qy printwork.html" class="nav-link px-2 text-body-secondary">Home</a>
            </li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About Us</a></li>
        </ul>
        <p class="text-center text-body-secondary">&copy; 2024 QY Printwork</p>
    </footer>
</div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="js/slide.js"></script>
</body>

</html>