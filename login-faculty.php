<?php
    session_start();
    include("connection.php");
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $role = "faculty";

    $myQuery = "SELECT * FROM facultydata WHERE Email = '".$user."'";

    $result = $conn->query($myQuery);

    if( $result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $pass1 = $row["Password"];

        if(  password_verify($pass, $pass1) )
        {
            $_SESSION["userLogin"] = $user;

            header("Location: home.php?role=$role");
        }
        else
        {
            echo"
            <script type='text/javascript'>
                alert('Wrong Password');
                window.location.href='login-faculty.html';
            </script>";
        }
    }
    else
    {
        echo "
                <script type='text/javascript'>
                    alert('Please signup');
                    window.location.href='login-student.html';
                </script>
            ";
    }
?>