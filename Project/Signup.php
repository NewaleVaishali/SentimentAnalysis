
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="login_style.css">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
     
    <div class="container">
        <div class="row">
            <img src="img/login.jpg" alt="img" class="img">
        </div>
        <div class="row">
          </form>
            <form action="connect.php" method="post" class="form active"  id="register">
                <h2>Register</h2>

                <label for="name">Name </label>
                <div class="pass-reset" onclick="activeInput(this)">
                    <input type="name" class="email" name="name" id="name" placeholder=" enter name" required>
                </div>
                
                <label for="email">Email Address</label>
                <div class="pass-reset" onclick="activeInput(this)">
                    <input type="email" name="email" class="email" id="emailInput" placeholder="name@mail.com" required>
                </div>

                <label for="mobile">Mobile_number </label>
                <div class="pass-reset" onclick="activeInput(this)">
                    <input type="tel" class="email" name="mobile" id="mobile" placeholder=" enter your mobile number" required>
                </div>

                <label for="password">Password</label>
                <div class="pass-reset" onclick="activeInput(this)">
                    <input type="password" class="password" name="password" id="password" placeholder="********" required>
                </div>
               
                <button class="btn btn-login">Register</button>
                
                <p>Do you have an account? <a href="loginform.php" id="login">Sign in</a></p>
               
            </form>
            </div>
    </div>
   
    
</body>

</html>