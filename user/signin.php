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
                <a class="navbar-brand" href="../qyhomepage.html" style= "color:white;">QY Printwork</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../qyhomepage.html" style= "color:white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../qyprods.html" style= "color:white;">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.html" style= "color:white;">Sign in</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-sm-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="card text-center">
            <div class="card-header">
                SIGN IN
            </div>
            <form action="../process/loginprocess.php" method="post">
            <div class="card-body">
                <div class="form-group row d-flex justify-content-center">
                    <div class="col-xs-2">
                        <input class="form-control mr-sm-2" name="username" type="text" placeholder="Enter username" aria-label="Username">
                        <input class="form-control mr-sm-2" name="password" type="password" placeholder="Enter Password" aria-label="passWord">
                        <br>
                        <button class="btn btn-primary" name="submit" >sign in</button></button>
                        
                    </div>
                </div>
            </div>
            </form>
            <div class="card-footer text-muted">
                <a href="register.html">Register</a>
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