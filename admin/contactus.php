<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="admin/css/bootstrap.min.css">
		<link rel="icon" href="C:\xampp\QY Printwork\img\qy icon.png">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <title>
            QY PrintWork
        </title>
        <style>
            .navbar-custom{
                background-color: #15133C;
            }
            .links{
				text-align: right;
			}
			.links a{
				color: #e1e1e1;
				margin-left: 5px;
				transition: 0.3s;
				font-size: 17px;
			}
			.links a:hover{
				color: #15133C;
			}
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-custom mb-5 mr-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="qyhomepage.html" style="color: white;">QY Printwork</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="qyhomepage.html" style= "color:white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="qyprods.html" style= "color:white;">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loginReg/signin.html" style= "color:white;">Sign in</a>
                    </li>
                </ul>
                
            </div>
        </nav>

        <div class="card bg-dark text-white">
            <img class="card-img" style="opacity:0.1;" src="img/buildng.jpg" alt="Card image">
            <div class="card-img-overlay">
              <h1 class="card-title text-center">Contact Us</h5>
              <p class="card-text text-center">If you require support, please call our Support Team on</p>
              <p class="card-text text-center">Phone: +63 999 999 9999</p>
            </div>
          </div>

        <div class="container mt-5">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="qyhomepage.html" class="nav-link px-2 text-body-secondary">Home</a></li>
                    <li class="nav-item"><a href="contact_us.html" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
                    <li class="nav-item"><a href="about_us.html" class="nav-link px-2 text-body-secondary">About Us</a></li>
                </ul>
                <p class="text-center text-body-secondary">&copy; 2024 Company, Inc</p>
            </footer>
        </div>
    </body>
</html>