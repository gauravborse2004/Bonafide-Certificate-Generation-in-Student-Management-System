<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    include("connection.php");

    $email = $_GET["myVar"];

    $myQuery = "DELETE FROM facultydata WHERE Email = '".$email."'";

    if($conn->query($myQuery))
    {
        echo "
        <script type='text/javascript'>
            alert('Data Deleted');
            window.location.href='manage-faculty.php';
        </script>
        ";
    }
    else
    {
        echo "
        <script type='text/javascript'>
            alert('Data Not Deleted');
            window.location.href='manage-faculty.php';
        </script>
        ";
    }


?>
</body>
</html>