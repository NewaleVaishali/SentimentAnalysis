<?php
session_start();
    $conn = new mysqli('localhost:4306','root','newpassword','customers') ;

    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name=$post['name'];
        $mobile=$post['mobile'];
       
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$password;
        $query = "select * from information where email='$email' and password='$password'";
        $result = mysqli_query($conn,$query);
        $count=mysqli_num_rows($result); 
        if($count==1)
        {
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION["name"]=$row["name"];
                $_SESSION["mobile"]=$row["mobile"];
            }
            echo"login successfully";
            header("location: welcome.php?email=".$email);
        }
        else
        {
            //echo"Login not successful";
            echo '<script>alert("login not successful")</script>';
        }
    
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
            <form action=""  method="post" class="form active" id="login">
                <h2>Login</h2>
                <label for="email">Email Address</label>
                <div class="pass-reset" onclick="activeInput(this)">
                    <input type="email" name="email" class="email" id="emailInput" placeholder="name@mail.com" required>
                </div>
                <label for="password">Password</label>
                <div class="pass-reset" onclick="activeInput(this)">
                    <input type="password" class="password" name="password" id="password" placeholder="**********" required>
                    <a href="#" class="reset-password">Reset Password</a>
                </div>
                <div class="pass-reset remember-box">
                    <input type="checkbox" name="remember" class="remember" id="remember"><span class="remember-text">Rememeber Password</span>
                </div>
                <button class="btn btn-login">Login</button>
                
                <p>Don't have an account? <a href="Signup.php" id="register">Sign up</a></p>
                
            </form>
           
        </div>
    </div>
   
    
</body>

</html>