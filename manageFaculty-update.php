<?php
$role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
    include("connection.php");

    $name = trim($_POST["fname"]);
    $email = trim($_POST["email"]);
    $contact = trim($_POST["contact"]);
    $gender = trim($_POST["gender"]);
    $des = trim($_POST["designation"]);
    $qua = trim($_POST["qualification"]);
    $exp = trim($_POST["experience"]);
    $spe = trim($_POST["specialization"]);
    $ach = trim($_POST["achievement"]);
    $address = trim($_POST["address"]);

    $myQuery = "UPDATE facultydata SET Name='".$name."', Contact='".$contact."', Gender='".$gender."', Designation='".$des."', Qualification='".$qua."', totalExperience='".$exp."', Specialization='".$spe."', Achievements='".$ach."', Address='".$address."' WHERE Email='".$email."'";

    if($conn->query($myQuery))
    {
        echo
        "
        <script type='text/javascript'>
            alert('Updated Successfully');
            window.location.href='manage-faculty.php?myVar=$email &role=$role';
        </script>";
    }
    else
    {
        echo
        "
        <script type='text/javascript'>
            alert('Data Not Updated');
            window.location.href='manage-faculty.php?myVar=$email &role=$role';
        </script>";
    }

?>