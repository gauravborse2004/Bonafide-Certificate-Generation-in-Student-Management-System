<?php
    include("connection.php");

    if(isset($_POST["submit"]))
    {
         // File Upload Setup
         $target_dir = "uploads/faculty/";
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

                $photo_name = time(). basename($_FILES["fileToUpload"]["name"]);

                $f_fname = $_POST["fname"];
                $f_role = "Faculty";
                $f_email = $_POST["email"];
                $f_contact = $_POST["contact"];
                $f_gender = $_POST["gender"];
                $f_dob = $_POST["dob"];
                $f_des = $_POST["designation"];
                $f_qua = $_POST["qualification"];
                $f_exp = $_POST["experience"];
                $f_spe = $_POST["specialization"];
                $f_ach = $_POST["achievement"];
                $f_address = $_POST["address"];
                $f_password = $_POST["password"];
    
                $enc_password = password_hash($f_password, PASSWORD_DEFAULT); //encrypting password using hash
    
                $myQuery = $conn->prepare("INSERT INTO facultydata(Name,Role,Email,Contact,Gender,DOB,Designation,Qualification,totalExperience,Specialization,Achievements,Address,password,photo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    
                $myQuery->bind_param("ssssssssssssss", $f_fname, $f_role, $f_email, $f_contact, $f_gender, $f_dob, $f_des, $f_qua, $f_exp, $f_spe, $f_ach, $f_address, $enc_password, $photo_name);

                if( $myQuery->execute() == TRUE)
                {

                    require 'PHPMailer/PHPMailer.php';
                    require 'PHPMailer/SMTP.php';
                    require 'PHPMailer/Exception.php';

                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'ssl';
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = 465;
                    $mail->IsHTML(true);
                    $mail->Username = "gauravborseofficial8084@gmail.com";
                    $mail->Password = "btfu lmhc mncg nqrn";

                    $mail->SetFrom("gauravborseofficial8084@gmail.com","Gaurav Borse");

                    $mail->Subject = 'Registration Succcessful';

                    $mail->Body =
                    '
                        <p> Dear '.$f_fname.',  </p>
                        <p> Thank you for registration. We will get back to you shortly.</p>
                        <p> Thank you</p>
                    ';


                    $mail->AddAddress( $f_email );

                    if($mail->Send())
                    {
                        echo "
                            <script type='text/javascript'>
                                alert('Registration Successful');
                                window.location.href='manage-faculty.php';
                            </script>
                        ";
                    }
                    else
                    {
                        echo "fail";
                    }

                }
                else
                {
                    echo "
                    <script type='text/javascript'>
                        alert('Something went wrong');
                        window.location.href='add-faculty.html';
                    </script>
                    ";
                }
            }
            else
            {
                echo "
                <script type='text/javascript'>
                    alert('Please fill the form');
                    window.location.href='add-faculty.php';
                </script>
                ";
            }

            }
        } else {
            echo "
                <script type='text/javascript'>
                    alert('Please fill the form properly.');
                    window.location.href='add-faculty.html';
                </script>
            ";
        } 
?>