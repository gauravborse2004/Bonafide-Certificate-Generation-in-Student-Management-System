<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $role = isset($_GET["role"]) ? trim($_GET["role"]) : "admin";
    include("connection.php");

    $prn = $_GET["myVar"];

    $myQuery = "DELETE FROM studentdata WHERE PRN = '".$prn."'";

    if($conn->query($myQuery))
    {
        echo "
        <script type='text/javascript'>
            alert('Data Deleted');
            window.location.href='manage-student.php';
        </script>
        ";
    }
    else
    {
        echo "
        <script type='text/javascript'>
            alert('Data Not Deleted');
            window.location.href='manage-student.php';
        </script>
        ";
    }


?>
</body>
</html>