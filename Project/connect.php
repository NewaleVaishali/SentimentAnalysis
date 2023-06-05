<?php

$name=$_POST['name'];
$email=$_POST['email'];
$mobile = $_POST['mobile'];
$password=$_POST['password'];

//database connection
$conn = new mysqli('localhost:4306','root','newpassword','customers');
if($conn->connect_error)
{
    die('Connection Failed : '.$conn->connect_error) ;
}
else{
    $stmt = $conn->prepare("insert into information(name,email,mobile,password) 
    values(?,?,?,?) ");

    $stmt->bind_param("ssis",$name,$email,$mobile,$password);
    $stmt->execute();
    header("location: loginform.php");
    //$sql="select *from login";
    //$result = ($conn->query($sql));
    
    /*if ($result->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);  
    }  */
    
 
    $stmt->close();
    $conn->close();
}
?>


