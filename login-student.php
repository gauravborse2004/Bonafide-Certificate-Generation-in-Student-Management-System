<?php
    session_start();
    include("connection.php");
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $role = "student";
    // $role = $_POST["role"];

    $myQuery = "SELECT * FROM studentdata WHERE Email = '".$user."'";

    $result = $conn->query($myQuery);

    if( $result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $pass2 = $row["password"];

        if(  password_verify($pass, $pass2) )
        {
            $_SESSION["userLogin"] = $user;

            header("Location: home.php?role=$role");
        }
        else
        {
            echo"
            <script type='text/javascript'>
                alert('Wrong Password');
                window.location.href='login.html';
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