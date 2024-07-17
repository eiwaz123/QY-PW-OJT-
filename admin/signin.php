<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="./css/bootstrap.min.css">
           
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
            <a class="navbar-brand" href="index.php" style= "color:white;"><img src="img/full logo.png" alt="" srcset=""  height="80px"  width="250px" >
            </a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="../qyhomepage.html" style= "color:white;">Home</a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php" style= "color:white;">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php" style= "color:white;">Sign in</a>
                    </li>
                </ul>
                
            </div>
        </nav>

        <div class="card text-center">
            <div class="card-header">
                SIGN IN
            </div>
            <div class="card-body">
                <?php
                session_start();
                if (isset($_SESSION['error'])) {
                    echo '<p class="error-message" style="color: red;">' . $_SESSION['error'] . '</p>';
                    // Clear the error message from the session
                    unset($_SESSION['error']);
                }
                
                
                
                ?>
                <form form  action="../process/loginprocess.php" method="post"  autocomplete="off" >
                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-xs-2">
                            <input class="form-control mr-sm-2" name="username" type="text" placeholder="Enter username"  autocomplete="off" required>
                            <input class="form-control mr-sm-2" name="password" type="password" placeholder="Enter Password" autocomplete="off"  required >
                            <br>
                            <input type="submit" name="submit" class="btn btn-primary" value="Sign in">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted">
                <a href="register.php">Register</a>
            </div>
        </div>

        <div class="container mt-5">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="../qyhomepage.html" class="nav-link px-2 text-body-secondary">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About Us</a></li>
                  </ul>
                <p class="text-center text-body-secondary">&copy; 2024 Company, Inc</p>
            </footer>
        </div>
    </body>
   
</html>