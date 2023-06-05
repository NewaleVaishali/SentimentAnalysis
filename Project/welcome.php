<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="welcome_style.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="index.html"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="profile.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="about.html"><i class="fas fa-address-card"></i>About</a></li>
            <li><a href="upload1.php"><i class="fas fa-project-diagram"></i>Upload File</a></li>
            <li><a href="contact.html"><i class="fas fa-address-book"></i>Contact</a></li>
            <li><a href="logout.php"><i class="fas fa-map-pin"></i>Log out</a></li>
        </ul>

    </div>
    <div class="main_content">
        <div class="header">
            <h1>Welcome <?= $_SESSION["name"]?>!! Have a nice day.</h1>
        </div>
        <div class="info">
          <p>To upload your file use upload option</p>
      </div>
    </div>
</div>

</body>
</html>