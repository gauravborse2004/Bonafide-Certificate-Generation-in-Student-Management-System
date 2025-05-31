<?php
    include("connection.php");

    if(isset($_POST["submit"]))
    {
         // File Upload Setup
         $target_dir = "uploads/events/";
         $target_file = $target_dir . time(). basename($_FILES["fileToUpload"]["name"]); //time() to get microsecond time
         $uploadOk = 1;
         $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
 
         // Check if file is an actual image
         $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
         if ($check !== false) {
             echo "File is an image - " . $check["mime"] . ".<br>";
             $uploadOk = 1;
         } else {
             echo "File is not an image.<br>";
             $uploadOk = 0;
         }
 
         // Check if file already exists
         if (file_exists($target_file)) {
             echo "Sorry, file already exists.<br>";
             $uploadOk = 0;
         }
 
         // Check file size (limit: ~500KB)
         if ($_FILES["fileToUpload"]["size"] > 500000) {
             echo "Sorry, your file is too large.<br>";
             $uploadOk = 0;
         }
 
         // Allow specific file formats
         if (
             $imageFileType != "jpg" && $imageFileType != "png" &&
             $imageFileType != "jpeg" && $imageFileType != "gif"
         ) {
             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
             $uploadOk = 0;
         }

         // If everything is okay, try uploading
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>";

                $photo = time(). basename($_FILES["fileToUpload"]["name"]);

                $title = $_POST["title"];
                $desc = $_POST["desc"];
                $date = $_POST["dob"];
                $reg = $_POST["reg"];
    
                $myQuery = $conn->prepare("INSERT INTO event(Title,Description,Date,Form,Template) VALUES(?,?,?,?,?)");
    
                $myQuery->bind_param("sssss", $title, $desc, $date, $reg, $photo);

                if( $myQuery->execute() == TRUE)
                {
                    echo "
                    <script type='text/javascript'>
                        alert('Event Added Successfully');
                        window.location.href='manage-event.php';
                    </script>
                    ";
                }
                else
                {
                    echo "
                    <script type='text/javascript'>
                        alert('Something went wrong');
                        window.location.href='add-event.php';
                    </script>
                    ";
                }
            }
            else
            {
                echo "
                <script type='text/javascript'>
                    alert('Please fill the form');
                    window.location.href='add-event.php';
                </script>
                ";
            }

            }
        } else {
            echo "
                <script type='text/javascript'>
                    alert('Please fill the form properly.');
                    window.location.href=add-event.php';
                </script>
            ";
        } 
?>