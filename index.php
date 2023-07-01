<?php
    if(isset($_POST['upload'])){
       $file_name= $_FILES['file']['name'];
       $file_type =$_FILES['file']['type'];
       $file_size =$_FILES['file']['size'];
       $file_temp_Loc = $_FILES['file']['tmp_name'];
       $file_store = "uploads/".$file_name;

       $mime_type = ["text/php","text/html"];
       if(in_array($file_type,$mime_type))
       {
        exit("Invalid File Type, Try Uploading the correct format");
       }
      if( move_uploaded_file($file_temp_Loc,$file_store)){
            echo "File Uploaded <br>";
      } else {
        echo "failed";
      }
       //print_r($file_temp_Loc);
       print_r("File is uploaded to ".$file_store);
       //print_r($file_type);

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    <img src="uploads/pic.png" alt="Image Description">
    <form action="?" method = "POST" enctype = "multipart/form-data">
    <label>Upload Files</label>
    <p ><input type="file" name="file"/></p>
    <p><input type="submit" name ="upload" value="Upload Image"></p>
</form>

</body>
</html>