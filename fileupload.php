<?php
echo is_dir("html/upload/");
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        // $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        //$filename = $_FILES["photo"]["name"];
        //$filetype = $_FILES["photo"]["type"];
        //$filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " does already exist, please upload a different file, or change the files name in case you want to upload a different version.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully to /var/www/html/upload/" . $filename;
            }    
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>
