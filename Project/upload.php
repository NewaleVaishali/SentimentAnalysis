<?php
include("sec_connect.php");
session_start();
 $email=$_SESSION["email"];
//If form submits successfully.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // If file uploads successfully
    if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
        $allowedFileTypes = array("csv" => "text/csv");
        $filename = $_FILES["file"]["name"];
        $filetype = $_FILES["file"]["type"];
        $filesize = $_FILES["file"]["size"];
       
        // Get file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
 
        //Check if file extension is valid.
        if(!array_key_exists($extension, $allowedFileTypes)) {
           throw new Exception("Invalid file Format");
        }
   
        // Verify file size - 25MB max.
        $maxsize = 40 * 1024 * 1024;
        if($filesize > $maxsize){
            throw new Exception("The File size is larger than the allowed limit.");
        }
   
        // Verify The MIME type of the file.
        if(in_array($filetype, $allowedFileTypes)){
            // Check whether file exists before uploading it
            if(file_exists("PREDICT_SENTIMENTS/uploads" . $filename)){
                echo $filename . " is already exists.";
            }
            else {
                move_uploaded_file($_FILES["file"]["tmp_name"], "PREDICT_SENTIMENTS/uploads/" . $filename);  
                $targetfile= "PREDICT_SENTIMENTS/uploads/" . $filename;
                
                $stmt = $conn->prepare("insert into files(email,name,location) 
                values(?,?,?) ");
            
                $stmt->bind_param("sss",$email,$filename,$targetfile);
                $stmt->execute();
               $pythonPath = 'C:\\Users\\HP\\AppData\\Local\\Programs\\Python\\Python310\\python.exe';
               $output =exec("$pythonPath PREDICT_SENTIMENTS/preprocessing.py $filename");
               $output =exec("$pythonPath PREDICT_SENTIMENTS/main.py");
            }
        }
        //If not a valid MIME type
        else{
            throw new Exception("Invalid file format");
        }
    }
    //If file fails to upload
    else{
        echo "Error: " . $_FILES["file"]["error"];
    }
}
//If form fails to submit
else {
    throw new Exception("Form submission failed");
}
header("location: Graph.html");
?>