<?php
$directory   = "uploads"; 
$uploadOk = 1;
$the_message = '';
if(isset($_POST['submit'])){
    
   /* echo "<pre";
    print_r($_FILES['fileToUpload']);
    echo "<pre";*/
    
   //ref http://php.net/manual/en/features.file-upload.errors.php
    $phpFileUploadErrors = array(
        0 => 'There is no error, the file uploaded with success',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',

        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk.',
        8 => 'A PHP extension stopped the file upload.',
    );


    $temp_name   = $_FILES['fileToUpload']['tmp_name']; 
    $target_file    = $_FILES['fileToUpload']['name']; 
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $my_url      = $directory .DIRECTORY_SEPARATOR.$target_file;   


    // Check if file exists
    if (file_exists($my_url)) { 
        echo "</br>";
        $the_message_ext =  "The file already exists."; 
        $uploadOk = 0;
        echo "</br>";
    }
    // Check file type 
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType       != "jpeg"
        && $imageFileType != "gif" ) { 
        
        $the_message_ext = "File Type is not allowed;please choose a jpg, png, jpeg, gif file ";
        echo "</br>";

        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
            $the_message= "Sorry, your file was not uploaded.". $the_message_ext;
            // if everything is ok, try to upload file
            } else { 

                if(move_uploaded_file($temp_name , $directory . "/" .$target_file )){

                $the_message = "File Uploaded Successfully.";
                echo 'Preview it: <a href="'. $my_url . '" target="_blank">'. $my_url . '</a>'; 
                 }
                else{
                   $the_error   = $_FILES['fileToUpload']['error'];
                   $the_message = $phpFileUploadErrors[$the_error];    

                }
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
   Maximum file size allowed for upload: 1 MB
   <br>
    Select image to upload:
    <h2>
       <?php
        if(!empty($phpFileUploadErrors)){
            echo $the_message;
        
        }else {
        
        }
        ?>
        
    </h2>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type="file" name="fileToUpload"><br>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>