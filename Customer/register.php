<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
		<link rel="icon" href="C:\xampp\QY Printwork\img\qy icon.png">
        <title>
            QY PrintWork
        </title>
        <style>
            .navbar-custom{
                background-color: #15133C;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-custom mb-5 mr-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="../qyhomepage.php" style= "color:white;">QY Printwork</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../qyhomepage.php" style= "color:white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../qyprods.php" style= "color:white;">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php" style= "color:white;">Sign in</a>
                    </li>
                </ul>
            </div>
        </nav>

        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                        <form action="../process/processregister.php" method="post" class="mx-1 mx-md-4" >
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" id="form3Example1c" class="form-control" name="name" required/>
                                                    <label class="form-label" for="form3Example1c">Your Name</label>
                                                    
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="test" id="form3Example3c" class="form-control" name="username" required/>
                                                    <label class="form-label" for="form3Example3c">Your Username</label>
                                                    <?php if(isset($_SESSION['error'])){
                                                     echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                                                        unset($_SESSION['error']);
                                                    }?>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" id="form3Example4c" class="form-control" name="password"  required/>
                                                    <label class="form-label" for="form3Example4c">Password</label>
                                                </div>
                                            </div>
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required/>   
                                            <div class="form-check d-flex justify-content-center mb-5">
                                                <label class="form-check-label" for="form2Example3">
                                                    I agree all statements in <a href="#">Terms of service</a>
                                                </label>
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Register">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mt-5">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="../qyhomepage.php" class="nav-link px-2 text-body-secondary">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About Us</a></li>
                </ul>
                <p class="text-center text-body-secondary">&copy; 2024 Company, Inc</p>
            </footer>
        </div>
    </body>
</html>