<?php

$prevent_overwrite = false;

$max_filesize = '1000'*1024;

$file_exts = array('PNG', 'GIF', 'JPG');
$file_ext_list = implode(', ', $file_exts);

$my_dir = 'images';

$error_msgs = array (
    "Congratulations - your file has been uploaded!",
    "Your file is too large for this server.",
    "Your file is too large for this form.",
    "There was a problem and hour file was partially uploaded.",
    "The file was not uploaded.",
    "UNDEFINED ERROR!",
    "There's a missing temporarly file.",
    "Can't write file to disk.",
    "A PHP extension stopped the file upload."
);


if(isset($_FILES['userfile']['name'])){

    $filesize = $_FILES['userfile']['size'];

    $filename = basename($_FILES['userfile']['name']);
    $tmp_name = $_FILES['userfile']['tmp_name'];

    $my_url = $my_dir.DIRECTORY_SEPARATOR.$filename;

    $msg = NULL;

    if ($filesize > $max_filesize) {
        $msg .= "File size must be " . round($max_filesize/1024) . "  KB or less. <br>";
    }

    $f_ext = explode('.', $filename);
    $f_ext = end($f_ext);
    $f_ext = strtoupper(trim($f_ext));
    if(!in_array($f_ext, $file_exts)) {
       $msg .= "File type not allowed, please choose a PNG, GIF or JPG file.<br>";
    }

    if (!file_exists($my_dir)) {
            $msg .= "Your specified folder does not exist!";
    }
 
    if ($prevent_overwrite == true) {
    if (!file_exists($my_url)) {
        $msg .= "A file with the same name already exists!";
} 
    }
    if (!isset($msg)) {
        if(move_uploaded_file($tmp_name,$my_url)) {
            echo "Upload Successful!<br>";
            echo 'Preview it: <a href= "' . $my_url . '" target="_blank">' . $my_url . '</a>';
        } else{
            echo "Upload Failed! - " . $error_msgs[$filesize = $_FILES['userfile']['error']];     
        }
            } else {
                echo $msg;
    }   

}

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Image Uploader</title>
            <link href="styles.css" rel="stylesheet" type="text/css">
     </head>
     <body>
         <form enctype="multipart/form-data" method="post">
        <h1>Image Uploader</h1>
        <!--<input type="hidden" name="MAX_FILE_SIZE" value="<?php //echo $max_filesize ?>" />-->
        <p> Select an image to upload (<?php echo $file_ext_list ?>): <input name="userfile" type="file" /></p>
        <button id="upbtn" type="submit">upload</button><br>
        <p><a href="view_images.php">Contents of 'images' folder</a></p>
        </form>
     </body>
</html>