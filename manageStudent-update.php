<?php
    include("connection.php");

    $s_prn = trim($_POST["prn"]);
    $s_fname = trim($_POST["fname"]);
    $s_class = trim($_POST["class"]);
    $s_gender = trim($_POST["gender"]);
    $s_category = trim($_POST["category"]);
    $s_contact = trim($_POST["contact"]);
    $s_email = trim($_POST["email"]);
    $s_hostel = trim($_POST["hostel"]);
    $s_bus = trim($_POST["bus"]);
    $s_address = trim($_POST["address"]);

    $myQuery = "UPDATE studentdata SET fullName='".$s_fname."', Class='".$s_class."', Gender='".$s_gender."', Category='".$s_category."', Contact='".$s_contact."', Email='".$s_email."', collegeHostel='".$s_hostel."', busFacility='".$s_bus."', Address='".$s_address."' WHERE PRN='".$s_prn."'";

    if($conn->query($myQuery))
    {
        echo
        "
        <script type='text/javascript'>
            alert('Updated Successfully');
            window.location.href='manage-student.php';
        </script>";
    }
    else
    {
        echo
        "
        <script type='text/javascript'>
            alert('Data Not Updated');
            window.location.href='manageStudent-edit.php';
        </script>";
    }

?>