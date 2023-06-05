<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
  $file=$_POST['file'];
$_SESSION['file']=$file;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upload_style.css">
</head>
<body>
  <div class="main">
    <div class="container">
      <div class="card">
        <h3>Upload Files</h3>
        <div class="drop_box">
          <header>
            <h4><?=$_SESSION["name"];?>Select File here</h4>
          </header>

          <form action="upload.php" style="padding: 10px"  method="post" enctype="multipart/form-data">
              <label for="fileSelect">Filename:</label>
              <input type="file" name="file" id="fileSelect">
              <input type="submit" name="submit" value="Upload">
              <p><strong>Note:</strong> Only .csv file allowed.</p>
          </form>
         <!--
           <p>Files Supported: PDF, TEXT, DOC , DOCX</p>
          <input type="file" hidden accept=".doc,.docx,.pdf" id="fileID" style="display:none;">
          <button class="btn">Choose File</button>-->
        </div>

      </div>
    </div>
  </div>
</body>

</html>