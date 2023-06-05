<?php

//database connection
$conn = new mysqli('localhost:4306','root','newpassword','customers');
if($conn->connect_error)
{
    die('Connection Failed : '.$conn->connect_error) ;
}

?>


d