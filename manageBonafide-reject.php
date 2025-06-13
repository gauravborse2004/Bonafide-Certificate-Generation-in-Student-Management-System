<?php
$role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
include("connection.php");

$myVar = $_GET["myVar"];
$request = "Rejected";

$myQuery = "UPDATE requestbonafide SET Request = '".$request."' WHERE Name='".$myVar."'";

 if($conn->query($myQuery))
    {
        // echo $request;
        // echo $myVar;
        echo
        "
        <script type='text/javascript'>
            alert('Updated Successfully');
            window.location.href='manageViewRequest-bonafide.php';
        </script>";
    }
    else
    {
        echo
        "
        <script type='text/javascript'>
            alert('Data Not Updated');
            window.location.href='manageViewRequest-bonafide.php';
        </script>";
    }

?>