<?php
$dir = 'images';
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Image Listing</title>
</head>
<body>
    <h1>Contents of '<?php echo $dir ?>' folder</h1>

    <p>
        <?php
    $folder_path = 'images/'; //image's folder path

$num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);

$folder = opendir($folder_path);
 
if($num_files > 0)
{
 while(false !== ($file = readdir($folder))) 
 {
  $file_path = $folder_path.$file;
  $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
  if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp') 
  {
   ?>
            <a href="<?php echo $file_path; ?>"><img src="<?php echo $file_path; ?>"  height="250" /></a>
            <?php
  }
 }
}
else
{
 echo "the folder was empty !";
}
closedir($folder);
?>
    </p>
<p> <a href="img_upload.php">Image Uploader</a></p>
</body>
</html>
