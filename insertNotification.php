<?php
include("connection.php");

$notification_title = $_POST["notification_title"]; 
$notification_link = $_POST["notification_link"];

// File upload handling
$targetDirectory = "uploads/"; // Change this directory as per your requirement
$targetFile = $targetDirectory . basename($_FILES["notification_doc"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size, you can adjust as per your requirements
if ($_FILES["notification_doc"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow only certain file formats, you can adjust as per your requirements
if($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
    echo "Sorry, only PDF, DOC, DOCX files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["notification_doc"]["tmp_name"], $targetFile)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["notification_doc"]["name"])). " has been uploaded.";
        
        // Insert data into the database
        $sql = "INSERT INTO notification (notification_title, notification_doc, notification_link) VALUES ('$notification_title', '$targetFile', '$notification_link')"; 

        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>