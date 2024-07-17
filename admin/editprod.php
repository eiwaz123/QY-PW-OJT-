<?php
include_once("../process/config.php");
session_start();
if(!$_SESSION["username"]){
header('location:../signin.php');}

$id=$_GET['id'];
$sql = "SELECT * FROM products WHERE id=?"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("i", $id);
$stmt->execute();
$result=$stmt->get_result();


?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Dashboard</title>
    <link rel="icon" href="../img/qy icon.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="reportsPage">
<nav class="navbar navbar-expand navbar-custom mb-5 mr-0">
            <img src="../admin/img/full logo.png" alt="" style="width: 10%;" class="mx-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="index.php" style= "color:white;">QY Printwork</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style= "color:white;">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php" style= "color:white;">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="accounts.html" style= "color:white;">Accounts</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-sm-0">
                    <a href="../process/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </form>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-white mt-5 mb-5">Edit Product</h3>
                </div>
            </div>
            
        </div>

        <!-- cards -->
        <div class="row">
                <div class="container col-sm-6">
                <form action="../process/editprocess.php" method="post" enctype="multipart/form-data" autocomplete="off" >
                <?php
                        
                        
                        while($data=$result->fetch_assoc()){
                        
                        $id=$data['id'];
                        $name=$data['productname'];
                        $price=$data['price'];
                        $fdescript=$data['fulldescription'];
                        $company=$data['company'];
                        $link=$data['link'];
                        
                            echo '
                    <div class="card" style="width: 90%; padding: 20px; left: 20%; background-color: #194063;">
                        
                            <div class="card-body">
                                <div class="input-group mb-3">
                                <input id="pictures"   accept=".jpeg ,.jpg ,.png " name="pictures[]" type="file" class="form-control" style="height: 70px;" placeholder="Enter picture" accept=".jgp ,.jpg ,.png "   required  multiple> 
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="container col-sm-6" style="left: 100px;">
                    
                        <div class="row" style="padding: 5px;">
                     <input type="text" name="id" value="<?php echo $id ?>"  style="display:none">
                     
                                
                                <div class="container col-sm-6" style="left: 100px; min-width: 200px;">
                                <input type="hidden" name="id" value="'.$id.'">
                                <div class="row" style="padding: 5px;">
                                    <div class="col-8" style="padding: 5px;">
                                        <input type="text" value="'.$name.'" name="prodname"required placeholder="Enter product name" >
                                    </div>
                                    <div class="col-8" style="padding: 5px;">
                                        <input type="text" value="'.$price.'" name="price"required  placeholder="Enter price" >
                                    </div>
                                    <div class="col-8" style="padding: 5px;">
                                        <input type="text" value="'.$link.'" name="link" placeholder="Enter Link" required >
                                    </div>
                                    <div class="col-8" style="padding: 5px;">
                                    <input name="compname"  type="text"  id="" value="'.$company.'" placeholder="Enter Company Name" required>
                                    </div>
                                    <div class="col-8" style="padding: 5px;">
                                    <textarea name="fdescription" class="fdescription" cols="30" rows="10" class="form-control" id="fdescription"  required contenteditable="true" required >'.$fdescript.'</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success"name="submit" >Submit</button>
                                </form>
                            </div>
                                    ';
    }
                        
                        
                        
                        ?>
                        
                            
                        </div>
                    </form>
                </div>
                
        </div>

        <!-- footer --> 
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    

</body>

</html>