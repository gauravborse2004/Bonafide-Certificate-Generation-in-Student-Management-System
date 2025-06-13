<?php
$role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
    include("connection.php");

    if(isset($_POST["submit"]))
    {
         // File Upload Setup
         $target_dir = "uploads/student/";
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

                $s_prn = $_POST["prn"];
                $s_fname = $_POST["fname"];
                $s_class = $_POST["class"];
                $s_gender = $_POST["gender"];
                $s_dob = $_POST["dob"];
                $s_category = $_POST["category"];
                $s_contact = $_POST["contact"];
                $s_email = $_POST["email"];
                $s_hostel = $_POST["hostel"];
                $s_bus = $_POST["bus"];
                $s_address = $_POST["address"];
                $s_password = $_POST["password"];
    
                $enc_password = password_hash($s_password, PASSWORD_DEFAULT); //encrypting password using hash
    
                $myQuery = $conn->prepare("INSERT INTO studentdata(PRN,fullName,Class,Gender,DOB,Category,Contact,Email,collegeHostel,busFacility,Address,password,photo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    
                $myQuery->bind_param("sssssssssssss", $s_prn, $s_fname, $s_class, $s_gender, $s_dob, $s_category, $s_contact, $s_email, $s_hostel, $s_bus, $s_address, $enc_password, $photo_name);

                if( $myQuery->execute() == TRUE)
                {

                    require 'PHPMailer/PHPMailer.php';
                    require 'PHPMailer/SMTP.php';
                    require 'PHPMailer/Exception.php';


                    // include('PHPMailer/PHPMailer.php');
                    // include('PHPMailer/SMTP.php');
                    // include('PHPMailer/Exception.php');

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

                    $mail->Subject = 'Registration Succcessful 🎉🎉';

                    $mail->Body =
                    '
                        <p> Dear '.$s_fname.',  </p>
                        <p> Thank you for registration. We will get back to you shortly.</p>
                        <p> Thank you</p>
                    ';


                    $mail->AddAddress( $s_email );

                    if($mail->Send())
                    {
                        echo "
                            <script type='text/javascript'>
                                alert('Registration Successful');
                                window.location.href='manage-student.php?role=" . urlencode($role) . "';
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
                        window.location.href='add-student.php?role=" . urlencode($role) . "';
                    </script>
                    ";
                }
            }
            else
            {
                echo "
                <script type='text/javascript'>
                    alert('Please fill the form');
                    window.location.href='add-student.php?role=" . urlencode($role) . "';
                </script>
                ";
            }

            }
        } else {
            echo "
                <script type='text/javascript'>
                    alert('Please fill the form properly.');
                    window.location.href='add-student.php?role=" . urlencode($role) . "';
                </script>
            ";
        } 
?>


