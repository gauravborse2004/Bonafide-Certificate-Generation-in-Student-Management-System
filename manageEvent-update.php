<?php
$role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
    include("connection.php");

    $title = trim($_POST["title"]);
    $des = trim($_POST["desc"]);
    $date = trim($_POST["date"]);
    $form = trim($_POST["form"]);

    $myQuery = "UPDATE event SET Description='".$des."', Date='".$date."', Form='".$form."' WHERE Title='".$title."'";

    if($conn->query($myQuery))
    {
        echo
        "
        <script type='text/javascript'>
            alert('Updated Successfully');
            window.location.href='manage-Event.php?myVar=$email &role=$role';
        </script>";
    }
    else
    {
        echo
        "
        <script type='text/javascript'>
            alert('Data Not Updated');
            window.location.href='manage-Event.php?myVar=$email &role=$role';
        </script>";
    }

?>