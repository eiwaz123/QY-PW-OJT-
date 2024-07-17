
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="img\qy icon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            ADMIN LOGIN
        </title>
        <style>
            .logo{
                position: relative;
                text-align: center;
                top: 80px;
                left: 0;
                right: 0;
                display: block;
                margin: 0 auto;
                animation: mymove 3s;
            }
            .unpw{
                position: relative;
                text-align: center;
                top: 80px;
                left: 0;
                right: 0;
                display: block;
                margin: 0 auto;
                animation: mymove 3s;
            }
            .loginB{
                position: relative;
                text-align: center;
                top: 100px;
                left: 0;
                right: 0;
                display: block;
                margin: 0 auto;
                animation: mymove 3s;
            }
            @keyframes mymove{
                50%{opacity: 0;}
            }
        </style>
    </head>
    <body>
        <div class="logo">
            <img src="img\Full Logo.png">
        </div>
            <div class="unpw">
            <form action="../process/loginprocess.php" method="post"  >
                    </br>
                    </br>
                    Username: <input name="username" type="text" class="form-control" id="username" placeholder="Input Username" required>
                    </br>
                    </br>
                    Password: <input name="password" type="text" class="form-control" id="password" placeholder="Input Password" required>
                </div>
                <div class="loginB">
                    <button type="submit" class="btn btn-outline-success" name="submit" id="submit" >Login</button>
                </div>
            </form>
    </body>
</html>